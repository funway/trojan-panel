<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use chillerlan\QRCode\QRCode;

use App\Models\Node;
use App\Utils\Helper;

class NodeController extends Controller
{
    public function showQRCode(Node $node)
    {
        $url = Helper::getNodeURL($node, Auth::user());

        // echo "<h1>{$node->name}</h1>".'<img src="'.(new QRCode)->render($url).'" alt="QR Code" height="200" width="200"/>';

        $qrCodeSvg = (new QRCode)->render($url);
        return view('node.qrcode', ['node'=>$node, 'qrCodeSvg'=>$qrCodeSvg]);
    }
}
