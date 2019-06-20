<?php
$access_token = '/5qKcInqTBGTrFAd52HnHFREKSsP2CHN07FK8036ALc7U5m6nmYJueTRYuMoAGoseez7KarRqVmm/0MByL+T81/fX1Ze7PLk12uaKfu2CqOigopGOB4QBZOIVG3CGoqVYvRACqqhZueFLmndOoWwzwdB04t89/1O/w1cDnyilFU=';
$id = $arrayJson['events'][0]['source']['userId'];
$url = 'https://api.line.me/v2/bot/profile/'.$id;
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
