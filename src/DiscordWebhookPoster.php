<?php

namespace Chewett\PHPDiscordWebhookMessenger;


class DiscordWebhookPoster
{


    /**
     * @param string $webhookUrl URL of the channel webhook to post JSON to
     * @param DiscordWebhookPayload $payloadObject Object representing the
     */
    public static function postMessage($webhookUrl, $payloadObject) {
        $jsonToUpload = $payloadObject->getPayload();

        $ch = \curl_init($webhookUrl);
        \curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonToUpload);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonToUpload)
        ]);

        return \curl_exec($ch);
    }


}