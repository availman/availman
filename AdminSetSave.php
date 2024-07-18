<?php 

//echo $input_xml;
$xml = new SimpleXMLElement("./AdminSet.xml",0,true); 

date_default_timezone_set('Asia/Seoul');
$today = $xml->Today;
$now_date = date("Y-m-d");
$now_time = date("H:i:s");

$Checking=0;
if($_POST['checking']==1)
	$xml->Checking = 1;
else
	$xml->Checking = 0;
//echo '점검:'.$xml->Checking.'<br>';

$Active0 = array();
$starttime2 = array();
$endtime2 = array();
$starttime0 = 0;
$endtime0 = 0;
if(isset($_POST['active1']))
	$Active0[0] = 1;
else
	$Active0[0] = 0;

if(isset($_POST['active2']))
	$Active0[1] = 1;
else
	
	$Active0[1] = 0;

if(isset($_POST['active3']))
	$Active0[2] = 1;
else
	$Active0[2] = 0;

if(isset($_POST['active4']))
	$Active0[3] = 1;
else
	$Active0[3] = 0;

if(isset($_POST['active5']))
	$Active0[4] = 1;
else
	$Active0[4] = 0;

if(isset($_POST['active6']))
	$Active0[5] = 1;
else
	$Active0[5] = 0;

if(isset($_POST['active7']))
	$Active0[6] = 1;
else
	$Active0[6] = 0;

if(isset($_POST['active8']))
	$Active0[7] = 1;
else
	$Active0[7] = 0;

if(isset($_POST['active9']))
	$Active0[8] = 1;
else
	$Active0[8] = 0;

if(isset($_POST['active10']))
	$Active0[9] = 1;
else
	$Active0[9] = 0;

if(isset($_POST['active11']))
	$Active0[10] = 1;
else
	$Active0[10] = 0;

if(isset($_POST['active12']))
	$Active0[11] = 1;
else
	$Active0[11] = 0;

if(isset($_POST['active13']))
	$Active0[12] = 1;
else
	$Active0[12] = 0;

if(isset($_POST['active14']))
	$Active0[13] = 1;
else
	$Active0[13] = 0;

for($i=0;$i<count($_POST['starttime']);$i++){	
	$starttime0 = $_POST['starttime'];
	if(mb_strlen($starttime0[$i])<8)
		$starttime2[$i] = $starttime0[$i].':00';
	else
		$starttime2[$i] = $starttime0[$i];
	
	//echo $Active[$i+1].'->';
	//echo $active2[$i].'->';
	$endtime0 = $_POST['endtime'];
	if(mb_strlen($endtime0[$i])<8)
		$endtime2[$i] = $endtime0[$i].':00';
	else
		$endtime2[$i] = $endtime0[$i];
	//echo $endtime0[$i].'<br>'.mb_strlen($endtime0[$i]);
	//echo $endtime2[$i].'<br>';
	//echo $active3[$i].'<br>';
	//if($active2[$i]==1) echo 'a';
	//else echo 'b';
	$xml->Daily[$i]->Active=$Active0[$i];
	$xml->Daily[$i]->StartTime=$starttime2[$i];
	$xml->Daily[$i]->EndTime=$endtime2[$i];
}
$test =  $xml->asXML('./AdminSet.xml'); 
/*
for($i=0;$i<count($_POST['endtime']);$i++){
	$active2 = $_POST['endtime'];
	echo $active2[$i].'<br>';
	//if($active2[$i]==1) echo 'a';
	//else echo 'b';
}

*/

/*if(!empty($_POST['active']))
{
	echo 'ok';
	//echo $_POST['active'];
	
	$Active3 = $_POST['active'];
	foreach($Active3 as $active2){
		$echo $active2;
	}
	//$Count++;
}
else
{
	echo 'empty';
	//$Active3 = $_POST['active'];
	//foreach($Active3 as $active2){
	//	$echo $active2;
	//}
}
*/

//echo '점검중:'.$Checking.'<br>';
/*
for($i=0;$i<$Count;$i++)
{
	echo $i;
	echo $xml->DailyActive[$i];
	//echo $xml->DailyStartTime[$i];
	//echo $xml->DailyEndTime[$i];
	echo '<br>';
}



*/
?>

<Html>
<head>

    <title>META Tag  Refresh</title>

    <meta http-equiv="content-type" content="text/html; charset=euc-kr">

    <meta http-equiv="refresh" content="0; url=./AQSetup.php">

</head>
<body>
	<a href="./AQSetup.php">설정창 돌아가기 </a>
	</body>
</Html> 