<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel = "stylesheet" href = "/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('inc.head')

</head>
<body>
 
    <div class = 'container-fluid mt-5'>
        <div>
            @yield('intro')
        </div>
        <div>
            @yield('line')
        </div>
        
        @yield('content')
        

    </div>

</body>
</html>