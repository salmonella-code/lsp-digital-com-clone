<?php

namespace App\Http\Controllers;

use App\Models\SkemaPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use File;

class SkemaPlaceController extends Controller
{
    public function index()
    {
        $places = SkemaPlace::all();

        return view('admin.place.index', compact('places'));
    }

    public function create()
    {
        $provinceApi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $province = $provinceApi->json();

        return view('admin.place.create', compact('province'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:skema_places,code'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'contact' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:skema_places,email'],
            'license' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $place = new SkemaPlace;
        $place->code = $request->code;
        $place->name = $request->name;
        $place->description = $request->description;
        $place->province = $request->province;
        $place->city = $request->city;
        $place->address = $request->address;
        $place->contact = $request->contact;
        $place->email = $request->email;
        $coverSkema = $request->file('license');
        $filename = time() . '.' . $coverSkema->getClientOriginalExtension();
        $coverSkema->move('images/license', $filename);
        $place->license = $filename;
        $place->save();

        return redirect()->route('place.index')->withSuccess('berhasil menambah tempat uji kompetensi');
    }

    public function show($id)
    {
        $place = SkemaPlace::FindOrFail($id);

        return view('admin.place.show', compact('place'));
    }

    public function destroy($id)
    {
        $place = SkemaPlace::FindOrFail($id);
        File::delete('images/license/' . $place->license);
        $place->delete();

        return redirect()->route('place.index')->withSuccess('berhasil hapus tempat uji kompetensi');
    }
}
