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
            <div class="row justify-content-start mb-5">
                <div class="col">
                <p class='posts'><a href='/posts'>ホーム</a></p>
                <p class='search'><a href='/posts/search'>検索</a></p>
                <p class='chat'><a href='/chat'>DM</a></p>
                <p class='mypage'><a href='/users/'>マイページ</a></p>
                <!--<p class='setting'><a href='/users/{user}'>設定</a></p>-->
                </div>
            
                <div class="">
                    <p class='create'><a href='/posts/create'>作成</a></p>
                </div>
                
                <div class='col-10 offset'>
                @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <a href='/posts/{{ $post->id }}'><h3 class='title'>{{ $post->title }}</h3></a>  
                            <p class='body'>{{ $post->body }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
        </div>
            </div>
        @endsection
    </body>
</html>