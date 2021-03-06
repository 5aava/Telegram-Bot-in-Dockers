<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

// Add you bot's API key and name
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$bot_api_key  = $_ENV['BOT_API_KEY'];
$bot_username = $_ENV['BOT_USERNAME'];
$hook_url     = $_ENV['HOOK_URL'];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);

    print_r($result);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}