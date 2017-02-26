<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:title" content="Garage" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}/" />
    <meta property="og:image" content="{{ url('/touch-icon.png') }}" />

    <title>Garage</title>

    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
    </script>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/touch-icon.png" rel="apple-touch-icon" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('head')

</head>
<body>
    <!-- app -->
    <div id="app">
        @yield('content')
    </div>
    <!--/.app -->

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
