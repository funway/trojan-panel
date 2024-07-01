<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

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

    // 重置 token
    public function reset($field)
    {
        $user = Auth::user();
        // if ('addr' == $field) {
        //     $user->subscription_token = User::generateSubscriptionToken();    
        // }
        // elseif ('trojan' == $filed) {
        //     // code...
        // }
        switch($field) {
            case 'addr':
                $user->subscription_token = User::generateSubscriptionToken();
                break;
            case 'trojan':
                $user->trojan_token = User::generateTrojanToken();
                $user->password = hash('sha224', $user->name.':'.$user->trojan_token);
                break;
            default:
                abort(404);
        }
        
        $user->save();
        return redirect()->back();
    }
}
