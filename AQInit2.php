<?php 

//if($xml00 == false)
{
	date_default_timezone_set('Asia/Seoul');
	$now_date = date("Y-m-d");
	$now_time = date("H:i:s");
	$member_info_xml0="";
	$member_info_xml0  = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
    	$member_info_xml0 .= '<GroupSet>'.chr(10);
    	$member_info_xml0 .= '<Today>'.$now_date.'</Today>'.chr(10);
    	$member_info_xml0 .= '<ThisTime>'.$now_time.'</ThisTime>'.chr(10);
    	$member_info_xml0 .= '<TotalWait>0</TotalWait>'.chr(10);
    	for($k=1;$k<33;$k++)
		{
			$member_info_xml0 .= '<Group>'.chr(10);
    		$member_info_xml0 .= '<ID>'.$k.'</ID>'.chr(10);
    		$member_info_xml0 .= '<Name>0</Name>'.chr(10);
    		$member_info_xml0 .= '<WaitNo>0</WaitNo>'.chr(10);
    		$member_info_xml0 .= '<LastCount>0</LastCount>'.chr(10);
    		$member_info_xml0 .= '<LastCallNo>0</LastCallNo>'.chr(10);
    		$member_info_xml0 .= '<LastPrintNo>0</LastPrintNo>'.chr(10);
    		$member_info_xml0 .= '</Group>'.chr(10); 
		}    	
    	$member_info_xml0 .= '</GroupSet>'.chr(10);

    	$newfile00 = fopen("./AQEvent2.xml","w") or die("Unable to open file!");
    	fwrite($newfile00, $member_info_xml0);
    	fclose($newfile00);

        $checking_info = '<'.chr(63).'xml version="1.0" encoding="UTF-8" '.chr(63).'>'.chr(10);
        $checking_info .= '<GroupSet>'.chr(10);
        $checking_info .= '<Checking>0</Checking>'.chr(10);
        $checking_info .= '</GroupSet>'.chr(10);
        $chk_file = fopen("./AQ_SET2.xml","w") or die("Unable to open file!");
        fwrite($chk_file, $checking_info);
        fclose($chk_file);
}
?>