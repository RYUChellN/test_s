<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>投稿掲示板</h1>
        <div class='posts'>
            
            @foreach ($user_posts as $user_post)
                <div class='post'>
                    <h2 class='title'>{{$user_post->user->name}} さん　
                    {{ $user_post->user->age}}歳　所在地：{{$user_post->user->prefecture}}</h2>
                    <h2 class='title'>{{ $user_post->title }}</h2>
                    <p class='body'>{{ $user_post->text }}</p>
                </div>
            @endforeach
        </div>
        <script type = "text/javascript" src="{{ asset('js/layout_func.js')}}"></script>
                         
    </body>
</html>