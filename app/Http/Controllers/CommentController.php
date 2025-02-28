<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // 여기서 수정
        $post = Post::findOrFail($postId);
        $post->comments()->create(['content' => $request->content]);

        return redirect()->route('posts.show', $postId)->with('success', '댓글 작성 완료');
    }
}
