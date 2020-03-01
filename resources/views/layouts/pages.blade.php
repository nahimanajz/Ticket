<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<title>{{config('app.name','LSAPP')}}</title>
</head>
<body>
    @include('includes.navbar') 
    <div class="container">
    @include('includes.messages')
    @yield('content')
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>