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
        <div class="container">
            <ul>
                @foreach ($chats as $chat)
                <li class="truncate">{{$chat->getData()}}</li>
                @endforeach
            </ul>
        </div>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="/chat" method="POST">
            @csrf
            <input type="hidden" value="test">
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="message" placeholder="message">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500" type="submit">送信</button>
        </form>
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </body>
    @endsection
</html>