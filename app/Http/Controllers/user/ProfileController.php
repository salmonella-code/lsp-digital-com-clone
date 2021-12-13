<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $profile = Profile::FindOrFail($id);

        return view('home.profile.index', compact('profile'));
    }
}
