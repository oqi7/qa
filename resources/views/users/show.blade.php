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
        <div class="row justify-content-center">
            <div class="col-md-2">
                    <p class='posts'><a href='/posts'>ホーム</a></p>
                    <p class='search'><a href='/posts/search'>検索</a></p>
                    <p class='chat'><a href='/chat/{{ Auth::user()->id }}'>DM</a></p>
                    <p class='mypage'><a href='users/{{ Auth::user()->id }}'>マイページ</a></p>
            </div>
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="d-flex">
            
                        <div class="p-3 d-flex flex-column">
                            <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="100" height="100">
                            <div class="mt-3 d-flex flex-column">
                                <h4 class="mb-0 font-weight-bold">{{ $user->name }}</h4>
                                <span class="text-secondary">{{ $user->id === Auth::user()->id }}</span>
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column justify-content-between">
                            <div class="d-flex">
                                <div>
                                    <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="p-2 d-flex flex-column align-items-center">
                                        <p>投稿数</p>
                                        <span>{{ $post_count }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            @if (isset($timelines))
                @foreach ($timelines as $timeline)
                    <div class="col-md-8 mb-3">
                        
                        <div class="card">
                            <div class="card-haeder p-3 w-100 d-flex">
                                <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <a href="{{ url('users/' .$timeline->user->id) }}" class="mb-0 text-body">{{ $timeline->user->name }}</a>
                                </div>
                                <div class="d-flex justify-content-end flex-grow-1">
                                    <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href='/posts/{{ $timeline->id }}'><h3 class='title'>{{ $timeline->title }}</h3></a>  
                                <p class='body'>{{ $timeline->body }}</p>
                                
                                <div class="d-flex justify-content-end">
                                    @if (!in_array(Auth::user()->id, array_column($timeline->likes->toArray(), 'user_id'), TRUE))
                                        <form method="POST" action="{{ url('likes/') }}" class="mb-0">
                                            @csrf
                        
                                            <input type="hidden" name="post_id" value="{{ $timeline->id }}">
                                            <button type="submit" class="btn p-0 border-0 text-secondary"><i class="fas fa-heart fa-fw"></i></button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ url('likes/' .array_column($timeline->likes->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                            @csrf
                                            @method('DELETE')
                        
                                            <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw"></i></button>
                                        </form>
                                    @endif
                                    <p class="mb-0 text-secondary">{{ count($timeline->likes) }}</p>
                                </div>
                                
                                <div class="d-flex justify-content-end">
                                    @if (!in_array(Auth::user()->id, array_column($timeline->teaches->toArray(), 'user_id'), TRUE))
                                        <form method="POST" action="{{ url('teaches/') }}" class="mb-0">
                                            @csrf
                        
                                            <input type="hidden" name="post_id" value="{{ $timeline->id }}">
                                            <button type="submit" class="btn p-0 border-0 text-secondary"><i class="fas fa-graduation-cap fa-fw"></i></button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ url('teaches/' .array_column($timeline->teaches->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                            @csrf
                                            @method('DELETE')
                        
                                            <button type="submit" class="btn p-0 border-0 text-primary"><i class="fas fa-graduation-cap fa-fw"></i></button>
                                        </form>
                                    @endif
                                    <p class="mb-0 text-secondary">{{ count($timeline->teaches) }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
             @endif
        </div>
        <div class="my-4 d-flex justify-content-center">
                {{ $timelines->links() }}
        </div>
    </div>
    @endsection
    </body>
</html>