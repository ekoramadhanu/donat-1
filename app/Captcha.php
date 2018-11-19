<?php

namespace App;

class Captcha
{
    public function check($recaptcha)
    {
       // cek captcha
       $url = 'https://www.google.com/recaptcha/api/siteverify';
       $secret = '6LceHHsUAAAAAIf6UCMxNcO4h_zlrpodxylExkBk';
       $remoteip = $_SERVER['REMOTE_ADDR'];
       $response = file_get_contents($url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='.$remoteip);
       $data = json_decode($response);

       return $data;
    }

}
