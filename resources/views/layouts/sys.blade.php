<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> <link/>
    <title>排教室系統</title>
    <script src="{{asset('js/app.js')}}" ></script>
    <link rel="icon" href="{{asset('icons/cogwheel.png')}}">
</head>
<body>

    @include('components.navbar')
    <div  id="" style="min-height: calc(100vh - 72px - 65px );">
        @yield('content')
    </div>
    @include('components.footer')
    <script>
        $(document).ready(function(){
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>