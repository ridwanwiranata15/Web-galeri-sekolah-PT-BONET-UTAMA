<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('image');
        $path = time().'_'.$request->title.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        Image::create([
            'gallery_id' => $request->post,
            'file' => $path,
            'title' => $request->judul
        ]);
        return redirect()->route('admin.image.index');

    }
    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.image.edit', compact('image'), ['galleries' => Gallery::all()]);
    }
    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $path = time().'_'.$request->title.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));
        $image = Image::find($id);
        $image->update([
            'gallery_id' => $request->post,
            'file' => $path,
            'title' => $request->title
        ]);
        return redirect()->route('admin.image.index');
    }
    public function delete($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('admin.image.index');
    }
}
