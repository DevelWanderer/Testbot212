<?php // callback.php
$ composer require linecorp/line-bot-sdk
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('</5qKcInqTBGTrFAd52HnHFREKSsP2CHN07FK8036ALc7U5m6nmYJueTRYuMoAGoseez7KarRqVmm/0MByL+T81/fX1Ze7PLk12uaKfu2CqOigopGOB4QBZOIVG3CGoqVYvRACqqhZueFLmndOoWwzwdB04t89/1O/w1cDnyilFU=>');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<1d07c3906c0ce7e7f7cf71b0f20e10bc>']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage('<reply token>', $textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
