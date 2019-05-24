<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;



class DiscordEmbedThumbnail {

    /** @var string source url of the thumbnail */
    private $url;
    /** @var string a proxied url of the thumbnail */
    private $proxyUrl;
    /** @var int height of thumbnail */
    private $height;
    /** @var int width of thumbnail */
    private $width;


    public function jsonSerialize() {
        $returnedData = [];

        if($this->url) {
            $returnedData["url"] = $this->url;
        }
        if($this->proxyUrl) {
            $returnedData["proxy_url"] = $this->proxyUrl;
        }
        if($this->height) {
            $returnedData["height"] = $this->height;
        }
        if($this->width) {
            $returnedData["width"] = $this->width;
        }

        return $returnedData;
    }

}


