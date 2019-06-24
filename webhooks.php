<?php // callback.php
//require "vendor/autoload.php";
//require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = '/5qKcInqTBGTrFAd52HnHFREKSsP2CHN07FK8036ALc7U5m6nmYJueTRYuMoAGoseez7KarRqVmm/0MByL+T81/fX1Ze7PLk12uaKfu2CqOigopGOB4QBZOIVG3CGoqVYvRACqqhZueFLmndOoWwzwdB04t89/1O/w1cDnyilFU=';
$id = $arrayJson['events'][0]['source']['userId'];
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $typeMessage = $events['events'][0]['message']['type'];
    $userMessage = $events['events'][0]['message']['text'];
    switch ($typeMessage){
        case 'text':
            switch ($userMessage) {
                case "สวัสดี":
                    $textReplyMessage = "สวัสดีฮัฟ";
                    break;
                case "ทักๆ":
                    $textReplyMessage = "ทักเช่นกันฮัฟ";
                    break;
                default:
                    $textReplyMessage = "สวัสดีฮัฟ";
                    break;
            }
            break;
        default:
            $textReplyMessage = json_encode($events);
            break;
    }
}
// ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
$textMessageBuilder = new TextMessageBuilder($textReplyMessage);

//l ส่วนของคำสั่งตอบกลับข้อความ
$response = $bot->replyMessage($replyToken,$textMessageBuilder);
];
// Make a POST Request to Messaging API to reply to sender
$url = 'https://api.line.me/v2/bot/message/reply';
$data = [
'replyToken' => $replyToken,
'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
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
}
echo "OK";
