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
    {{Auth::user()->name}}
   
   
    @endsection
    </body>
</html>