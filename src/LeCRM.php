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

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'token'     => self::$token,
            'formId'    => $formId,
            'fields'    => $fields,
            'info'      => $info,
        ]));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
