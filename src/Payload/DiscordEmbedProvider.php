<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedProvider implements \JsonSerializable {

    /** @var string name of provider */
    private $name;
    /** @var string url of provider */
    private $url;

    /** @override */
    public function jsonSerialize() {
        $returnedData = [];

        if($this->name) {
            $returnedData['name'] = $this->name;
        }
        if($this->url) {
            $returnedData['url'] = $this->url;
        }

        return $returnedData;
    }

}