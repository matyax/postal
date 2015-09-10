<!doctype html>
<html class="no-js" lang="" ng-app="postalApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Postal Urbana</title>
        <meta name="keywords" content="postal, urbana, diseño, web, marketing, redes, sociales, mendoza">
        <meta name="description" content="Postal Urbana - Diseño gráfico, web, marketing digital y redes sociales. Mendoza, Argentina">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Sanchez:400italic,400' rel='stylesheet' type='text/css'>
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="/css/main.css">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <meta property="og:title" content="Postal Urbana" />
        <meta property="og:site_name" content="Postal Urbana"/>
        <meta property="og:url" content="http://www.postalurbana.com.ar" />
        <meta property="og:description" content="Postal Urbana - Diseño gráfico, web, marketing digital y redes sociales. Mendoza, Argentina" />
        <meta property="og:locale" content="es_AR" />
        <meta property="og:image"content="http://www.postalurbana.com.ar/fbbrand.png" />

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield('content')

        <script src="{{ asset('js/plugins.js') }}"></script>
        <?php foreach (Javascript::loadApplicationFiles('website') as $file): ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-67280682-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
