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
        <h1>Blog Name</h1>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return checkDelete(this)">delete</button>
        </form>
        <div class='post'>
            <h2 class='title'>{{ $post->title }}</h2>
                <p class='body'>{{ $post->body }}</p>  
                <p class='updated_at'>{{ $post->updated_at }}</p>
                <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        </div>
        
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