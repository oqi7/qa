<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Q&A</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class="container">
            <div class="row justify-content-start">
            
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <form method="POST" action={{ route('posts.store') }}>
                            @csrf
                            <div class="col mt-3">
                                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                            </div>
                            <div class="col-10">
                                <textarea name="post[body]" placeholder="質問">{{ old('post.body') }}</textarea>
                                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                            </div>
                            <input type="submit" value="投稿"/>
                        </form>
                        <div class="back">
                            <a href="/">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>
