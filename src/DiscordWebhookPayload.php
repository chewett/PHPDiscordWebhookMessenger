<?php

namespace Chewett\PHPDiscordWebhookMessenger;

class DiscordWebhookPayload
{

    private $content = "";
    private $username = null;

    private $textToSpeech;

    private $embeds = []; //TODO: Embed is actually a complex datastructure, so lets make it so.


    public function __construct($content, $username=null, $avatarUrl=null, $textToSpeech=false)
    {
        $this->content = $content; //TODO: Content isnt required, lets rip this apart and make chained setters
        $this->username = $username;
        $this->avatarUrl = $avatarUrl;

        $this->textToSpeech = $textToSpeech;

    }

    public function addEmbed($title, $description) {
        $this->embeds[] = ["title" => $title, "description" => $description];
    }

    //TODO: Make this use jsonSerialize rather than making it fancy. It will be much easier to use!
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