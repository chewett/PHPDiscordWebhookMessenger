<?php

namespace Chewett\PHPDiscordWebhookMessenger\Exceptions;

use Throwable;

class DiscordInvalidMessageSentException extends DiscordCurlException {

    /** @var int  */
    private $discordErrorCode;

    /**
     * DiscordCurlException constructor.
     * @param resource $curlHandle Curl handler causing the exception
     * @inheritdoc
     */
    public function __construct($curlHandle, $discordErrorCode, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->discordErrorCode = $discordErrorCode;
        parent::__construct($curlHandle, $message, $code, $previous);
    }



}