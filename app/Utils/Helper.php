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
        
        $url = "{$node->type}://{$user->name}:YourPassword@{$node->host}:{$node->port}?{$query}#{$node->name}";

        return $url;
    }
}