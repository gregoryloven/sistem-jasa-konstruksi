<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spero - Construction HTML5 Bootstrap Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="../../enduser/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="../../enduser/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="../../enduser/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../../enduser/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../../enduser/css/responsive.css">
</head>

<body>

<!-- Body main wrapper start -->
<div class="body-wrapper">    
    
    @include('layouts_enduser.navbar')    
    @yield('content')
    @include('layouts_enduser.footer')

</div>
<!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="../../enduser/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="../../enduser/js/main.js"></script>
  
</body>

</html>

