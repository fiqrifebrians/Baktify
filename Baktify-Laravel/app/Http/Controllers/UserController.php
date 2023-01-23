<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('dashboard.users.user-index ',compact('user'));
    }

    public function create()
    {
        return view('dashboard.users.user-create');
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.users.user-show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.users.user-edit',compact('user'));
    }

    public function update($id,Request $request)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
