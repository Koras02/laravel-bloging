<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // 모든 게시글과 각 게시글의 댓글 
        $posts = Post::with('comments')->get();
        return view('posts.index', compact('posts'));

    }

    public function show($id) 
    {
        // 특정 게시글과 댓글 
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }   
    public function create()
    {
        return view('posts.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

 
 

    public function edit(string $id)
    {
        // ID를 사용해 데이터베이스에서 게시물 조회
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
