<!doctype html>
<html class="no-js" lang="" ng-app="adminApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Yacopini</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,400italic' rel='stylesheet' type='text/css'>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @yield('content')

        <script src="{{ asset('js/plugins.js') }}"></script>
        <?php foreach (Javascript::loadApplicationFiles('admin') as $file): ?>
            <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <script src="{{ asset('js/admin/parameters.js') }}"></script>
        <script src="{{ asset('js/vendor/ckeditor/ckeditor.js') }}"></script>

    </body>
</html>