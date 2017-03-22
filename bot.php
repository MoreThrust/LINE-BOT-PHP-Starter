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
  $request4 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1');
  $request5 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2');
  $request6 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3');
  if($request1 == '{"result":"true","value":"1"}'){
  	$Lamp1 = "💡ห้องนอนใหญ่: ปิดอยู่ 0x100078\n";
  }else{
    $Lamp1 = "💡ห้องนอนใหญ่: ปิดอยู่ 🔴\n";
  }
  if($request2 == '{"result":"true","value":"1"}'){
  	$Lamp2 = "💡ห้องนอนเล็ก: เปิดอยู่\n";
  }else{
    $Lamp2 = "💡ห้องนอนเล็ก: ปิดอยู่ 🔴\n";
  }
  if($request3 == '{"result":"true","value":"1"}'){
  	$Lamp3 = "💡ห้องรับแขก: เปิดอยู่ 🔴\n";
  }else{
    $Lamp3 = "💡ห้องรับแขก: ปิดอยู่ 🔴\n";
  }
  if($request4 == '{"result":"true","value":"1"}'){
  	$Air1 = "แอร์ห้องนอนใหญ่: เปิดอยู่\n";
  }else{
    $Air1 = "แอร์ห้องนอนใหญ่: ปิดอยู่\n";
  }
  if($request5 == '{"result":"true","value":"1"}'){
  	$Air2 = "แอร์ห้องนอนเล็ก: เปิดอยู่\n";
  }else{
    $Air2 = "แอร์ห้องนอนเล็ก: ปิดอยู่\n";
  }
  if($request6 == '{"result":"true","value":"1"}'){
  	$Air3 = "แอร์ห้องรับแขก: เปิดอยู่￼￼\n";
  }else{
    $Air3 = "แอร์ห้องรับแขก: ปิดอยู่\n";
  }
  $status = $Lamp1.$Lamp2.$Lamp3.$Air1.$Air2.$Air3;
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $status;
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
