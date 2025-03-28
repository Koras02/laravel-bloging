<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // 모든 게시물 가져오기 
        dd($posts->toArray()); // dd()로 데이터 확인 이 부분에서 실행 중단 후 데이터 출력
        
        // 모든 게시글과 각 게시글의 댓글 
        $posts = Post::with('comments')->get();
        

        // 또는 Log::Info()로 로그 남기기
        Log::info("Posts retrieved", $posts->toArray());
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

 
 

    public function edit($id)
    {
        $post = Post::findOrFail($id); // ID로 게시글 조회
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
