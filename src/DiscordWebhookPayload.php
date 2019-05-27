<?php

namespace Chewett\PHPDiscordWebhookMessenger;

use Chewett\PHPDiscordWebhookMessenger\Payload\DiscordEmbedPayload;


class DiscordWebhookPayload implements \JsonSerializable
{

    private $content = "";
    private $username = null;
    private $avatarUrl;
    private $textToSpeech;
    private $embeds = [];

    /**
     * @param string $content
     * @return DiscordWebhookPayload
     */
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    /**
     * @param null $username
     * @return DiscordWebhookPayload
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * @param mixed $avatarUrl
     * @return DiscordWebhookPayload
     */
    public function setAvatarUrl($avatarUrl) {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @param mixed $textToSpeech
     * @return DiscordWebhookPayload
     */
    public function setTextToSpeech($textToSpeech) {
        $this->textToSpeech = $textToSpeech;
        return $this;
    }

    /**
     * @param DiscordEmbedPayload $embedPayload
     * @return DiscordWebhookPayload
     */
    public function addEmbed(DiscordEmbedPayload $embedPayload) {
        $this->embeds[] = $embedPayload;
        return $this;
    }

    public function jsonSerialize() {

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
        if($this->embeds) {
            $payload['embeds'] = $this->embeds;
        }

        return $payload;
    }


}