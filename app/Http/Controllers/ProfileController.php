<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required'],
        ]);
        $profile = new Profile;
        $profile->title = $request->title;
        $profile->description = $request->content;
        $profile->save();

        return redirect()->route('profile.index')->withSuccess('berhasil menambah profile');
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->title = $request->title;
        $profile->description = $request->content;
        $profile->save();

        return redirect()->route('profile.index')->withSuccess('berhasil edit profile');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profile.index')->withSuccess('berhasil hapus profile');
    }
}
