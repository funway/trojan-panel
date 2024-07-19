<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_direction', 'asc');

        $users = DB::table('users')->orderBy($sortBy, $sortDirection)->paginate(3);
        
        return view('admin.user-list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // info('用户提交数据', [$request]);

        if (!empty($request['password'])) {
            $user->login_password = Hash::make($request['password']);
        }
        if (!empty($request['quota'])) {
            $user->quota = $request['quota'] < 0 ? -1 : $request['quota']*1048576;
        }
        if (!empty($request['expire_at'])) {
            $user->expire_at = Carbon::parse($request['expire_at']);
        }
        
        if ($user->isDirty()) {
            $user->save();
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
