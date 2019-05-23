<?php

namespace Chewett\PHPDiscordWebhookMessenger\Exceptions;
use Throwable;


/**
 * Class DiscordCurlException
 *
 * This class is just a really basic wrapper around exception.
 * This exception will be used and thrown when curl has an issue, its a specific
 * named exception so that people can catch it rather than a more generic exception if they wish.
 *
 * @package Chewett\PHPDiscordWebhookMessenger\Exceptions
 */
class DiscordCurlException extends \Exception
{
    /**
     * The curl handle that was being used when the exception occurred.
     * This may help them determine if there is an issue they care about
     * @var resource
     */
    private $curlHandle;

    /**
     * DiscordCurlException constructor.
     * @param resource $curlHandle Curl handler causing the exception
     * @inheritdoc
     */
    public function __construct($curlHandle, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->curlHandle = $curlHandle;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets the curl handler which caused this exception to be thrown
     * @return resource
     */
    public function getCurlHandle()
    {
        return $this->curlHandle;
    }

}