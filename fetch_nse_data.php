<?php

//https://www.nseindia.com/products/dynaContent/common/productsSymbolMapping.jsp?symbol=cdsl&segmentLink=3&symbolCount=2&series=EQ&dateRange=&fromDate=08-01-2018&toDate=12-01-2018&dataType=PRICEVOLUME
error_reporting(0);
require './common/config.php';
$symbol = 'lupin';
$url = NSE_STOCK_DATA . "?symbol=" . $symbol . "&segmentLink=3&symbolCount=2&series=EQ&dateRange=&fromDate=20-12-2017&toDate=12-01-2018&dataType=PRICEVOLUMEDELIVERABLE";

$response = curlCall($url, NSE_REFERER);
echo '<pre>';

$doc = new DOMDocument();
$doc->loadHTML($response);
$table = $doc->getElementsByTagName('table')->item(0);

// iterate over each row in the table
$i = 0;
foreach ($table->getElementsByTagName('tr') as $tr) {
    if ($i == 0) {
        $i++;
        continue;
    }

    $tds = $tr->getElementsByTagName('td');
    $symbol = $tds->item(0)->nodeValue;
    $series = $tds->item(1)->nodeValue;
    $date = $tds->item(2)->nodeValue;
    $timestamp = strtotime($date);
    $dateFormated = date('Y-m-d', $timestamp);

    $preClosePrice = $tds->item(3)->nodeValue;
    $openPrice = $tds->item(4)->nodeValue;
    $highPrice = $tds->item(5)->nodeValue;
    $lowPrice = $tds->item(6)->nodeValue;
    $lastPrice = $tds->item(7)->nodeValue;
    $closePrice = $tds->item(8)->nodeValue;
    $VWAP = $tds->item(9)->nodeValue; //volume weighted average price (VWAP)
    $totalTradedQty = str_replace(',', '', $tds->item(10)->nodeValue);
    $turnover = str_replace(',', '', $tds->item(11)->nodeValue);
    $noofTrades = str_replace(',', '', $tds->item(12)->nodeValue);

    $sql = "INSERT INTO nse_stock_data (symbol, series, trade_date, pre_close_price, open_price, close_price, low_price, last_day_price, high_price, vwap, volume, turn_over, number_of_traders) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $data = [$symbol, $series, $dateFormated, $preClosePrice, $openPrice, $closePrice, $lowPrice, $lastPrice, $highPrice, $VWAP, $totalTradedQty, $turnover, $noofTrades];
    try {
        $stmta = $conn->prepare($sql);
        $stmta->execute($data);
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}