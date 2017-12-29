
<?php

 $curl = curl_init();

$config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.nseindia.com/live_market/dynaContent/live_analysis/losers/niftyLosers1.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_REFERER => "https://www.nseindia.com",
  CURLOPT_USERAGENT => $config['useragent'],
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}