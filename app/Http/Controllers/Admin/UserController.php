<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function fetch_users_date()
    {
        $users = User::all();
        return view('admin.users.fetch_users', compact('users'));
    }

    public function edit_fetch_users_date($id)
    {
        $user = User::find($id);
        return view('admin.users.edit_fetch_user', compact('user'));
    }

    public function update_fetch_users_data(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect()->route('fetch.user')->with('message', 'Role Updated Successfully!');
        }
            return redirect()->route('fetch.user')->with('message', 'No User Found!');

    }
}
