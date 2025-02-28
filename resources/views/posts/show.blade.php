<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $post-> title }}</title>
</head>
<body>
    <h1>{{ $post -> title }}</h1>
    <p>{{ $post->content}} </p>

    <h3>댓글:</h3>
    <ul>
        @foreach ($post -> comments as $comment )
           <li>{{ $comment->content }}</li>
        @endforeach
    </ul>

    @if(session('success'))
      <div>{{ session('success')}}</div>
    @endif
    <h2><a href="{{ route('posts.create') }}">게시글 생성</a></h3>
    <h2><a href="{{ route('posts.index') }}">게시글 돌아가기</a></h3>
 
    <h3>
        댓글 작성
    </h3>
    <form action="{{ route("comments.store", $post->id)}}" method="POST">
        @csrf
        <div>
            <label for="content">내용</label>
            <textarea id="content" name="content" required></textarea>
            <button type="submit">댓글 작성</button>
        </div>
    </form>
</body>
</html>