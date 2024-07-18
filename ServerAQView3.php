<?php 

$week_N=array('','월','화','수','목','금','토','일');
date_default_timezone_set('Asia/Seoul');
$xml1 = new SimpleXMLElement("./AQServerEvent3.xml",0,true); 

$groupinfoID =array();
$groupinfoName= array();
$groupinfoWaitCount = array();
$groupinfoLastCount = array();
$groupinfoLastCallNo = array();
$groupinfoLastPrintNo = array();
$total_wait = 0;

		$datacount=0;
		foreach($xml1->Group as $group1)
		{
			$groupinfoID[$datacount] = $group1[$datacount]->ID;
			$groupinfoName[$datacount] = $group1[$datacount]->Name;
			$groupinfoWaitCount[$datacount] = $group1[$datacount]->WaitNo;
			$groupinfoLastCount[$datacount] = $group1[$datacount]->LastCount;
			$groupinfoLastCallNo[$datacount] = $group1[$datacount]->LastCallNo;
			$groupinfoLastPrintNo[$datacount] = $group1[$datacount]->LastPrintNo;
			$total_wait += $groupinfoWaitCount[$datacount];
			$datacount++;
		}
		//echo $datacount;		
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset ="utf-8">
	<META HTTP-EQUIV="refresh" CONTENT="5">
	<style type="text/css">
		.img1{
			background:url(./sample3.jpg);
			background-size: 100% 100%;
			width:400;
			height:225;

		}
		.td {
			font-size:25px;
			font-family:"나눔스퀘어";
			color:black;
			text-align:center;
		}
		.td1 {
			font-size:50px;
			font-family:"나눔스퀘어";
			color:white;
			text-align:center;
		}
		
		.td2 {
			font-size:60px;
			font-family:"나눔스퀘어";
			color:black;
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
	<p>전체대기인수 : <?=$total_wait?></p>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[0]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[0]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[0]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[0]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[1]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[1]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[1]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[1]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[2]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[2]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[2]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[2]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[3]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[3]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[3]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[3]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[4]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[4]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[4]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[4]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[5]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[5]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[5]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[5]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[6]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[6]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[6]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[6]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[7]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[7]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[7]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[7]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
	<table class="img1" border=0 cellspacing=0 cellpadding=0 aligh=center>
		<tr valign=center height=60>
			<td class="td" width=158 align=center colspan="2"></td>
			<td class="td" width=229 align=center colspan="3"><b><?=$groupinfoName[8]?></td>
			<td class="td" width=13 align=center colspan="2"></td>
		</tr>

		<tr height=3>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td width=145 height=33></td>
			<td class="td2" width=242 rowspan="2" colspan="5"><B>&nbsp;<?=$groupinfoLastCallNo[8]?></B></td>
			<td width=13 rowspan="2"></td>				
		</tr>
		<tr>
			<td class="td1" width=145 height=77 align=center valign="center"><B><?=$groupinfoLastCount[8]?></B></td>
		</tr>
		<tr height=14 valign=center>
			<td colspan="7"></td>
		</tr>
		<tr height=37 valign=center>
			<td width=219 colspan="3"></td>
			<td width=113 class="td3" align=center valign="center"><b><?=$groupinfoWaitCount[8]?>명</td>	
			<td colspan="2"></td>
		</tr>	
		<tr height=1>
			<td colspan="7"></td>
		</tr>
	</table>
</body>
</html>