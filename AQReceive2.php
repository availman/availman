<?php 
ini_set("always_populate_raw_post_data","true");
// AQ에서 Data 읽어오기
$name0 = $_GET["waitinfo"];
//print $name2;
$myfile = fopen("./newfile2.xml","w") or die("Unable to open file!");
fwrite($myfile,$name0);
fclose($myfile);	
// AQ에서 읽어온 데이터를 newfile.xml에 저장함.

// 저장된 newfile.xml의 데이터를 읽어와서 다른곳에 저장하기 위함.
$week_N=array('','월','화','수','목','금','토','일');

$input_xml = new SimpleXMLElement($name0,0,false) or die("error");
//echo $input_xml;
$xml = new SimpleXMLElement("./AQEvent2.xml",0,true); 
$xml_admin = new SimpleXMLElement("./AQ_SET2.xml",0,true); 
$input_teller  = $input_xml->TellerID;
$input_groupid = $input_xml->GroupID;
$input_ticketno = $input_xml->TicketNo;
$groupinfoID =array();
$groupinfoName= array();
$groupinfoWaitCount = array();
$groupinfoLastCount = array();
$groupinfoLastCallNo = array();
$groupinfoLastPrintNo = array();
$datacount = 0;
$total_wait=0;
$member_info_xml="";
$checking_info = "";

date_default_timezone_set('Asia/Seoul');
$today = $xml->Today;
$now_date = date("Y-m-d");
$now_time = date("H:i:s");

	// 금일 데이터가 날짜가 틀리면 초기화
	if($today != $now_date)
	{
		$member_info_xml  = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
    	$member_info_xml .= '<GroupSet>'.chr(10);
    	$member_info_xml .= '<Today>'.$now_date.'</Today>'.chr(10);
    	$member_info_xml .= '<ThisTime>'.$now_time.'</ThisTime>'.chr(10);
    	$member_info_xml .= '<TotalWait>0</TotalWait>'.chr(10);
    	for($k=1;$k<33;$k++)
		{
			$member_info_xml .= '<Group>'.chr(10);
    		$member_info_xml .= '<ID>'.$k.'</ID>'.chr(10);
    		$member_info_xml .= '<Name>0</Name>'.chr(10);
    		$member_info_xml .= '<WaitNo>0</WaitNo>'.chr(10);
    		$member_info_xml .= '<LastCount>0</LastCount>'.chr(10);
    		$member_info_xml .= '<LastCallNo>0</LastCallNo>'.chr(10);
    		$member_info_xml .= '<LastPrintNo>0</LastPrintNo>'.chr(10);
    		$member_info_xml .= '</Group>'.chr(10); 
		}    	
    	$member_info_xml .= '</GroupSet>'.chr(10);

    	$newfile0 = fopen("./AQEvent2.xml","w") or die("Unable to open file!");
    	fwrite($newfile0, $member_info_xml);
    	fclose($newfile0);

    	
    	$checking_info = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
    	$checking_info .= '<GroupSet>'.chr(10);
    	$checking_info .= '<Checking>0</Checking>'.chr(10);
    	$checking_info .= '</GroupSet>'.chr(10);
    	$chk_file = fopen("./AQ_SET2.xml","w") or die("Unable to open file!");
    	fwrite($chk_file, $checking_info);
    	fclose($chk_file);
    }
    else
    {
		$datacount=0;
		$xml->ThisTime[0] = $now_time;
		$total_wait = 0;
		foreach($input_xml->GroupInfo->children() as $group)
		{
			$groupinfoID[$datacount] = $group['id'];
			$groupinfoName[$datacount] = $group['name'];
			$groupinfoWaitCount[$datacount] = $group['waitCount'];
			$groupinfoLastCount[$datacount] = $group['LastCount'];
			$groupinfoLastCallNo[$datacount] = $group['LastCallNo'];
			$groupinfoLastPrintNo[$datacount] = $group['LastPrintNo'];
			$total_wait += $group['waitCount'];
			$datacount++;
		}
		$xml->TotalWait[0] = $total_wait;

		if($input_teller==0){
			$xml->Group[$input_groupid-1]->LastPrintNo = $input_ticketno;
		}
		else
		{
			if($input_groupid!=1){
				$xml->Group[$input_groupid-1]->LastCallNo = $input_ticketno;
			}
			else{
					$xml->Group[$input_groupid-1]->LastCallNo = $input_ticketno;
			}
			$xml->Group[$input_groupid-1]->LastCount = $input_teller;
		}

		for($k=0;$k<$datacount;$k++)
		{
			$xml->Group[$k]->Name = $groupinfoName[$k];
			$xml->Group[$k]->WaitNo = $groupinfoWaitCount[$k];
		} 
		$test =  $xml->asXML('./AQEvent2.xml'); 
	}

{
	$xml_data0 = iconv('UTF-8', 'EUC-KR', $xml->Today);
	$xml_data1 = iconv('UTF-8', 'EUC-KR', $xml->ThisTime);	
	$xml_data2 = iconv('UTF-8', 'EUC-KR', $xml->TotalWait);	
	$member_info_xml  = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
    $member_info_xml .= '<GroupSet>'.chr(10);
    $member_info_xml .= '<Today>'.$xml_data0.'</Today>'.chr(10);
    $member_info_xml .= '<ThisTime>'.$xml_data1.'</ThisTime>'.chr(10);
    $member_info_xml .= '<TotalWait>'.$xml_data2.'</TotalWait>'.chr(10);

	for($k=0;$k<$datacount;$k++)
	{
		$member_info_xml .= '<Group>'.chr(10);
		//$xml_data3 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->ID);
		//$xml_data4 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->Name);		
		//$xml_data5 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->WaitNo);
		//$xml_data6 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->LastCount);
		//$xml_data7 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->LastCallNo);
		//$xml_data8 = iconv('UTF-8', 'EUC-KR', $xml->Group[$k]->LastPrintNo);
		$xml_data3 = $xml->Group[$k]->ID;
		$xml_data4 = $xml->Group[$k]->Name;
		$xml_data5 = $xml->Group[$k]->WaitNo;
		$xml_data6 = $xml->Group[$k]->LastCount;
		$xml_data7 = $xml->Group[$k]->LastCallNo;
		$xml_data8 = $xml->Group[$k]->LastPrintNo;
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
    $path = '/ServerAQReceive2.php';

    
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
}
?>