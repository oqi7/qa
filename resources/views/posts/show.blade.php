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
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ asset('storage/profile_image/' .$post->user->profile_image) }}" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <a href="{{ url('users/' .$post->user->id) }}" class="text-secondary">{{ $post->user->name }}</a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $post->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class='card-body'>
                            <h3 class='title'>{{ $post->title }}</h3>
                            <p class='body'>{{ $post->body }}</p>  
                            
                            <div class="d-flex align-items-end">
                                @if (!in_array(Auth::user()->id, array_column($post->likes->toArray(), 'user_id'), TRUE))
                                    <form method="POST" action="{{ url('likes/') }}" class="mb-0">
                                        @csrf
                    
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="btn p-0 border-0 text-secondary"><i class="fas fa-heart fa-fw"></i></button>
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
                            
                            <div class="d-flex align-items-end">
                                @if (!in_array(Auth::user()->id, array_column($post->teaches->toArray(), 'user_id'), TRUE))
                                    <form method="POST" action="{{ url('teaches/') }}" class="mb-0">
                                        @csrf
                    
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="btn p-0 border-0 text-secondary"><i class="fas fa-graduation-cap fa-fw"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ url('teaches/' .array_column($post->teaches->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                        @csrf
                                        @method('DELETE')
                    
                                        <button type="submit" class="btn p-0 border-0 text-primary"><i class="fas fa-graduation-cap fa-fw"></i></button>
                                    </form>
                                @endif
                                <p class="mb-0 text-secondary">{{ count($post->teaches) }}</p>
                                
                                <a href="/posts/{{ $post->id }}/teaches">一覧</a>
                            </div>
                            
                            @if ($post->user->id === Auth::user()->id)
                                <div class="d-flex justify-content-end">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-fw"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form method="POST" action="{{ url('posts/' .$post->id) }}" class="mb-0">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ url('posts/' .$post->id .'/edit') }}" class="dropdown-item">編集</a>
                                            <button type="submit" class="dropdown-item del-btn" onclick="return checkDelete(this)">削除</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            
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