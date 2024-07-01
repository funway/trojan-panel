<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use chillerlan\QRCode\QRCode;

use App\Models\Node;
use App\Utils\Helper;
use App\Http\Requests\NodeUpdateRequest;

class NodeController extends Controller
{
    public function showQRCode(Node $node)
    {
        $url = Helper::getNodeURL($node, Auth::user());

        // echo "<h1>{$node->name}</h1>".'<img src="'.(new QRCode)->render($url).'" alt="QR Code" height="200" width="200"/>';

        $qrCodeSvg = (new QRCode)->render($url);
        return view('node.qrcode', ['node'=>$node, 'qrCodeSvg'=>$qrCodeSvg]);
    }

    public function create()
    {
        return view('admin.node-edit', [
            'action' => route('admin.nodes.store'),
            'method' => 'POST'
        ]);
    }

    public function edit(Node $node) 
    {
        return view('admin.node-edit', [
            'node' => $node,
            'action' => route('admin.nodes.update', $node),
            'method' => 'PUT'
        ]);
    }

    public function store(NodeUpdateRequest $request)
    {
        $node = Node::create([
            'name' => $request->name,
            'type' => $request->type,
            'host' => $request->host,
            'port' => $request->port,
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    public function update(NodeUpdateRequest $request, Node $node)
    {
        $node->fill($request->validated());
        if($node->isDirty()) {
            $node->save();
        }

        return redirect(route('dashboard', absolute: false));
    }
}
