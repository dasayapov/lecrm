<?php

namespace DaSayapov\LeCRM;

class LeCRM
{
    private static $token = '';

    static function init($token)
    {
        self::$token = $token;
    }

    static function lead($formId, $fields = [], $info = [])
    {
        $url = 'https://lecrm.ru/api/crm/lead';

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-Type: application/json',
                'content' => http_build_query([
                        'token'     => self::$token,
                        'formId'    => $formId,
                        'fields'    => $fields,
                        'info'      => $info,
                    ]
                )
            ],
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
            ],
        ];

        $result = file_get_contents($url, false, stream_context_create($opts));
    }
}
