<?php
/**
 * Created by PhpStorm.
 * User: Andriy Pospielov
 * Date: 11.11.2016
 * Time: 19:55
 */
require_once 'vendor/autoload.php';
file_put_contents('log', $_SERVER);
// create a bot
$bot = new \TelegramBot\Api\Client('272582059:AAH2SX0V7ujCIu5CmY6tFtlNsTXp91j9fpA', '6raD1_umXF24unknJRn647D0vA:I18yW');
// run, bot, run!
$bot->run();
// setting up start command
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Hello world!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});