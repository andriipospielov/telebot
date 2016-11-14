<?php
/**
 * Created by PhpStorm.
 * User: Andriy Pospielov
 * Date: 11.11.2016
 * Time: 19:55
 */
require_once 'vendor/autoload.php';
file_put_contents('log.log', $_SERVER);
// create a bot
$bot = new \TelegramBot\Api\Client('272582059:AAFGXv_S8XGfvtryd-vCqE2506vBHpPeNi4');
// run, bot, run!
$bot->run();
// setting up start commands
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Hi there!';
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/start', '/enemenemeck', '/dankmeme']], null, true);

    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);
});



$bot->command('dankmeme', function ($message) use ($bot) {
    // create curl resource
    $ch = curl_init();
// set url
    curl_setopt($ch, CURLOPT_URL, "http://browsedankmemes.com/");
//return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $output contains the output string
    $output = curl_exec($ch);
    $dom = new DOMDocument();
    $dom->loadHTML($output);
//load all images
    $elements = $dom->getElementsByTagName('img');

//get all images' srcs
    $src = array();
    foreach ($elements as $element){
        $src[] = $element -> getAttribute('src');
    }
//pick a random one
    $ranImgSrc= $src[array_rand($src)];

//    download and send it to a user
    $bot->sendPhoto($message->getChat()->getId(), $ranImgSrc );


    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/start', '/dankmeme']], null, true);
//    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);


});



$bot->command('enemenemeck', function ($message) use ($bot) {
    $answer = 'Do you wanna see some magic?';
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/yes', '/no']], null, true);

    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);
});
$bot->command('no', function ($message) use ($bot) {
    $answer = 'that \'s sad =(';
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/start', '/enemenemeck']], null, true);

    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);
});
$bot->command('yes', function ($message) use ($bot) {
    $answer = 'boom!';
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/start', '/enemenemeck']], null, true);
    $picture = new \CURLFile('image.jpg');
    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);
    $bot->sendPhoto($message->getChat()->getId(),$picture);

});


$bot->run();


