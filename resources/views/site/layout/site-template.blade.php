<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Luminarias Imperial - @yield('title')</title>

    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Bootstrap CSS File -->
    <link href="EstateAgency/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="EstateAgency/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="EstateAgency/lib/animate/animate.min.css" rel="stylesheet">
    <link href="EstateAgency/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="EstateAgency/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="EstateAgency/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .navbar-brand>img{
            max-width: 130px;
        }
    </style>
    @yield('css')
</head>
<body>
    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">Pesquisar</h3>
        </div>
        <span class="close-box-collapse right-boxed ion-ios-close"></span>
        <div class="box-collapse-wrap form">
            {!! Form::open(['route'=>'site.search.products','class'=>'form-a']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('type', 'Tipo')!!}
                            {{Form::select("type",$searchFormTypes->pluck('name', 'id'), 
                            isset($lastFormSeacrhProduct['size'])?$lastFormSeacrhProduct['type']:null,
                            ['class' => 'form-control form-control-lg form-control-a', 'placeholder' => ''])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!!Form::label('color', 'Cor')!!}
                            {{Form::select("color",$searchFormColors->pluck('name', 'id'), 
                            isset($lastFormSeacrhProduct['size'])?$lastFormSeacrhProduct['color']:null,
                            ['class' => 'form-control form-control-lg form-control-a', 'placeholder' => ''])}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('size', 'Tamanho')!!}
                            {{Form::select('size',$searchFormSizes->pluck('name', 'id'), 
                            isset($lastFormSeacrhProduct['size'])?$lastFormSeacrhProduct['size']:null,
                            ["class" => 'form-control form-control-lg form-control-a', 'placeholder' => ''])}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        {!! Form::submit('Pesquisar Luminárias', ['class'=>'btn btn-b']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!--/ Form Search End /-->   

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <a class="navbar-brand" href="{{route('site.home')}}">
                <img src="/img/logo.jpg" alt="Logo">
            </a>
            
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if(Route::currentRouteName()=== 'site.home')
                            <a class="nav-link active" href="{{route('site.home')}}">Home</a>
                        @else
                            <a class="nav-link" href="{{route('site.home')}}">Home</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Route::currentRouteName()=== 'site.products')
                            <a class="nav-link active" href="{{route('site.products')}}">Produtos</a>
                        @else
                            <a class="nav-link" href="{{route('site.products')}}">Produtos</a>
                        @endif
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
        </div>
    </nav>
    <!--/ Nav End /-->      
    
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">@yield('title-single')</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->
    
    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">Luminárias Imperial</span> Todos os direitos reservados.
                        </p>
                    </div>

                    <div class="credits">
                        Desenvolvido por <a href="#">Higon César</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>
    
    
    <!-- JavaScript Libraries -->
    <script src="EstateAgency/lib/jquery/jquery.min.js"></script>
    <script src="EstateAgency/lib/jquery/jquery-migrate.min.js"></script>
    <script src="EstateAgency/lib/popper/popper.min.js"></script>
    <script src="EstateAgency/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="EstateAgency/lib/easing/easing.min.js"></script>
    <script src="EstateAgency/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="EstateAgency/lib/scrollreveal/scrollreveal.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="EstateAgency/js/main.js"></script>       

    <script src="{{asset('js/app.js')}}"></script>
    {!! Toastr::render() !!}
    @yield('js')
</body>
</html>
