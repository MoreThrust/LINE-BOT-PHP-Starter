<?php
$access_token = '1bKxA7ZGjp2P1/6GIBIFiniTJanflttAOEX9svJZKHd4GpTi8fN3VWegRlq1L/wgptw7W7/GvqBFOQTlFYzWNwh3CQy7K0+dKnPuqgZqu9Lj3L/Y2jz8SZnm+Yj7Lqbi9TwbIAGkk2LSA6tD/fWvlwdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {

		if ($event['message']['text'] == "Hi" or "hi" or "Hello" or "hello" or "Hey" or "hey" or "MT" or "mt" or "สวัสดี" or "ไง" or "เฮ้" or "โย่" or "เฮ้ย") {
			$replyToken = $event['replyToken'];

			$messages = [
				'type' => 'text',
				'text' => "ว่าไง"
			];

			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages],];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "เปิดไฟห้องนอนใหญ่") {
			$replyToken = $event['replyToken'];

			$messages = [
				'type' => 'text',
				'text' => "เปิดไฟห้องนอนใหญ่แล้ว"
			];

            $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/1');
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages],];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "ปิดไฟห้องนอนใหญ่") {
			$replyToken = $event['replyToken'];

			$messages = [
				'type' => 'text',
				'text' => "ปิดไฟห้องนอนใหญ่แล้ว"
			];

            $request = file_get_contents('https://api.anto.io/channel/set/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1/0');
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages],];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		}

        if ($event['message']['text'] == "chk") {
			$replyToken = $event['replyToken'];

			$messages = [
				'type' => 'text',
				'text' => $Lamp1
			];

            if($requestL1 == '{"result":"true","value":"1"}'){
                $Lamp1 = "ไฟห้องนอนใหญ่: เปิดอยู่";
            }

            $requestL1 = file_get_contents('https://api.anto.io/channel/get/OSZ8RPcqVh2G78Ua2xkqzSnyjrzc0Yp8xFkxHMif/Smart_Home/Lamp1');
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages' => [$messages],];
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
