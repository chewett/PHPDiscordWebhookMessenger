<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedAuthor implements \JsonSerializable {

    /** @var string url of author */
    private $name;
    /** @var string name of author */
    private $url;
    /** @var string url of author icon (only supports http(s) and attachments) */
    private $iconUrl;
    /** @var string a proxied url of author icon */
    private $proxyIconUrl;

    /** @override */
    public function jsonSerialize() {
        $returnedData = [];

        if($this->name) {
            $returnedData['name'] = $this->name;
        }
        if($this->url) {
            $returnedData['url'] = $this->url;
        }
        if($this->iconUrl) {
            $returnedData['icon_url'] = $this->iconUrl;
        }
        if($this->proxyIconUrl) {
            $returnedData['proxy_icon_url'] = $this->proxyIconUrl;
        }

        return $returnedData;
    }

}