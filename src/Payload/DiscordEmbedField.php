<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedField implements \JsonSerializable {

    /** @var string name of the field */
    private $name;
    /** @var string value of the field */
    private $value;
    /** @var bool|null whether or not this field should display inline */
    private $inline;

    /**
     *
     * @param $name
     * @param $value
     * @param $inline
     */
    public function __construct($name, $value, $inline=null) {
        $this->name = $name;
        $this->value = $value;
        $this->inline = $inline;
    }

    /** @override */
    public function jsonSerialize() {
        $returnedData = [
            'name' => $this->name,
            'value' => $this->value
        ];

        if($this->inline !== null) {
            $returnedData['inline'] = $this->inline;
        }

        return $returnedData;
    }

}