<?php

namespace App\Libraries;

class IPController
{
    public function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $data = explode(',', $ip);
        $ip = $data[0];

        return $ip;
    }

    public function getReferer()
    {
        $ref = request()->headers->get('referer');
        if (empty($ref)) {
            $ref = 'Direct';
        } else {
            $ref = parse_url($ref, PHP_URL_HOST);
        }
        return $ref;
    }
}