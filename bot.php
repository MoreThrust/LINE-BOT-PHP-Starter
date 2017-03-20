<?php
$access_token = '1bKxA7ZGjp2P1/6GIBIFiniTJanflttAOEX9svJZKHd4GpTi8fN3VWegRlq1L/wgptw7W7/GvqBFOQTlFYzWNwh3CQy7K0+dKnPuqgZqu9Lj3L/Y2jz8SZnm+Yj7Lqbi9TwbIAGkk2LSA6tD/fWvlwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		if ($event == 'hi') {
			"events": [
      {
        "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
        "type": "message",
        "timestamp": 1462629479859,
        "source": {
             "type": "user",
             "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
         },
         "message": {
             "id": "325708",
             "type": "text",
             "text": "Hello, world"
          }
      }
  ]
		}
	}
}
echo "OK";
