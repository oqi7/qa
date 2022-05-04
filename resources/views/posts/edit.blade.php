<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Q&A</title>
    </head>
    <body>
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　
        
    @section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mb-3">
                
                <div class="card">
                    <div class='card-body'>
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h5>タイトル</h5>
                            <input type='text' name='post[title]' class="form-control" value="{{ $post->title }}">
                            <h5>本文</h5>
                            <input type='text' name='post[body]' class="form-control"value="{{ $post->body }}">
                            <div class="row justify-content-center">
                                <input type="submit" class="btn btn-primary btn-sm" value="保存">
                            </div>
                        </form>
                        <div class="back">
                            <a href="/">戻る</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endsection
</body>
</html>