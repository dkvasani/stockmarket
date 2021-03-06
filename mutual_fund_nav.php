<?php
require './common/config.php';
$title = 'Mutual Funds NAV';

$myMutualFundIds = [119544, 105804, 119661, 119242, 119076, 119077, 120166, 119773, 119772, 130503, 119059
    , 118473, 118472, 132756, 119723, 119802, 120502, 118803, 133386];

$url = "http://portal.amfiindia.com/DownloadNAVHistoryReport_Po.aspx";

if (!empty($_GET['from_date'])) {
    $fromDate = $_GET['from_date'];
    if (!empty($_GET['to_date'])) {
        $toDate = $_GET['to_date'];
    } else {
        $toDate = formatCurrentDate();
    }
} else {
    $toDate = $fromDate = formatCurrentDate();
}
$url .= "?frmdt=" . $fromDate . "&todt=" . $toDate;

if (!empty($_GET['mf'])) {
    $url .= "&mf=" . $_GET['mf'];
}

$response = curlCall($url, '');

$lines = explode(PHP_EOL, $response);
$array = array();
foreach ($lines as $line) {
    $currentLine = str_getcsv($line);
    $singleRow = explode(';', $currentLine[0]);
    if (in_array($singleRow[0], $myMutualFundIds)) {
        $array[] = $singleRow;
    }
}

include './header.php';
?>

<div class="table-responsive">
<div class="page-header">
    <h1 align="center">My Mutual Fund and ITs NAV Value</h1>
</div>

<div class ="row form-group">
<div class="col-3"></div>
<div class="col-2">
      Select Mutual Fund
</div>
<div class="col-5">
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
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
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
    <?php
foreach ($row as $column) {?>
<td> <?php echo $column ?> </td>
<?php }?>
     </tr>
<?php }
?>
  </tbody>
</table>

<?php include './footer.php';?>
