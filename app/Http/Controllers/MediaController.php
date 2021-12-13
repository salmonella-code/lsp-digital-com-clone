<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::all();

        return view('admin.media.index', compact('medias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'url' => ['required'],
        ]);

        Media::create($request->all());
        
        return redirect()->route('media.index')->withSuccess('berhasil menambah media'); 
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);

        return response()->json($media);
    }

    public function update(Request $request)
    {
        $media = Media::findOrFail($request->editId);
        $request->validate([
            'name' => ['required', 'string'],
            'url' => ['required'],
        ]);
        $media->name = $request->name;
        $media->url = $request->url;
        $media->save();

        return redirect()->route('media.index')->withSuccess('berhasil edit media'); 
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();

        return redirect()->route('media.index')->withSuccess('berhasil hapus media'); 
    }
}
