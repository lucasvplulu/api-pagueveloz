<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bludata</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Materialize core CSS     -->
    <link href="{{ asset('materialize/css/materialize.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- fancybox -->
    <link rel="stylesheet" href="{{ asset('js/fancybox-master/dist/jquery.fancybox.css')}}" type="text/css" media="screen" />

    @yield('styles')

</head>
<body>
<section id="navbar">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <div class="row row-logo">
                    <a href="{{url('/')}}" class="logo-emp"><img src="{{asset('img/logo-bludata.png')}}"></a>
                </div>
            </div>
        </div>
    </nav>
</section>
@yield('content')

</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('materialize/js/materialize.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<!---- fancyBox----->
<script src="{{ asset('js/fancybox-master/dist/jquery.fancybox.js')}}"></script>

<script>
    var __url = "{{ url('/')}}";
</script>
@yield('scripts')

</html>
