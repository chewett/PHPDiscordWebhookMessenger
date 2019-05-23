<?php

namespace Chewett\PHPDiscordWebhookMessenger;

class DiscordWebhookPayload
{

    private $content = "";
    private $username = null;

    private $textToSpeech;

    private $embeds = [];


    public function __construct($content, $username=null, $avatarUrl=null, $textToSpeech=false)
    {
        $this->content = $content;
        $this->username = $username;
        $this->avatarUrl = $avatarUrl;

        $this->textToSpeech = $textToSpeech;

    }

    public function addEmbed($title, $description) {
        $this->embeds[] = ["title" => $title, "description" => $description];
    }

    public function getPayload() {

        $payload = [
            "content" => $this->content,
            "tts" => $this->textToSpeech,
            "embeds" => $this->embeds
        ];

        if($this->username) {
            $payload['username'] = $this->username;
        }

        if($this->avatarUrl) {
            $payload['avatar_url'] = $this->avatarUrl;
        }

        return json_encode($payload);
    }


}