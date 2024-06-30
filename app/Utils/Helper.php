<?php

namespace App\Utils;

class Helper
{
    public static function getNodeURL($node, $user): string
    {
        $query = http_build_query([
            'allowInsecure' => true,
            'mux' => false,
        ]);
        
        $url = "{$node->type}://{$user->name}:{$user->trojan_token}@{$node->host}:{$node->port}?{$query}#{$node->name}";

        return $url;
    }

    public static function generateRandomCode($length = 6) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomCode .= $characters[$index];
        }

        return $randomCode;
    }
}