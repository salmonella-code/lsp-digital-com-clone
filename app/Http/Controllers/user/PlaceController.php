<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SkemaPlace;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = SkemaPlace::all();
        return view('home.place.index', compact('places'));
    }

    public function show($id)
    {
        $place = SkemaPlace::FindOrFail($id);
        return view('home.place.show', compact('place'));
    }
}
