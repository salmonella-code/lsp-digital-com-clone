<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::all();
        return view('home.skema.index', compact('skemas'));
    }

    public function show($id)
    {
        $skema = Skema::FindOrFail($id);
        return view('home.skema.show', compact('skema'));
    }
}
