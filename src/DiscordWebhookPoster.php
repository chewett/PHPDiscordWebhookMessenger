<?php

namespace Chewett\PHPDiscordWebhookMessenger;

use Chewett\PHPDiscordWebhookMessenger\Exceptions\DiscordCurlException;

/**
 * Class DiscordWebhookPoster
 *
 * Simple class with a single static method used to send a DiscordWebhookPayload.
 *
 * @package Chewett\PHPDiscordWebhookMessenger
 */
class DiscordWebhookPoster
{


    /**
     * Static method used to send a DiscordWebhookPayload via Curl.
     *
     * Note: The most common failure for this is curl not having access to SSL certificates
     * TODO: Put a piece in the notes about this.
     *
     * @param string $webhookUrl URL of the channel webhook to post JSON to
     * @param DiscordWebhookPayload $payloadObject Object representing the
     * @return string Web response from Discord when successful, otherwise an exception is thrown.
     * @throws DiscordCurlException Thrown when curl has an issue and fails to make the request.
     */
    public static function postMessage($webhookUrl, DiscordWebhookPayload $payloadObject) {
        $jsonToUpload = $payloadObject->getPayload();

        $ch = \curl_init($webhookUrl);
        \curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonToUpload);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonToUpload)
        ]);

        $result = \curl_exec($ch);
        if($result) {
            return $result;
        }

        $curlError = \curl_error($ch);
        throw new DiscordCurlException($ch, $curlError);
    }


}