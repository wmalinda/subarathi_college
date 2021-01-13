<!doctype html>
<html lang="en">

<!-- Mirrored from entiretimes.com/html/school/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Dec 2020 10:20:50 GMT -->
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fav Icon -->
<link rel="shortcut icon" href="{{ asset('assets/images/sulogo.jpg') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">

<!-- <link rel="stylesheet" href="css/switcher.css"> -->
<link rel="stylesheet" href="{{ asset('assets/rs-plugin/css/settings.css') }}">
<!-- Jquery Fancybox CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.fancybox.min.css') }}" media="screen" />
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"  id="colors">
<link href="{{ asset('assets/fonts.googleapis.com/css258f5.css?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap') }}" rel="stylesheet">
<link href="{{ asset('assets/fonts.googleapis.com/css2b210.css?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;display=swap') }}" rel="stylesheet">
<title>Subarathi Vidyalaya - Godagama</title>
@yield('css')
</head>
<body>



@include('components.header')
@yield('content')
@include('components.footer')



<!-- Js --> 
<script src="{{ asset('assets/js/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/js/popper.min.js') }}"></script> 
<script src="{{ asset('assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script src="{{ asset('assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<!-- Jquery Fancybox --> 
<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script> 
<!-- Animate js --> 
<script src="{{ asset('assets/js/animate.js') }}"></script> 
<script>
  new WOW().init();
</script> 
<!-- WOW file --> 
<script src="{{ asset('assets/js/wow.js') }}"></script> 
<!-- general script file --> 
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script> 
<script src="{{ asset('assets/js/script.js') }}"></script>
@yield('js')
</body>

<!-- Mirrored from entiretimes.com/html/school/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Dec 2020 10:25:39 GMT -->
</html>