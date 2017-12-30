<?php

function formatCurrentDate()
{
    $date = date('m-d-Y');
    $dateObj = DateTime::createFromFormat('m-d-Y', $date);
    return $dateObj->format('d-M-Y');
}

function curlCall($url, $refererURL)
{
    $curl = curl_init();

    $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_REFERER => $refererURL,
        CURLOPT_USERAGENT => $config['useragent'],
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        exit('Curl Error');
    } else {
        return $response;
    }
}
