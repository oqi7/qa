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
        
        <div class='post'>
            <p class="card-text">投稿者：{{ $post->user->id }}</p>
            <h2 class='title'>{{ $post->title }}</h2>
            <p class='body'>{{ $post->body }}</p>  
            <p class='updated_at'>{{ $post->updated_at }}</p>
        
        
        <div class="d-flex align-items-center">
            @if (!in_array(Auth::user()->id, array_column($post->likes->toArray(), 'user_id'), TRUE))
                <form method="POST" action="{{ url('likes/') }}" class="mb-0">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw"></i></button>
                </form>
            @else
                <form method="POST" action="{{ url('likes/' .array_column($post->likes->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw"></i></button>
                </form>
            @endif
            <p class="mb-0 text-secondary">{{ count($post->likes) }}</p>
        </div>
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return checkDelete(this)">delete</button>
        </form>
        
        <div class="back">
            <a href="/">戻る</a>
        </div>
        
        <script>
            function checkDelete(){
                const result = window.confirm("本当に削除しますか？");
                if (result){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
        @endsection
    </body>
</html>