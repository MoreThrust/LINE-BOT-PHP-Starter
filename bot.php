<?php
$access_token = '1bKxA7ZGjp2P1/6GIBIFiniTJanflttAOEX9svJZKHd4GpTi8fN3VWegRlq1L/wgptw7W7/GvqBFOQTlFYzWNwh3CQy7K0+dKnPuqgZqu9Lj3L/Y2jz8SZnm+Yj7Lqbi9TwbIAGkk2LSA6tD/fWvlwdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {

		if ($event['message']['text'] == "Hi") {
			$replyToken = $event['replyToken'];

			$messages = ['type' => 'text','text' => "ว่าไง มีอะไรให้ช่วยเอ่ย??"];

			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages]];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "เปิดไฟห้องนอนใหญ่") {
			$replyToken = $event['replyToken'];

            $messages = ['type' => 'text','text' => "เปิดไฟห้องนอนใหญ่แล้ว"];

            $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/1');
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$message]];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "ปิดไฟห้องนอนใหญ่") {
			$replyToken = $event['replyToken'];

			$messages = ['type' => 'text','text' => "ปิดไฟห้องนอนใหญ่แล้ว"];

            $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/0');
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages]];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "สัส") {
			$replyToken = $event['replyToken'];

            $messages = ["type" => "location","title" => "มึงไปเล่นตรงนู้นนะ","address" => "โรงพยาบาลศรีธัญญา","latitude" => 13.845162,"longitude" => 100.517254];
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages]];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "ควย") {
			$replyToken = $event['replyToken'];

			$messages = ["type" => "image","originalContentUrl" => "http://www.bloggang.com/data/kunpae/picture/1195109535.jpg","previewImageUrl" => "httpd=&cad=rja&uact=com%2Fwatch%3Fv%3D1fCrqWIQ19A&psig=AFQjCNHxu1VCN5i07g-757NNbe873scdGA&ust=1490164541165635"];

			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages]];
			$post = json_encode($date,$dataK);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "chk") {
			$replyToken = $event['replyToken'];

            $requestL1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1');
            $requestL2 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp2');
            $requestL3 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp3');
            $requestA1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air1');
            $requestA2 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air2');
            $requestA3 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Air3');
            
            if($requestL1 == '{"result":"true","value":"1"}'){
                $Lamp1 = "ไฟห้องนอนใหญ่: เปิดอยู่";
            }else{
                $Lamp1 = "ไฟห้องนอนใหญ่: ปิดอยู่";
            }
            if($requestL2 == '{"result":"true","value":"1"}'){
                $Lamp2 = "ไฟห้องนอนเล็ก: เปิดอยู่";
            }else{
                $Lamp2 = "ไฟห้องนอนเล็ก: ปิดอยู่";
            }
            if($requestL3 == '{"result":"true","value":"1"}'){
                $Lamp3 = "ไฟห้องรับแขก: เปิดอยู่";
            }else{
                $Lamp3 = "ไฟห้องรับแขก: ปิดอยู่";
            }
            if($requestA1 == '{"result":"true","value":"1"}'){
                $Air1 = "แอร์ห้องนอนใหญ่: เปิดอยู่";
            }else{
                $Air1 = "แอร์ห้องนอนใหญ่: ปิดอยู่";
            }
            if($requestA2 == '{"result":"true","value":"1"}'){
                $Air2 = "แอร์ห้องนอนเล็ก: เปิดอยู่";
            }else{
                $Air2 = "แอร์ห้องนอนเล็ก: ปิดอยู่";
            }
            if($requestA3 == '{"result":"true","value":"1"}'){
                $Air3 = "แอร์ห้องรับแขก: เปิดอยู่";
            }else{
                $Air3 = "แอร์ห้องรับแขก: ปิดอยู่";
            }
            
            $status = $Lamp1;
            $status += $Lamp2;
            $status += $Lamp3;
            $status += $Air1;
            $status += $Air2;
            $status += $Air3;
            $txtSt = $status;
			$messages = ['type' => 'text','text' => $txtSt];

			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages]];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

            $ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
	}
}
echo "OK";
