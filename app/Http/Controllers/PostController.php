<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'status' => $request->status
        ]);
        return redirect()->route('admin.post.index');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'), ['categories' => Category::all()]);
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'status' => $request->status
        ]);
        return redirect()->route('admin.post.index');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
