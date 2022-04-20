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
    <div>
    @if ($user->id === Auth::user()->id)
        <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
    @endif
    </div>
    <div class="d-flex justify-content-end">
        <div class="p-2 d-flex flex-column align-items-center">
                <p class="font-weight-bold">投稿数</p>
                    <span>{{ $post_count }}</span>
        </div>
    </div>
   
   
    @endsection
    </body>
</html>