<?php
// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
require "vendor/autoload.php";

$test = $_GET['word'];

//$access_token = 'Aav9TQOu1BLsnujaHhDhPb+EhQkmziFQCt96vYzhxpQHTKC/5VQSO9Ndh/5mIP3OS13GepqEY11PDM8+SlMT8LRBdQEYTJXo7IpC+s0tZQ9sVLMfHKcAvjo2uzc96XYZPatLpdPLK3JPdgu1GlG8VQdB04t89/1O/w1cDnyilFU=';

//$channelSecret = '957d18cdc5fe1099cea491013093d89f';

//$pushID = 'U7eaa16e2487014784d68e8a7da554368';

define('LINE_MESSAGE_CHANNEL_ID','1627512422');
define('LINE_MESSAGE_CHANNEL_SECRET','957d18cdc5fe1099cea491013093d89f');
define('LINE_MESSAGE_ACCESS_TOKEN','Aav9TQOu1BLsnujaHhDhPb+EhQkmziFQCt96vYzhxpQHTKC/5VQSO9Ndh/5mIP3OS13GepqEY11PDM8+SlMT8LRBdQEYTJXo7IpC+s0tZQ9sVLMfHKcAvjo2uzc96XYZPatLpdPLK3JPdgu1GlG8VQdB04t89/1O/w1cDnyilFU=');
 
// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");
 
///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
 
 
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
 
// userId 
$userId = 'U7eaa16e2487014784d68e8a7da554368';
// ทดสอบส่ง push ข้อความอย่างง่าย
$textPushMessage = 'สวัสดีครับ';                
$messageData = new TextMessageBuilder($textPushMessage);        
             
$response = $bot->pushMessage($userId,$messageData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
 
// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
