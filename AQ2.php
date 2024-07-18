<?php 

//echo $input_xml;
$xml = new SimpleXMLElement("./AQ_SET2.xml",0,true); 

$Checking=0;
$Checking = $xml->Checking;
//echo $Checking.'안나오냐?';
?>
<html>
<head>
<title>
	신림체육관 관리자 페이지
</title>
<style>
input[type=radio]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(4); /* IE */
  -moz-transform: scale(4); /* FF */
  -webkit-transform: scale(4); /* Safari and Chrome */
  -o-transform: scale(4); /* Opera */
  padding: 5px;
}
</style>
</head>
<body>
	<form action="./AQSet2Save.php" method="POST">
		<table border=0 width=1000>
			<tr height=150 valign="center">
				<td valign="center" width=200><Font size=5> 신림체육관 : </Font></td> 
				<?php
				//echo $Checking;
					if($Checking==0)
						echo '<td color=blue width=50><input type="radio" style="width:20px;height:20px;border:1px;" name="checking" value="0" checked></td><td width=200 ><H1>운영중</H1></td>';
					else 
						echo '<td color=black width=50><input type="radio" style="width:20px;height:20px;border:1px;" name="checking" value="0"></td><td width=200><H1>운영중</H1></td>';
					if($Checking==1)
						echo '<td color=blue width=50><input type="radio" style="width:20px;height:20px;border:1px;" name="checking" value="1" checked></td><td width=200 ><H1>점검중</td>';
					else 
						echo '<td color=black width=50><input type="radio"  style="width:20px;height:20px;border:1px;" name="checking" value="1"></td><td width=200><H1>점검중</td>';
					if($Checking==2)
						echo '<td color=blue width=50><input type="radio" style="width:20px;height:20px;border:1px;" name="checking" value="2" checked></td><td width=200 ><H1>조기 종료</td>';
					else 
						echo '<td color=black width=50><input type="radio"  style="width:20px;height:20px;border:1px;" name="checking" value="2"></td><td width=200><H1>조기 종료</td>';
							?>	
			</tr>
			<tr>
			<td><input type="submit" style="font-size:40px; width:120px;height:80px;border:1px;" value=" 적 용 "></td>	
			<td></td>		
			</tr>
		</table>
	</form>
</body>
</html>