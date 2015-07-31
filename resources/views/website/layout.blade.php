<!doctype html>
<html class="no-js" lang="" ng-app="yacopiniApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Website name</title>
        <meta name="description" content="Description">
        <meta name="keywords" content="Keywords">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

    </head>
    <body class="{{ $bodyClassName or 'none' }}" >
        <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

        @yield('content')

        <script src="{{ asset('js/plugins.js') }}"></script>
        <?php foreach (Javascript::loadApplicationFiles('website') as $file): ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </body>
</html>