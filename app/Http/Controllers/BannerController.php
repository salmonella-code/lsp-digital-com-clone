<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $banner = new Banner;
        $bannerImage = $request->file('image');
        $filename = time() . '.' . $bannerImage->getClientOriginalExtension();
        $bannerImage->move('images/banner', $filename);
        $banner->name =  $request->name;
        $banner->image = $filename;
        $banner->save();

        return redirect()->route('banner.index')->withSuccess('berhasil tambah banner');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json($banner);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $banner = Banner::findOrFail($request->editId);
        $banner->name = $request->name;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:2048'],
            ]);
            File::delete('images/banner/' . $banner->image);
            $bannerImage = $request->file('image');
            $filename = time() . '.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move('images/banner', $filename);
            $banner->image = $filename;
        }
        $banner->save();

        return redirect()->route('banner.index')->withSuccess('berhasil edit banner');
    }

    public function destroy($id)
    {
        $banner =  Banner::findOrFail($id);
        File::delete('images/banner/' . $banner->image);
        $banner->delete();
        return redirect()->route('banner.index')->withSuccess('berhasil hapus banner');
    }
}
