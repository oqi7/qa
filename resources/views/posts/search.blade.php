<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　
        
        @section('content')
        <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('users.index') }}">
    <input class="form-control my-2 mr-5" type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div class="d-flex justify-content-center">
        <button class="btn btn-info my-2" type="submit">検索</button>
        <button class="btn btn-secondary my-2 ml-5">
            <a href="{{ route('users.index') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>

@foreach($users as $user)
    <a href="{{ route('users.show', ['user' => $user]) }}">
        {{ $user->name }}
    </a>
@endforeach


<div>
　// 下記のようにページネーターを記述するとページネートで次ページに遷移しても、検索結果を保持する
    {{ $institutions->appends(request()->input())->links() }}
</div>
        @endsection
    </body>
</html>