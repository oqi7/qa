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
        <div class="container">
            
            <!--{{Auth::user()->name}}-->
            <h1>Q&A</h1>
            
            <div class="col md-2 ">
            <p class='posts'><a href='/posts'>ホーム</a></p>
            <p class='search'><a href='/posts/search'>検索</a></p>
            <p class='chat'><a href='/chat'>DM</a></p>
            <p class='mypage'><a href='/users/{user}'>マイページ</a></p>
            <p class='setting'><a href='/setting'>設定</a></p>
            </div>
            
            <div class="col md-">
            <p class='create'><a href='/posts/create'>作成</a></p>
            </div>
            
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>  
                        <p class='body'>{{ $post->body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endsection
    </body>
</html>