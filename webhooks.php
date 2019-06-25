<?php
require "vendor/autoload.php";
require_once 'botpush.php';
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
$content = file_get_contents('php://input');
$hash = hash_hmac('sha256', $content, LINE_MESSAGE_CHANNEL_SECRET, true);
$signature = base64_encode($hash);
$events = $bot->parseEventRequest($content, $signature);
$eventObj = $events[0]; // Event Object ของ array แรก
$eventType = $eventObj->getType();
$userId = NULL;
$groupId = NULL;
$roomId = NULL;
$sourceId = NULL;
$sourceType = NULL;
// สร้างตัวแปร replyToken และ replyData สำหรับกรณีใช้ตอบกลับข้อความ
$replyToken = NULL;
$replyData = NULL;
// สร้างตัวแปร ไว้เก็บค่าว่าเป้น Event ประเภทไหน
$eventMessage = NULL;
$eventPostback = NULL;
$eventJoin = NULL;
$eventLeave = NULL;
$eventFollow = NULL;
$eventUnfollow = NULL;
$eventBeacon = NULL;
$eventAccountLink = NULL;
$eventMemberJoined = NULL;
$eventMemberLeft = NULL;
switch($eventType){
    case 'message': $eventMessage = true; break;    
    case 'postback': $eventPostback = true; break;  
    case 'join': $eventJoin = true; break;  
    case 'leave': $eventLeave = true; break;    
    case 'follow': $eventFollow = true; break;  
    case 'unfollow': $eventUnfollow = true; break;  
    case 'beacon': $eventBeacon = true; break;     
    case 'accountLink': $eventAccountLink = true; break;       
    case 'memberJoined': $eventMemberJoined = true; break;       
    case 'memberLeft': $eventMemberLeft = true; break;     
if($eventObj->isUserEvent()){
        $userId = $eventObj->getUserId();  
        $sourceType = "USER";
if ($response->isSucceeded()) {
        $userData = $response->getJSONDecodedBody(); // return array     
        // $userData['userId']
        // $userData['displayName']
        // $userData['pictureUrl']
        // $userData['statusMessage']
      $textReplyMessage = 'สวัสดีครับ คุณ '.$userData['displayName'];     
      }else{
      $textReplyMessage = 'สวัสดีครับ คุณคือใคร';
      }
      $replyData = new TextMessageBuilder($textReplyMessage);                                                 
      break;   
$response = $bot->replyMessage($replyToken,$replyData);
if ($response->isSucceeded()) {
      echo 'Succeeded!';
      return;
      }
      // Failed
      echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
      ?> 
