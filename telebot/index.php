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
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/start', '/enemenemeck']], null, true);

    $bot->sendMessage($message->getChat()->getId(), $answer, false, null, null, $keyboard);
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


