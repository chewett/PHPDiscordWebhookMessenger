<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedField implements \JsonSerializable {

    /** @var string name of the field */
    private $name;
    /** @var string value of the field */
    private $value;
    /** @var bool whether or not this field should display inline */
    private $inline;

    /**
     *
     * @param $name
     * @param $value
     */
    public function __construct($name, $value) {
        $this->name = $name;
        $this->value = $value;
    }

    /** @override */
    public function jsonSerialize() {
        $returnedData = [
            'name' => $this->name,
            'value' => $this->value
        ];

        if($this->inline) {
            $returnedData['inline'] = $this->inline;
        }

        return $returnedData;
    }

}