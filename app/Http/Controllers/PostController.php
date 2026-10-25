<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    // Read: list all
public function index()
{
 $posts = Post::latest()->get();

    $categories = Category::all();

    return view('posts.index', compact('posts', 'categories'));
}
// Show the create form
public function create()
{
// return view('posts.create');
$categories = Category::all();
return view('posts.create', compact('categories'));
}
// Create: save new post
public function store(Request $request)
{$data = $request->validate([
'title' => 'required|max:255',
'body' => 'required',
'category_id' => 'required|exists:categories,id',
]);
Post::create($data);
return redirect()->route('posts.index');
}
// Read: one post
public function show($id)
{
    $post = Post::findOrFail($id);
    $posts = Post::latest()->get();

    return view('posts', compact('posts', 'post'));
}
// Show the edit form
public function edit($id)
{
$post = Post::findOrFail($id);
return view('posts.edit', compact('post'));
}
// Update: save changes
public function update(Request $request, $id)
{
$data = $request->validate([
'title' => 'required|max:255',
'body' => 'required',
]);
$post = Post::findOrFail($id);
$post->update($data);
return redirect()->route('posts.show', $post->id);
}
// Delete
public function destroy($id)
{
Post::findOrFail($id)->delete();
return redirect()->route('posts.index');
}
}
