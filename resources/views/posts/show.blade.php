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
        <div class="content">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ asset('storage/profile_image/' .$post->user->profile_image) }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $post->user->name }}</p>
                                <a href="{{ url('users/' .$post->user->id) }}" class="text-secondary">{{ $post->user->screen_name }}</a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $post->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class='post'>
                            <h3 class='title'>{{ $post->title }}</h3>
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
                                <button type="submit" class="btn btn-promary" onclick="return checkDelete(this)">削除</button>
                            </form>
                            
                                <div class="back">
                                    <a href="/">戻る</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        
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