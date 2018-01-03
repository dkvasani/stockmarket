<?php

require './common/config.php';

$title = 'Nifty Stocks';

$getStocks = $conn->prepare("SELECT * FROM nse_stocket ORDER BY symbol ASC");
$getStocks->execute();
$getStocksData = $getStocks->fetchAll(PDO::FETCH_ASSOC);

include './header.php';
?>
<div class="table-responsive">
<div class="page-header">
    <h1 align="center">NIFTY Stocks</h1>
</div>
<table class="table table-bordered display nowrap" id="dkvasani-datatable">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">SYMBOL</th>
      <!-- <th scope="col">series</th> -->
      <th scope="col">Company Name</th>
      <th scope="col">Series</th>
      <th scope="col">Listing Date</th>
      <th scope="col">Paid up val</th>
      <th scope="col">Market Lot</th>
      <th scope="col">Face Value </th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($getStocksData as $key => $row) {
    ?><tr>
    <td><?php echo $row['symbol'] ?> </td>
    <td><?php echo $row['company_name'] ?> </td>
    <td><?php echo $row['series'] ?> </td>
    <td><?php echo $row['listing_date'] ?> </td>
    <td><?php echo $row['paid_up_val'] ?> </td>
    <td><?php echo $row['market_lot'] ?> </td>
    <td><?php echo $row['face_value'] ?> </td>
     </tr>
<?php }
?>
  </tbody>
</table>
<?php include './footer.php'; ?>
