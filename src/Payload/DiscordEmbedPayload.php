<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedPayload implements \JsonSerializable
{
    /** @var string title of embed */
    private $title;
    /** @var string description of embed */
    private $description;
    /** @var string url of embed */
    private $url;
    /** @var \DateTime timestamp of embed content */
    private $timestamp;
    /** @var int color code of the embed */
    private $color;
    /** @var DiscordEmbedFooter footer information */
    private $footer;
    /** @var DiscordEmbedImage image information */
    private $image;
    /** @var DiscordEmbedThumbnail thumbnail information */
    private $thumbnail;
    /** @var DiscordEmbedVideo video information */
    private $video;
    /** @var DiscordEmbedProvider provider information */
    private $provider;
    /** @var DiscordEmbedAuthor author information */
    private $author;
    /** @var DiscordEmbedField[] fields information */
    private $fields = [];



    /**
     * @param string $title
     * @return DiscordEmbedPayload
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return DiscordEmbedPayload
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $url
     * @return DiscordEmbedPayload
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @param \DateTime $timestamp
     * @return DiscordEmbedPayload
     */
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param int $color
     * @return DiscordEmbedPayload
     */
    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    /**
     * @param DiscordEmbedFooter $footer
     * @return DiscordEmbedPayload
     */
    public function setFooter($footer) {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param DiscordEmbedImage $image
     * @return DiscordEmbedPayload
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * @param DiscordEmbedThumbnail $thumbnail
     * @return DiscordEmbedPayload
     */
    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param DiscordEmbedVideo $video
     * @return DiscordEmbedPayload
     */
    public function setVideo($video) {
        $this->video = $video;
        return $this;
    }

    /**
     * @param DiscordEmbedProvider $provider
     * @return DiscordEmbedPayload
     */
    public function setProvider($provider) {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @param DiscordEmbedAuthor $author
     * @return DiscordEmbedPayload
     */
    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    /**
     * @param DiscordEmbedField $field
     * @return DiscordEmbedPayload
     */
    public function addField($field) {
        $this->fields[] = $field;
        return $this;
    }



    public function jsonSerialize() {
        $returnData = [];

        if($this->title) {
            $returnData['title'] = $this->title;
        }
        if($this->description) {
            $returnData['description'] = $this->description;
        }
        if($this->url) {
            $returnData['url'] = $this->url;
        }
        if($this->timestamp) {
            $returnData['timestamp'] = $this->timestamp;
        }
        if($this->color) {
            $returnData['color'] = $this->color;
        }
        if($this->footer) {
            $returnData['footer'] = $this->footer;
        }
        if($this->image) {
            $returnData['image'] = $this->image;
        }
        if($this->thumbnail) {
            $returnData['thumbnail'] = $this->thumbnail;
        }
        if($this->video) {
            $returnData['video'] = $this->video;
        }
        if($this->provider) {
            $returnData['provider'] = $this->provider;
        }
        if($this->author) {
            $returnData['author'] = $this->author;
        }
        if($this->fields) {
            $returnData['fields'] = $this->fields;
        }

        return $returnData;
    }


}
