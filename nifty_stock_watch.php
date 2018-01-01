
<?php
require './common/config.php';

$title = 'Nifty Stocks';
$response = curlCall(NSE_STOCK_WATCH, NSE_REFERER);
$loserDataArr = json_decode($response, true);

$responseMidcap = curlCall(NSE_MIDCAP_STOCK_WATCH, NSE_REFERER);
$responseMidcap = json_decode($responseMidcap, true);

$dataArray = array_merge($loserDataArr['data'], $responseMidcap['data']);

$responseNext50 = curlCall(NSE_NEXT_FIFTY, NSE_REFERER);
$responseNext50 = json_decode($responseNext50, true);

$dataArray = array_merge($dataArray, $responseNext50['data']);

$responseCnxAutoStock = curlCall(NSE_CNX_AUTO_STOCK, NSE_REFERER);
$responseCnxAutoStock = json_decode($responseCnxAutoStock, true);

$dataArray = array_merge($dataArray, $responseCnxAutoStock['data']);

$responseCnxAutoStock = curlCall(NSE_CNX_AUTO_STOCK, NSE_REFERER);
$responseCnxAutoStock = json_decode($responseCnxAutoStock, true);

$dataArray = array_merge($dataArray, $responseCnxAutoStock['data']);
include './header.php';
?>
<div class="table-responsive">
<div class="page-header">
    <h1 align="center">NIFTY 50 STOCK WATCH - DATE: <?php echo $loserDataArr['time']; ?></h1>
</div>
<table class="table table-bordered display nowrap" id="dkvasani-datatable">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">SYMBOL</th>
      <!-- <th scope="col">series</th> -->
      <th scope="col">Open Price</th>
      <th scope="col">High Price</th>
      <th scope="col">Low Price</th>
      <th scope="col">LTP</th>
      <th scope="col">CHANGE</th>
      <th scope="col">CHANGE %</th>
      <th scope="col">Previous Price</th>
      <th scope="col">Net Price</th>
      <th scope="col">52 WEEK HIGH</th>
      <th scope="col">52 WEEK LOW</th>
      <th scope="col">Month Return</th>
      <th scope="col">Year Return</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($dataArray as $key => $row) {
    ?><tr>
  
    <td><?php echo $row['symbol'] ?> </td>
    <td><?php echo $row['open'] ?> </td>
    <td><?php echo $row['high'] ?> </td>
    <td><?php echo $row['low'] ?> </td>
    <td><?php echo $row['ltP'] ?> </td>
    <td><?php echo $row['ptsC'] ?> </td>
    <td><?php echo $row['per'] ?> </td>
    <td><?php echo $row['trdVol'] ?> </td>
    <td><?php echo $row['ntP'] ?> </td>
    <td><?php echo $row['wkhi'] ?> </td>
    <td><?php echo $row['wklo'] ?> </td>
    <td><?php echo $row['mPC'] ?> </td>
    <td><?php echo $row['yPC'] ?> </td>
     </tr>
<?php }
?>
  </tbody>
</table>
<?php include './footer.php'; ?>
