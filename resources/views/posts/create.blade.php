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
            <div class="row justify-content-center">
            
                <div class="card" style="width: 40rem;">
                    <div class="card-header">質問投稿</div>
                    <div class="card-body">
                        <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50"></img>
                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->name }}</a>
                        <div class="mt-2 ml-5">
                        <a href='/posts/{{ $post->id }}'><h3 class='title'>{{ $post->title }}</h3></a>  
                        <p class='body'>{{ $post->body }}</p>
                        </div>
                            
                        <form method="POST" action={{ route('posts.store') }}>
                            @csrf
                            <div class="col mt-3">
                                <input type="text" name="post[title]" class="form-control" placeholder="タイトル" value="{{ old('post.title') }}"/>
                                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                            </div>
                            <div class="col">
                                <textarea name="post[body]" class="form-control" placeholder="質問">{{ old('post.body') }}</textarea>
                                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                            </div>
                            <div class="row justify-content-center">
                                <input type="submit" class="btn btn-primary btn-sm" value="投稿"/>
                            </div>
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
