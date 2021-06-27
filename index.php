<?php

     function getCurl($url, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
          echo "CURL ERROR - " . curl_error($ch);
        }else {
          $info = curl_getinfo($ch);
          if ($info['http_code'] != 200) {
            // print_r($info);
          }
        }
        curl_close($ch);  
        return $result;
    }
	
$url='http://localhost:8000/test';
$date_from = "2021-01-05 12:31:20";
$data['lang']="en";
$data['from_date']=!empty($date_from)?date('Y-m-d',strtotime($date_from)):'';
$data['from_time']=!empty($date_from)?date('h:i:s',strtotime($date_from)):'';
$data['device_id']=10;

print_r(json_decode(getCurl($url, $data),true)['msg']);

?>