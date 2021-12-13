<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;
use File;
use Illuminate\Validation\Rule;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::all();

        return view('admin.skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('admin.skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 'unique:skemas,code'],
            'category' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'unit' => ['required', 'numeric'],
            'summary' => ['required', 'string'],
            'cover' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $skema = new Skema;
        $skema->code = $request->code;
        $skema->name = $request->name;
        $skema->category = $request->category;
        $skema->price = $request->price;
        $skema->unit = $request->unit;
        $skema->summary = $request->summary;
        $coverSkema = $request->file('cover');
        $filename = time() . '.' . $coverSkema->getClientOriginalExtension();
        $coverSkema->move('images/cover', $filename);
        $skema->cover = $filename;
        $skema->save();


        return redirect()->route('skema.index')->withSuccess('berhasil menambah skema');
    }

    public function show($id)
    {
        $skema = Skema::findOrFail($id);

        return view('admin.skema.show', compact('skema'));
    }

    public function edit($id)
    {
        $skema = Skema::findOrFail($id);

        return view('admin.skema.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        $skema = Skema::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string', Rule::unique('skemas', 'code')->ignore($skema->id)],
            'category' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'unit' => ['required', 'numeric'],
            'summary' => ['required', 'string'],
        ]);

        $skema->name = $request->name;
        $skema->code = $request->code;
        $skema->category = $request->category;
        $skema->price = $request->price;
        $skema->unit = $request->unit;
        $skema->summary = $request->summary;
        if ($request->hasFile('cover')) {
            $request->validate([
                'cover' => ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
            File::delete('images/cover/' . $skema->cover);
            $coverSkema = $request->file('cover');
            $filename = time() . '.' . $coverSkema->getClientOriginalExtension();
            $coverSkema->move('images/cover', $filename);
            $skema->cover = $filename;
        }
        $skema->save();


        return redirect()->route('skema.index')->withSuccess('berhasil edit skema');
    }

    public function destroy($id)
    {
        $skema = Skema::findOrFail($id);
        File::delete('images/cover/' . $skema->cover);
        $skema->delete();

        return redirect()->route('skema.index')->withSuccess('berhasil hapus skema');
    }
}
