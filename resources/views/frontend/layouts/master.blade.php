<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    
</head>
<body>
    
<div>
    @include('frontend.includes.header')
</div>
<h1>nd1</h1>

<div>
    @yield('content')
</div>
<h1>nd2</h1>

<div>
    @include('frontend.includes.footer')
</div>
</body>
</html>