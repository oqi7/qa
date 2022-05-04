<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Q&A</title>
        <!-- Fonts -->
        
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="container">
            
            <div class="row justify-content-start">
                <div class="col-md-2">
                    <p class='posts'><a href='/posts'>ホーム</a></p>
                    <p class='search'><a href='/posts/search'>検索</a></p>
                    <p class='chat'><a href='/chat/{{ Auth::user()->id }}'>DM</a></p>
                    <p class='mypage'><a href='users/{{ Auth::user()->id }}'>マイページ</a></p>
                </div>
            
                
                <div class='col-md-7'>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ $post->user->profile_image }}" class="rounded-circle" width="50" height="50">
                            <a href="{{ url('users/' .$post->user->id) }}" class="text-secondary">{{ $post->user->name }}</a>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $post->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href='/posts/{{ $post->id }}'><h3 class='title'>{{ $post->title }}</h3></a>  
                            <p class='body'>{{ $post->body }}</p>
                            
                            <div class="d-flex justify-content-end">
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
                        
                            <div class="d-flex justify-content-end">
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
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="col-md-3">
                    <p class="btn btn-primary btn-sm col-md-5"><a href='/posts/create' class="text-white">作成</a></p>
                    <form action="{{ url('/serch')}}" method="post">
                        {{ csrf_field()}}
                        {{method_field('get')}}
                        <div class="form-group">
                            <label>タイトル</label>
                            <input type="text" class="form-control col-md-8" placeholder="タイトル" name="title">
                        </div>
                        <div class="form-group">
                            <label>質問</label>
                            <input type="text" class="form-control col-md-8" placeholder="質問" name="body" value="{{ old("title")}}">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm col-md-8">検索</button>
                    </form>
                    @if(session('flash_message'))
                        <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
                    @endif
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>