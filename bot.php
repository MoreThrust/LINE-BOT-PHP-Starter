<?php
 
$strAccessToken = "1bKxA7ZGjp2P1/6GIBIFiniTJanflttAOEX9svJZKHd4GpTi8fN3VWegRlq1L/wgptw7W7/GvqBFOQTlFYzWNwh3CQy7K0+dKnPuqgZqu9Lj3L/Y2jz8SZnm+Yj7Lqbi9TwbIAGkk2LSA6tD/fWvlwdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "hi"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "เปิดไฟห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "sticker";
  $arrPostData['messages'][0]['packageId'] = "1";
  $arrPostData['messages'][0]['stickerId'] = "1";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/1');
}else if($arrJson['events'][0]['message']['text'] == "ปิดไฟห้องนอนใหญ่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ปิดไฟห้องนอนใหญ่แล้ว";
  $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/0');
}else if($arrJson['events'][0]['message']['text'] == "เช็คสถานะไฟฟ้า"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $request1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1');
  $request2 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2');
  $request3 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3');
  if($request1 == '{"result":"true","value":"1"}'){
  	$Lamp1 = "ไฟห้องนอนใหญ่เ: ปิดอยู่";
  }else{
    $Lamp1 = "ไฟห้องนอนใหญ่: ปิดอยู่";
  }
  if($request2 == '{"result":"true","value":"1"}'){
  	$Lamp2 = "ไฟห้องนอนเล็ก: เปิดอยู่";
  }else{
    $Lamp2 = "ไฟห้องนอนเล็ก: ปิดอยู่";
  }
  $status = [$Lamp1,$Lamp2];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $Lamp1"MT\n".$Lamp2;
}

  if($content['events'][0]['message']['text'] == "ปิดไฟห้องนอนใหญ่แล้ว"){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "sticker";
    $arrPostData['messages'][0]['packageId'] = "1";
    $arrPostData['messages'][0]['stickerId'] = "1";
  }


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
