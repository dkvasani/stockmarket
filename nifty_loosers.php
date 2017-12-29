
<?php

$title = 'Nifty Loosers';
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
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $loserDataArr = json_decode($response, true);
    //echo '<pre>';
    //print_r($loserDataArr);

}
include './header.php';

?>
<div class="table-responsive">
<div class="page-header">
    <h1 align="center">Nifty Loosers</h1>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">SYMBOL</th>
      <!-- <th scope="col">series</th> -->
      <th scope="col">Open Price</th>
      <th scope="col">High Price</th>
      <th scope="col">Low Price</th>
      <th scope="col">LTP</th>
      <th scope="col">Previous Price</th>
      <th scope="col">Net Price</th>
      <th scope="col">Traded Quantity</th>
      <!-- <th scope="col">turnoverInLakhs</th> -->
      <th scope="col">lastCorpAnnouncementDate</th>
      <th scope="col">lastCorpAnnouncement</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($loserDataArr['data'] as $key => $row) {
    ?><tr>
    <!-- <th scope="row"><?php echo $key + 1; ?></th> -->
    <td><?php echo $row['symbol'] ?> </td>
    <!-- <td><?php echo $row['series'] ?> </td> -->
    <td><?php echo $row['openPrice'] ?> </td>
    <td><?php echo $row['highPrice'] ?> </td>
    <td><?php echo $row['lowPrice'] ?> </td>
    <td><?php echo $row['ltp'] ?> </td>
    <td><?php echo $row['previousPrice'] ?> </td>
    <td><?php echo $row['netPrice'] ?> </td>
    <td><?php echo $row['tradedQuantity'] ?> </td>
    <!-- <td><?php echo $row['turnoverInLakhs'] ?> </td> -->
    <td><?php echo $row['lastCorpAnnouncementDate'] ?> </td>
    <td><?php echo $row['lastCorpAnnouncement'] ?> </td>
     </tr>
<?php }
?>
  </tbody>
</table>

</div>
</div>
</body>
</html>
