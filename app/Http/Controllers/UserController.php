<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'contact' => ['required', 'numeric', 'unique:users,contact'],
            'address' => ['required', 'string'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->avatar = 'default.jpg';
        $user->role = 'admin';
        $user->password = Hash::make('lsp12345678');
        $user->save();

        return redirect()->route('user.index')->withSuccess('berhasil menambah user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->editId);
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            'contact' => ['required', 'numeric',  Rule::unique('users', 'contact')->ignore($user->id)],
            'address' => ['required', 'string'],
        ]);

        $user->name = $request->name;
        $user->email =  $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.index')->withSuccess('berhasil edit user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->withSuccess('berhasil hapus user');
    }
}
