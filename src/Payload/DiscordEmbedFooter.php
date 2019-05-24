<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedFooter implements \JsonSerializable {

    /** @var string footer text */
    private $text;
    /** @var string url of footer icon (only supports http(s) and attachments) */
    private $iconUrl;
    /** @var string a proxied url of footer icon */
    private $proxyIconUrl;

    /**
     *
     * @param string $text
     */
    public function __construct($text) {
        $this->text = $text;
    }

    /** @override */
    public function jsonSerialize() {
        $returnedData = [
            'text' => $this->text
        ];

        if($this->iconUrl) {
            $returnedData['icon_url'] = $this->iconUrl;
        }
        if($this->proxyIconUrl) {
            $returnedData['proxy_icon_url'] = $this->proxyIconUrl;
        }

        return $returnedData;
    }

}