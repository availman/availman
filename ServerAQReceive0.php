<?php     // raw_post_data 설정
    //ini_set("always_populate_raw_post_data", "true");
    // xml 데이터를 받는다
    $receive_xml = file_get_contents('php://input');
    //$xml=simplexml_load_string($receive_xml);/*
    $myfile = fopen("./AQServerEvent0.xml","w") or die("Unable to open file!");
	fwrite($myfile,$receive_xml);
	fclose($myfile);	

    /* $XML 은 이런 형태를 가진다.
    SimpleXMLElement Object
    (
     [userid] => deuxign
     [point] => 91035
    )
    */


    // 받은 데이터 처리
    // UTF-8을 euc-kr로 변경
    //$userid  = iconv('UTF-8','EUC-KR',$XML->userid);
    //$point   = iconv('UTF-8','EUC-KR',$XML->point);
  // echo $userid;
    //$test =  $xml->saveXML('./AQServerEvent0.xml'); 

?>