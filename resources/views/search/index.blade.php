<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Q&A</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <h1>Q&A</h1>
        <p class='posts'><a href='/posts'>ホーム</a></p>
        <p class='search'><a href='/search'>検索</a></p>
        <p class='dm'><a href='/dm'>DM</a></p>
        <p class='mypage'><a href='/mypage'>マイページ</a></p>
        <p class='setting'><a href='/setting'>設定</a></p>
        
        <div class='search'>
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
                {{ $institutions->appends(request()->input())->links() }}
            </div>
        </div>
        @endsection
    </body>
</html>