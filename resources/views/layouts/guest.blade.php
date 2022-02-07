<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('meta')

    <!-- favicon -->
    <link href="{{asset('images/logo_only_200.jpg')}}" rel="apple-touch-icon" sizes="144x144" />
    <link href="{{asset('images/logo_only_200.jpg')}}" rel="apple-touch-icon" sizes="114x114" />
    <link href="{{asset('images/logo_only_200.jpg')}}" rel="apple-touch-icon" sizes="72x72" />
    <link href="{{asset('images/logo_only_200.jpg')}}" rel="apple-touch-icon" />
    <link href="{{asset('images/logo_only_200.jpg')}}" rel="shortcut icon" />

    <!-- Icons -->
    <link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('js/vendors/revolution/css/settings.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/additional.css')}}" />
    @livewireStyles

    @stack('custom-styles')
</head>

<body>
    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            "Loading..."
        </div>
    </div>

    <main class="main-wrapper">

        <livewire:layouts.navbar />

        <div class="content-wrapper content-wrapper--boxed oh">

            <div class="rev-offset"></div>

            @yield('content')

            <livewire:layouts.footer />

            <div id="back-to-top">
                <a href="#top"><i class="ui-arrow-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- Javascript =============================-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('js/rev-slider.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @livewireScripts

    @stack('custom-scripts')
</body>

</html>
