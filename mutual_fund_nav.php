<?php

$myMutualFundIds = [119544, 105804, 119661, 119242];
$mutualFundArr = [
    'Aditya Birla Sun Life Tax Relief 96' => 119544,
    'Aditya Birla Sun Life Small & Midcap Fund - GROWTH' => 105804,
    'Aditya Birla Sun Life Tax Plan' => 119661,
];
$curl = curl_init();
//Scheme Code;Scheme Name;Net Asset Value;Repurchase Price;Sale Price;Date
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://portal.amfiindia.com/DownloadNAVHistoryReport_Po.aspx?frmdt=28-Dec-2017&todt=28-Dec-2017&tp=",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: 5f7c0467-6eac-4ef9-154a-720b3c2e41cd",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<pre>";
    $lines = explode(PHP_EOL, $response);
    $array = array();
    foreach ($lines as $line) {
        $currentLine = str_getcsv($line);
        $singleRow = explode(';', $currentLine[0]);
        if (in_array($singleRow[0], $myMutualFundIds)) {
            $array[] = $singleRow;

        }
    }
      print_r($array);
   // echo $response;
}
