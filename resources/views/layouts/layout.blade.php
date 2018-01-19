<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Les Germés</title>

    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/one-page-wonder.min.css') }}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Les Germés</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/lesgermes/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/lesgermes" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <img src="{{asset('img/cropped-logo-germes-seul.png')}}">
            <p class="masthead-heading mb-0">Les Germés</p>
            <p class="masthead-subheading mb-0">Transmettre les dons de la nature Pour faire éclore le pouvoir qui est en nous!</p>
        </div>
    </div>
</header>

@yield('content')

<div class="parallax"></div>

<section>
    <div class="container text-center">
        <h3>Galerie</h3>

        <!-- LightWidget WIDGET -->
        <iframe src="//lightwidget.com/widgets/2331c396424453c8b00ce2da0f8e3185.html"
                scrolling="no"
                allowtransparency="true"
                class="lightwidget-widget"
                style="width: 100%; border: 0; overflow: hidden;"
        >
        </iframe>
    </div>


</section>

<!-- Footer -->
<footer class="py-5 bg-black">
    <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Les Germés 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset("node_modules/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("node_modules/bootstrap-validator/dist/validator.min.js")}}"></script>
<script src="{{asset("node_modules/nprogress/nprogress.js")}}"></script>
<script src="https://lightwidget.com/widgets/lightwidget.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')

</body>
</html>