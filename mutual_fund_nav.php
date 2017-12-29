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
curl_setopt_array($curl, [
    CURLOPT_URL => "http://portal.amfiindia.com/DownloadNAVHistoryReport_Po.aspx?frmdt=28-Dec-2017&todt=29-Dec-2017&tp=",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [],
]);

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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <title>Mutual Funds NAV</title>
  </head>
<body>
<div class="container-full">

<div class="table-responsive">
<div class="page-header">
    <h1 align="center">My Mutual Fund and ITs NAV Value</h1>
</div>
<div class ="row form-group">
<div class="col-4"></div>
<div class="col-2">
      Select Mutual Fund
</div>
<div class="col-6">
<select name="fund_name" id="fund_name" accesskey="M">
			<option value="0">-- Select Mutual Fund --</option>
			<option value="all">All</option>
			<!-- <option value="39">ABN  AMRO Mutual Fund</option> -->
			<option selected="selected" value="3">Aditya Birla Sun Life Mutual Fund</option>
			<!-- <option value="50">AEGON Mutual Fund</option>
			<option value="1">Alliance Capital Mutual Fund</option> -->
			<option value="53">Axis Mutual Fund</option>
			<!-- <option value="4">Baroda Pioneer Mutual Fund</option>
			<option value="36">Benchmark Mutual Fund</option>
			<option value="59">BNP Paribas Mutual Fund</option>
			<option value="46">BOI AXA Mutual Fund</option>
			<option value="32">Canara Robeco Mutual Fund</option>
			<option value="60">Daiwa Mutual Fund</option>
			<option value="31">DBS Chola Mutual Fund</option>
			<option value="38">Deutsche Mutual Fund</option>
			<option value="58">DHFL Pramerica Mutual Fund</option> -->
			<option value="6">DSP BlackRock Mutual Fund</option>
			<!-- <option value="47">Edelweiss Mutual Fund</option>
			<option value="13">Escorts Mutual Fund</option>
			<option value="54">Essel Mutual Fund</option>
			<option value="40">Fidelity Mutual Fund</option>
			<option value="51">Fortis Mutual Fund</option>
			<option value="27">Franklin Templeton Mutual Fund</option>
			<option value="8">GIC Mutual Fund</option>
			<option value="49">Goldman Sachs Mutual Fund</option> -->
			<option value="9">HDFC Mutual Fund</option>
			<!-- <option value="37">HSBC Mutual Fund</option>
			<option value="20">ICICI Prudential Mutual Fund</option>
			<option value="57">IDBI Mutual Fund</option> -->
			<option value="48">IDFC Mutual Fund</option>
			<!-- <option value="68">IIFCL Mutual Fund (IDF)</option>
			<option value="62">IIFL Mutual Fund</option> -->
			<!-- <option value="11">IL&amp;F S Mutual Fund</option>
			<option value="65">IL&amp;FS Mutual Fund (IDF)</option> -->
			<!-- <option value="63">Indiabulls Mutual Fund</option>
			<option value="14">ING Mutual Fund</option>
			<option value="42">Invesco Mutual Fund</option>
			<option value="16">JM Financial Mutual Fund</option>
			<option value="43">JPMorgan Mutual Fund</option> -->
			<option value="17">Kotak Mahindra Mutual Fund</option>
			<option value="56">L&amp;T Mutual Fund</option>
			<!-- <option value="18">LIC Mutual Fund</option>
			<option value="69">Mahindra Mutual Fund</option>
			<option value="45">Mirae Asset Mutual Fund</option>
			<option value="19">Morgan Stanley Mutual Fund</option> -->
			<option value="55">Motilal Oswal Mutual Fund</option>
			<!-- <option value="44">PineBridge Mutual Fund</option>
			<option value="34">PNB Mutual Fund</option>
			<option value="64">PPFAS Mutual Fund</option>
			<option value="10">PRINCIPAL Mutual Fund</option>
			<option value="41">Quantum Mutual Fund</option> -->
			<option value="21">Reliance Mutual Fund</option>
			<!-- <option value="35">Sahara Mutual Fund</option> -->
			<option value="22">SBI Mutual Fund</option>
			<!-- <option value="52">Shinsei Mutual Fund</option>
			<option value="67">Shriram Mutual Fund</option>
			<option value="66">SREI Mutual Fund (IDF)</option>
			<option value="2">Standard Chartered Mutual Fund</option>
			<option value="24">SUN F&amp;C Mutual Fund</option>
			<option value="33">Sundaram Mutual Fund</option> -->
			<option value="25">Tata Mutual Fund</option>
			<!-- <option value="26">Taurus Mutual Fund</option>
			<option value="61">Union Mutual Fund</option>
			<option value="28">UTI Mutual Fund</option>
			<option value="29">Zurich India Mutual Fund</option> -->

		</select>
</div>
</div>
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
