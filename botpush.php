<?php



require "vendor/autoload.php";

$access_token = 'Aav9TQOu1BLsnujaHhDhPb+EhQkmziFQCt96vYzhxpQHTKC/5VQSO9Ndh/5mIP3OS13GepqEY11PDM8+SlMT8LRBdQEYTJXo7IpC+s0tZQ9sVLMfHKcAvjo2uzc96XYZPatLpdPLK3JPdgu1GlG8VQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '957d18cdc5fe1099cea491013093d89f';

$pushID = 'U7eaa16e2487014784d68e8a7da554368';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







