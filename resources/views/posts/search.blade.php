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
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-2">
              <p class='posts'><a href='/posts'>ホーム</a></p>
              <p class='search'><a href='/posts/search'>検索</a></p>
              <p class='chat'><a href='/chat/{{ Auth::user()->id }}'>DM</a></p>
              <p class='mypage'><a href='users/{{ Auth::user()->id }}'>マイページ</a></p>
            </div>
          
            <div class="col-md-10">
              <p>検索結果</p>
              @if(isset($posts))
                <table class="table">
                  <tr>
                    <th>タイトル</th><th>本文</th>
                  </tr>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{$post->title}}</td><td>{{$post->body}}</td>
                    </tr>
                  @endforeach
                </table>
              @endif
              @if(!empty($message))
                <div class="alert alert-primary" role="alert">{{ $message }}</div>
              @endif
            </div>
          </div>
        </div>
        @endsection
    </body>
</html>