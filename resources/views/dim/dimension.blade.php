<!DOCTYPE HTML>

<html>
<head>
    <title>AS-PROGRAMMER</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('dim/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('dim/assets/css/custom.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('dim/assets/css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    @include('dim.header')

    <!-- Main -->
        <div id="main">

            @include('dim.intro')
            @include('dim.about')
            @include('dim.work')
            @include('dim.contact')

        </div>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; AS-PROGRAMMER. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>

</div>

<!-- BG -->
<div id="bg"></div>

<!-- Scripts -->
<script src="{{ asset('dim/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dim/assets/js/browser.min.js') }}"></script>
<script src="{{ asset('dim/assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('dim/assets/js/util.js') }}"></script>
<script src="{{ asset('dim/assets/js/main.js') }}"></script>
<script src="{{ asset('dim/assets/js/sendemail.js') }}"></script>

</body>