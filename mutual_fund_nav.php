<?php

$myMutualFundIds = [119544, 105804, 119661, 119242, 119076, 119077, 120166, 119773, 119772, 130503, 119059
    , 118473, 118472, 132756, 119723, 119802, 120502, 118803, 133386];
$mutualFundArr = [
    'Aditya Birla Sun Life Tax Relief 96' => 119544,
    'Aditya Birla Sun Life Small & Midcap Fund - GROWTH' => 105804,
    'Aditya Birla Sun Life Tax Plan' => 119661,
];
$curl = curl_init();
//Scheme Code;Scheme Name;Net Asset Value;Repurchase Price;Sale Price;Date
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://portal.amfiindia.com/DownloadNAVHistoryReport_Po.aspx?frmdt=28-Dec-2017&todt=29-Dec-2017&tp=",
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
    $lines = explode(PHP_EOL, $response);
    $array = array();
    foreach ($lines as $line) {
        $currentLine = str_getcsv($line);
        $singleRow = explode(';', $currentLine[0]);
        if (in_array($singleRow[0], $myMutualFundIds)) {
            $array[] = $singleRow;
        }
    }
}
?>
<html>
<head> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"></head>
<body>
<div class="container">

<div class="table-responsive">
<h3 align="center">My Mutual Fund and ITs NAV Value</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Scheme Code</th>
      <th scope="col">Scheme Name</th>
      <th scope="col">Net Asset Value</th>
      <th scope="col">Repurchase Price</th>
      <th scope="col">Sale Price</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($array as $key => $row) {
    ?><tr>
    <th scope="row"><?php echo $key + 1; ?></th>
    <?php
foreach ($row as $column) {?>
<td> <?php echo $column ?> </td>
<?php }?>
     </tr>
<?php }
?>
  </tbody>
</table>

</div>
</div>
</body>
</html>
