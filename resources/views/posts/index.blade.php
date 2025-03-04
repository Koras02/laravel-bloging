 <!DOCTYPE html>
 <html>
 <head>
   <title>게시글 목록</title>
 </head>
 <body>
    <h1>게시글 목록</h1>
    <a href="{{ route('posts.create')}}">게시글 생성</a>
    @foreach ($posts as $post)
    <div>
      <h2><a href="{{ route('posts.show', $post->id )}}">{{ $post-> title }}</a></h2>
      <p>{{ $post->content }}</p>
      <h3>댓글: </h3>
      <ul>
         @foreach ($post->comments as $comment)
           <li>{{ $comment->content }}</li>
         @endforeach
      </ul>
      <div>
        <a href="{{ route('posts.edit', $post->id) }}">수정</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">삭제</button>
        </form>
      </div>
    </div>
    @endforeach
 </body>
 </html>