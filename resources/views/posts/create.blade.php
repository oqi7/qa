<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Q&A</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
            <form action="/posts/create" method="POST">
                <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                <h2>質問</h2>
                <textarea name="post[body]" placeholder="本文">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <input type="submit" value="投稿"/>
        </form>
        <div class="back"><a href="/">戻る</a></div>
            </form>
        </div>
        @endsection
    </body>
</html>
