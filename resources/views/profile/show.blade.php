@extends('layouts.app')

@section('content')
<div class="container">
    <h1>내 프로필</h1>
    <ul>
        <li><strong>이름:</strong> {{ $user->name }}</li>
        <li><strong>이메일:</strong> {{ $user->email }}</li>
        <li><strong>가입일:</strong> {{ $user->created_at->format('Y-m-d') }}</li>
    </ul>

    <!-- 로그아웃 폼 -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">로그아웃</button>
    </form>
</div>
@endsection
