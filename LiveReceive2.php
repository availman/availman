<?php 

$week_N=array('','월','화','수','목','금','토','일');
date_default_timezone_set('Asia/Seoul');

//echo '전송결과 : ';
$xml1 = new SimpleXMLElement("./AQServerEvent1.xml",0,true); 
$xml2 = new SimpleXMLElement("./AQServerEvent2.xml",0,true); 
$xml3 = new SimpleXMLElement("./AQServerEvent3.xml",0,true); 

$now_date = date("Y-m-d");
$now_time = date("H:i:s");

$ID =array();
$Name= array();
$WaitNo = array();
$LastCount = array();
$LastCallNo = array();
$LastPrintNo = array();
$datacount = 3;
for($k=0;$k<$datacount;$k++)
{
  $l=$k+1;
    $ID[$k]=$l;
}
$Name[0]='보건소';
$Name[1]='신림체육센터';
$Name[2]='낙성대공원';
$WaitNo[0]=$xml1->Group->WaitNo;
$WaitNo[1]=$xml2->Group->WaitNo;
$WaitNo[2]=$xml3->Group->WaitNo;
$LastCount[0]=$xml1->Group->LastCount;
$LastCount[1]=$xml2->Group->LastCount;
$LastCount[2]=$xml3->Group->LastCount;
$LastCallNo[0]=$xml1->Group->LastCallNo; 
$LastCallNo[1]=$xml2->Group->LastCallNo; 
$LastCallNo[2]=$xml3->Group->LastCallNo; 
$LastPrintNo[0]=$xml1->Group->LastPrintNo;
$LastPrintNo[1]=$xml2->Group->LastPrintNo;
$LastPrintNo[2]=$xml3->Group->LastPrintNo;

//echo '전송결과 : '.$WaitNo[18];


$member_info_xml="";
$xml_data0 = iconv('UTF-8', 'EUC-KR', $now_date);
$xml_data1 = iconv('UTF-8', 'EUC-KR', $now_time); 

$member_info_xml  = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
$member_info_xml .= '<GroupSet>'.chr(10);
$member_info_xml .= '<Today>'.$xml_data0.'</Today>'.chr(10);
$member_info_xml .= '<ThisTime>'.$xml_data1.'</ThisTime>'.chr(10);

for($k=0;$k<$datacount;$k++)
{
  $member_info_xml .= '<Group>'.chr(10);
  $xml_data3 = $ID[$k];
  $xml_data4 = $Name[$k];
  $xml_data5 = $WaitNo[$k];
  $xml_data6 = $LastCount[$k];
  $xml_data7 = $LastCallNo[$k];
  $xml_data8 = $LastPrintNo[$k];
  $member_info_xml .= '<ID>'.$xml_data3.'</ID>'.chr(10);
  $member_info_xml .= '<Name>'.$xml_data4.'</Name>'.chr(10);
  $member_info_xml .= '<WaitNo>'.$xml_data5.'</WaitNo>'.chr(10);
  $member_info_xml .= '<LastCount>'.$xml_data6.'</LastCount>'.chr(10);
  $member_info_xml .= '<LastCallNo>'.$xml_data7.'</LastCallNo>'.chr(10);
  $member_info_xml .= '<LastPrintNo>'.$xml_data8.'</LastPrintNo>'.chr(10);
  $member_info_xml .= '</Group>'.chr(10); 
}

$member_info_xml .= '</GroupSet>'.chr(10);
  // fsock으로 POST 전송
$host = 'localhost'; //'http://www.example.com';
$path = '/ServerAQReceive0.php';

    
$xmlData0 = $member_info_xml;
//$xmlData = new SimpleXMLElement($xmlData0);
$xmlData = $xmlData0;


// 헤더를 설정해서 POST로 전송
$fp = fsockopen($host, '80', $errno, $errstr, 30);
if($fp)
{
  $header  = "POST ".$path." HTTP/1.1\r\n";
  $header .= "Host: ".$host."\r\n";
  $header .= "User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)\r\n";
  $header .= "Content-type: text/html\r\n";
  $header .= "Content-length: ".strlen($xmlData)."\r\n\r\n";
  $header .= $xmlData."\r\n";

  fputs($fp, $header.$xmlData."\r\n\r\n");

  while(!feof($fp))
  {
    $result .= fgets($fp);
  }

  fclose($fp);

        //echo '<br>전송결과 : '.$result; // 결과를 출력한다.
}


?>