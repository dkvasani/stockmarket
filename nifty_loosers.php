
<?php
require './common/config.php';

$title = 'Nifty Loosers';
$response = curlCall(NSE_LOOSERS, NSE_REFERER);
$loserDataArr = json_decode($response, true);
include './header.php';
?>
<div class="table-responsive">
<div class="page-header">
    <h1 align="center">NIFTY LOOSERS</h1>
</div>
<table class="table table-bordered">
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
<?php include './footer.php'; ?>
