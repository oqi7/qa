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
                <div class="col-md-8">
                    
                    @foreach ($teaches as $teach)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <div class="ml-2 d-flex flex-column">
                                <a href="{{ url('users/' .$teach->user_id) }}" class="mb-0">{{ $teach->user_id }}</a>
                                <p class="text-secondary">{{ $teach->id }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>