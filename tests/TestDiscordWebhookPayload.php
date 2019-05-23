<?php


namespace Chewett\PHPDiscordWebhookMessenger\Test;


use Chewett\PHPDiscordWebhookMessenger\DiscordWebhookPayload;
use PHPUnit\Framework\TestCase;

class TestDiscordWebhookPayload extends  TestCase
{

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

        $this->assertNotNull($payload);
    }

    /** @dataProvider payloadArgsProvider */
    public function testToJson($content, $username=null, $avatarUrl=null, $textToSpeech=false) {
        $payload = $this->createObject($content, $username, $avatarUrl, $textToSpeech);

        $jsonResponse = $payload->getPayload();
        $this->assertJson($jsonResponse);
    }

    /** @dataProvider payloadArgsProvider */
    public function testAddingEmbedding($content, $username=null, $avatarUrl=null, $textToSpeech=false) {
        $payload = $this->createObject($content, $username, $avatarUrl, $textToSpeech);

        $payload->addEmbed("Title 1", "Description 1");

        $this->assertNotNull($payload);


    }



}