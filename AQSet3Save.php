<?php 

//echo $input_xml;
$xml = new SimpleXMLElement("./AQ_SET3.xml",0,true); 

//echo $_POST['checking'];
$Checking=0;
$Checking = $xml->Checking;
echo $Checking; 
if($_POST['checking']=="1")
	$xml->Checking = 1;
else if($_POST['checking']=="2")
	$xml->Checking = 2;
else 
	$xml->Checking = 0;

$test =  $xml->asXML('./AQ_SET3.xml'); 

?>


<Html>
<head>

    <title>META Tag  Refresh</title>

    <meta http-equiv="content-type" content="text/html; charset=euc-kr">

    <meta http-equiv="refresh" content="0; url=./AQ3.php">

</head>
<body>
	<a href="./AQ3.php">설정창 돌아가기 </a>
	</body>
</Html> 