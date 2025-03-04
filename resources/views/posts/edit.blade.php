@extends('layouts.app')

@section('content')
    <h1>게시글 수정</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">제목</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div>
            <label for="content">내용</label>
            <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <button type="submit">업데이트</button>
    </form>
@endsection
