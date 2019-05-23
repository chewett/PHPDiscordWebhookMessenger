<?php


namespace Chewett\PHPDiscordWebhookMessenger\Test;


use Chewett\PHPDiscordWebhookMessenger\DiscordWebhookPayload;
use Chewett\PHPDiscordWebhookMessenger\DiscordWebhookPoster;
use PHPUnit\Framework\TestCase;


/**
 * Class TestDiscordWebhookPoster
 *
 * Note: These are full integration testing and will attempt to post messages to a Discord webhook URL.
 *
 * These are used to make sure that Discord is accepting the formatting and will be used in the future if
 * there are API breaking changes.
 *
 * @package Chewett\PHPDiscordWebhookMessenger\Test
 */
class TestDiscordWebhookPoster extends TestCase
{
    /** @var string Store a reference to the config file so we can reference it from multiple places */
    const CONFIG_FILE_LOCATION = __DIR__ . "/discord_testing_config.json";
    /** @var array TODO: COMMENT THIS */
    static $testConfig = [];

    public static function setUpBeforeClass()
    {
        //If the file doesnt exist, skip all these tests. We need the config file for this.
        if(!is_file(TestDiscordWebhookPoster::CONFIG_FILE_LOCATION)) {
            self::markTestSkipped("Config file not present, skipping test");
        }

        //Load the config into a static variable used across all the tests and deserialize it as an array
        self::$testConfig = json_decode(file_get_contents(TestDiscordWebhookPoster::CONFIG_FILE_LOCATION), true);
    }


    public function payloadArgsProvider() {
        $avatarUrl = "https://chewett.co.uk/apple-icon-120x120.png";
        $oneEmbed = [["Embed title", "Embed description"]];
        $twoEmbeds = [["Embed title", "Embed description"], ["Embed title2", "Embed description2"]];

        return [
            "Only Content" => ["Hello World!"],
            "Content and Username" => ["Hello World with a custom name", "PhpUnit"],
            "Content and avatarUrl" => ["Hello World with a custom avatar", null, $avatarUrl],
            "Content and tts=>true" => ["Hello World with TTS enabled", null, null, true],
            "Content and basic embed" => ["Content and basic embed: ", null, null, false, $oneEmbed],
            "Content and basic embed2" => ["Content and basic embed 2", null, null, false, $twoEmbeds]
        ];
    }

    //FIXME: Rework this once I have fully worked out the entire discord API and what classes I need.
    private function createObject($content, $username=null, $avatarUrl=null, $textToSpeech=false, $embeds=[]) {
        $payload = new DiscordWebhookPayload($content, $username, $avatarUrl, $textToSpeech);

        foreach($embeds as $embed) {
            $payload->addEmbed($embed[0], $embed[1]);
        }

        return $payload;
    }

    /** @dataProvider payloadArgsProvider */
    public function testConstructor($content, $username=null, $avatarUrl=null, $textToSpeech=false, $embeds=[]) {
        $payload = $this->createObject($content, $username, $avatarUrl, $textToSpeech, $embeds);

        $result = DiscordWebhookPoster::postMessage(self::$testConfig['testing_webhook_url'], $payload);
        $this->assertNotNull($result);

    }
}