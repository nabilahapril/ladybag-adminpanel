<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ladybag Admin Panel">
    <meta name="author" content="Nabilah Aprilia Salsabila">

    <!--Icon-->
    <link rel="icon" href="{{ url('/images/logo-smk-small.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">


    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!--Icons-->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <title>
        @if(View::hasSection('title'))
        @yield('title') -
        @endif
        Admin Panel
    </title>
</head>

<body>
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar col-lg-2">
                @include('components.sidebar')
            </div>
            <div class="col-lg-10 col-sm-10">
                @include('vendor.sweetalert.alert')
                @yield('content')
            </div>
        </div>
    </div>
    <div class="bg-white">
        @include('components.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ddfb8c5df.js" crossorigin="anonymous"></script>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="{{ url('js/moment-with-locales.js') }}"></script>
    @yield('js')

</body>

</html>
