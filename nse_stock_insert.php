<?php

require './common/config.php';

$file = fopen("files". DIRECTORY_SEPARATOR ."EQUITY_L.csv","r");
echo "<pre>";

while(! feof($file))
{
   
     $data = fgetcsv($file);
    // print_r($data);
    $sql = "INSERT INTO nse_stocket (symbol, company_name, series, listing_date, paid_up_val, market_lot, isin_number, face_value) 
    
    
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  
   $stmta = $conn->prepare($sql);
   $stmta->execute($data); 
    // use exec() because no results are returned
  ///  $stmt->exec($sql);
}

fclose($file);

