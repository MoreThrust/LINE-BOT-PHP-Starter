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
		"type": "template",
  		"altText": "this is a buttons template",
 		 "template": {
     		 "type": "buttons",
     		 "thumbnailImageUrl": "https://example.com/bot/images/image.jpg",
     		  "title": "Menu",
   		  "text": "Please select",
  		   "actions": [
  		       {
            	"type": "postback",
   		         "label": "Buy",
     	       "data": "action=buy&itemid=123"
          },
          {
            "type": "postback",
            "label": "Add to cart",
            "data": "action=add&itemid=123"
          },
          {
            "type": "uri",
            "label": "View detail",
            "uri": "http://example.com/page/123"
          }
      ]
  }
	}
}
echo "OK";
