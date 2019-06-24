<?php
/// การตั้งค่าเกี่ยวกับ bot ใน LINE Messaging API
define('LINE_MESSAGE_CHANNEL_ID','1590205061');
define('LINE_MESSAGE_CHANNEL_SECRET','1d07c3906c0ce7e7f7cf71b0f20e10bc');
define('LINE_MESSAGE_ACCESS_TOKEN','/5qKcInqTBGTrFAd52HnHFREKSsP2CHN07FK8036ALc7U5m6nmYJueTRYuMoAGoseez7KarRqVmm/0MByL+T81/fX1Ze7PLk12uaKfu2CqOigopGOB4QBZOIVG3CGoqVYvRACqqhZueFLmndOoWwzwdB04t89/1O/w1cDnyilFU=');
require "vendor/autoload.php";

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
?>
