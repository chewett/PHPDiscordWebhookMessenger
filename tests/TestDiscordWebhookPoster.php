<?php


namespace Chewett\PHPDiscordWebhookMessenger\Test;


use Chewett\PHPDiscordWebhookMessenger\DiscordWebhookPayload;
use Chewett\PHPDiscordWebhookMessenger\DiscordWebhookPoster;
use PHPUnit\Framework\TestCase;

class TestDiscordWebhookPoster extends TestCase
{

    const CONFIG_FILE_LOCATION = __DIR__ . "/discord_testing_config.json";
    static $testConfig = null;

    public static function setUpBeforeClass()
    {
        if(!is_file(TestDiscordWebhookPoster::CONFIG_FILE_LOCATION)) {
            self::markTestSkipped("Config file not present, skipping test");
        }

       self::$testConfig = json_decode(file_get_contents(TestDiscordWebhookPoster::CONFIG_FILE_LOCATION), true);
    }


    public function payloadArgsProvider() {
        $avatarUrl = "https://chewett.co.uk/apple-icon-120x120.png";

        return [
            "Only Content" => ["Hello World!"],
            "Content and Username" => ["Hello World!", "PhpUnit"],
            "Content and avatarUrl" => ["Hello World", null, $avatarUrl],
            "Content and tts=>true" => ["Hello World!", null, null, true],
        ];
    }

    private function createObject($content, $username=null, $avatarUrl=null, $textToSpeech=false) {
        $payload = new DiscordWebhookPayload($content, $username, $avatarUrl, $textToSpeech);

        return $payload;
    }

    /** @dataProvider payloadArgsProvider */
    public function testConstructor($content, $username=null, $avatarUrl=null, $textToSpeech=false) {


        $payload = $this->createObject($content, $username, $avatarUrl, $textToSpeech);

        DiscordWebhookPoster::postMessage(self::$testConfig['testing_webhook_url'], $payload);

    }
}