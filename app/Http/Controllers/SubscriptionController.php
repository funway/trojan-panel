<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\User;
use App\Models\Node;
use App\Utils\Helper;

class SubscriptionController extends Controller
{
    public function index($uid, $subscription_token)
    {
        $user = User::where('id', $uid)->where('subscription_token', $subscription_token)->firstOrFail();

        $data = '';

        foreach (Node::all() as $node) {
            $data .= Helper::getNodeURL($node, $user) . "\n";
        }

        return Response::make(base64_encode($data), 200, [
            'Content-Type' => 'text/plain;charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="sub.txt"',
        ]);
    }
}
