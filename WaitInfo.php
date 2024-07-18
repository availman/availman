<?php 

$week_N=array('','월','화','수','목','금','토','일');
date_default_timezone_set('Asia/Seoul');
$xml1 = new SimpleXMLElement("./AQServerEvent1.xml",0,true); 
$xml2 = new SimpleXMLElement("./AQServerEvent2.xml",0,true); 
$xml3 = new SimpleXMLElement("./AQServerEvent3.xml",0,true); 
$xml4 = new SimpleXMLElement("./AQServerEvent4.xml",0,true); 

$groupinfoID =array();
$groupinfoName= array();
$groupinfoWaitCount = array();
$groupinfoLastCount = array();
$groupinfoLastCallNo = array();
$groupinfoLastPrintNo = array();
$total_wait = 0;

		$datacount=0;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset ="utf-8">
	<META HTTP-EQUIV="refresh" CONTENT="5">
	<style type="text/css">
		.img1{
			background:url(./back1.jpg);
			background-size: 100% 100%;
			width:300;
			height:50;

		}
		.tr1 {
			background:url(./back1.jpg);
			background-size: 100% 100%;
		}
		.tr2 {
			background:url(./back2.jpg);
			background-size: 100% 100%;
		}
		.td {
			background-color: #ffffff;
			font-size:20px;
			font-family:"나눔스퀘어";
			color:black;
			text-align:center;
		}
		.td1 {
			background-color: #47aca4;
			font-size:20px;
			font-family:"나눔스퀘어";
			color:white;
			text-align:center;
		}
		
		.td2 {
			background-color: #1f6e68;
			font-size:20px;
			font-family:"나눔스퀘어";
			color:white;
			text-align:center;
		}
		.td3 {
			font-size:30px;
			font-family:"나눔스퀘어";
			color:white;
			text-align:center;
		}
	</style>
	<!--<script>
		setTimeout(function(){
			location.reload();
		},60000);
	</script> 
	<script type="text/javascript" src="http://livejs.com/live.js "></script>-->
</head>
<body>
	<H2>○ 관악구 선별진료소 대기인원 현황</H2>
	<table width=500 border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=50>
			<td class="td1" width=200 align=center>보건소</td>
			<td class="td" width=100 align=center><?=$xml1->TotalWait?>명</td>
			<td class="td1" width=100 align=center>호출번호</td>
			<td class="td" width=100 align=center><?=$xml1->Group->LastCallNo?>번</td>
		</tr>
		<tr valign=center height=50>
			<td class="td2" width=200 align=center>신림체육센터</td>
			<td class="td" width=100 align=center><?=$xml2->TotalWait?>명</td>
			<td class="td1" width=100 align=center>호출번호</td>
			<td class="td" width=100 align=center><?=$xml2->Group->LastCallNo?>번</td>
		</tr>
		<tr valign=center height=50>
			<td class="td2" width=200 align=center>낙성대공원</td>
			<td class="td" width=100 align=center><?=$xml3->TotalWait?>명</td>
			<td class="td1" width=100 align=center>호출번호</td>
			<td class="td" width=100 align=center><?=$xml3->Group->LastCallNo?>번</td>
		</tr>
	</table>
</body>
</html>