<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use chillerlan\QRCode\QRCode;

class TestController extends Controller
{
    public function index()
    {
        // return view('test');

        $user = Auth::user();
        $uri = '';
        //display remaining traffic and expire date
        $upload = round($user->upload / (1024*1024*1024), 2);
        $download = round($user->download / (1024*1024*1024), 2);
        // $uri .= "STATUS=🚀↑:{$upload}GB,↓:{$download}GB\r\n";
        
        $uri .= self::buildTrojan($user->password, '1号节点');
        // $uri .= self::buildTrojan($user->password, 'node 2');
        
        info($uri);
        // return base64_encode($uri);
        $data = $uri;

        // quick and simple:
        echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" height="200" width="200"/>';
    }

    public static function buildTrojan($password, $server_name)
    {
        $query = http_build_query([
            'allowInsecure' => true,
            'skip-cert-verify' => true,
            'udp' => false,
            'mux' => true,
        ]);
        $uri = "trojan://YourPassword@vpn.861984.xyz:8443?{$query}#{$server_name}";
        $uri .= "\r\n";
        return $uri;
    }
}
