<!DOCTYPE html>
<html lang="en">

<head>

<link rel="icon" type="image/png" href="image/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="image/favicon-16x16.png" sizes="16x16" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6">
    <meta name="description" content="This is english learning page for college student">
    <meta name="theme-color" content="#317EFB">
    <meta name="author" content="UIT">

    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    @yield('css')

</head>

<body >
    <div style="background-color:#e9ebee   ;" > 
    
        @include('layout.header')
        
        @yield('content')

        @include('layout.footer')
    </div>

    
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

    @yield('script')
</body>

</html>
