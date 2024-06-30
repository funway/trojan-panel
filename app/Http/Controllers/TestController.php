<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use chillerlan\QRCode\QRCode;
use Carbon\Carbon;

use App\Utils\Helper;

class TestController extends Controller
{
    public function index()
    {
        // return view('test');
        // echo(Carbon::now('UTC'));
        // echo(Carbon::now()->addHours(3)->timezone('UTC'));
        echo(Helper::generateRandomCode());
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
