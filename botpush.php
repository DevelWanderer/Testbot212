
<?php
require "vendor/autoload.php";
$access_token = '/5qKcInqTBGTrFAd52HnHFREKSsP2CHN07FK8036ALc7U5m6nmYJueTRYuMoAGoseez7KarRqVmm/0MByL+T81/fX1Ze7PLk12uaKfu2CqOigopGOB4QBZOIVG3CGoqVYvRACqqhZueFLmndOoWwzwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d07c3906c0ce7e7f7cf71b0f20e10bc';
$pushID = 'U247e07dbd7112244b44c934915d5aceb';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
