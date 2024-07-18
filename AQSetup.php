<?php 

//echo $input_xml;
$xml = new SimpleXMLElement("./AdminSet.xml",0,true); 

date_default_timezone_set('Asia/Seoul');
$today = $xml->Today;
$now_date = date("Y-m-d");
$now_time = date("H:i:s");

$Checking=0;
$Checking = $xml->Checking;
//echo $xml->Checking;
$DailyActive = array();
$DailyStartTime = array();
$DailyEndTime = array();
$Week1 = array();//('월', '화', '수', '목', '금', '토', '일');
$Count=0;
$One=1;
$Zero=0;
foreach ($xml->children() as $Dailys) {
	//echo $Dailys->Week.'<br>';
	//echo $Dailys->Active.'<br>';
	//echo $Dailys->StartTime.'<br>';
	//echo $Dailys->EndTime.'<br>';

	$Week1[$Count] = $Dailys->Week;
	$DailyActive[$Count] = $Dailys->Active;
	$DailyStartTime[$Count] = $Dailys->StartTime;
	$DailyEndTime[$Count] = $Dailys->EndTime;
	//echo $Count.'<br>';
	$Count++;
}

//echo '점검중:'.$Checking.'<br>';
/*
for($i=0;$i<$Count;$i++)
{
	echo $i;
	echo $Week1[$i];	
	echo $DailyActive[$i];
	echo $DailyStartTime[$i];
	echo $DailyEndTime[$i];
	echo '<br>';
}*/

?>
<html>
<head>
<title>
	순번정보 관리자 페이지
	</title>
</head>
<body>
	<form action="./AdminSetSave.php" method="POST">
		<table border=0 width=600>
			<tr height=50 valign="center">
				<td valign="center" width=100><Font size=5> 점검중 : </td>
				<?php
					if($Checking==1)
						echo '<td width=100> <input type="checkbox" name="checking" value="1" checked>점검</td>';
					else
						echo '<td width=100> <input type="checkbox" name="checking" value="1">점검</td>';
				?>	
				<td colspan="4">
					<input type="submit" value=" 적 용 ">
				</td>	
				<td></td>		
			</tr>
			<tr>	
				<td width=600 colspan="4"><Font size=5>○일반 업무 동작 설정</td>						
			</tr>
			<tr>	
				<td width=600 colspan="4">--------------------------------------------------------------------------------------</td>						
			</tr>
			<tr>
				<td align=center width=100><Font size=4>동작요일</td>
				<td align=center width=100><Font size=4>업무유무</td>
				<td align=center width=200><Font size=4>시작시간</td>
				<td align=center width=200><Font size=4>종료시간</td>
			</tr>
			<?php 
				for($j=1;$j<$Count;$j++)
				{
					echo '<tr><td align=center width=100>'.$Week1[$j].'</td>';//.'<input type="text" name="week[]" value="'.$Week1[$j].'">';
					if($DailyActive[$j]==1)
						echo '<td align=center width=100> <input type="checkbox" name="active'.$j.'" checked></td>';
					else
						echo '<td align=center width=100> <input type="checkbox" name="active'.$j.'" ></td>';
					echo '<td align=center width=200> <input type="time" name="starttime[]" value="'.$DailyStartTime[$j].'" min="07:00:00" max="23:59:59"></td>';
					echo '<td align=center width=200> <input type="time" name="endtime[]" value="'.$DailyEndTime[$j].'" min="07:00:00" max="23:59:59"></td>';
					//echo '<td>'.$j.'</td>';
					echo '</tr>';
					if($j==7)
					{
						echo '<tr>';
						echo '<td height=20></td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td width=600 colspan="4"><Font size=5>○여권 업무 동작 설정</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td width=600 colspan="4">--------------------------------------------------------------------------------------</td>';
						echo '</tr>';
						echo '<tr>';
						echo '<td align=center width=100><Font size=4>동작요일</td>';
						echo '<td align=center width=100><Font size=4>업무유무</td>';
						echo '<td align=center width=200><Font size=4>시작시간</td>';
						echo '<td align=center width=200><Font size=4>종료시간</td>';
						echo '</tr>';
					}
				}
			?>
			<tr>
				<td colspan="4">
					<input type="submit" value=" 적 용 ">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>