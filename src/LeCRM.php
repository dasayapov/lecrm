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

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/json',
                'content' => http_build_query([
                        'token'     => self::$token,
                        'formId'    => $formId,
                        'fields'    => $fields,
                        'info'      => $info,
                    ]
                )
            )
        );

        $result = file_get_contents($url, false, stream_context_create($opts));
    }
}
