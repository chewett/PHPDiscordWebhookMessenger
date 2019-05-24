<?php

namespace Chewett\PHPDiscordWebhookMessenger\Payload;


class DiscordEmbedPayload
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

    private $footer;
    private $image;
    private $thumbnail;
    private $video;
    private $provider;
    private $author;
    private $fields; //arr of embed fields
    
    //TODO: Fill me in based on the embed structure

}
