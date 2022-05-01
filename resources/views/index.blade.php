<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @env('production')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    @endenv

    <title>Ban-DERA</title>

    <script>
        window.ban_dera = {
            version: "{{ config('app.version') }}"
        }
    </script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E2JP8HENB3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E2JP8HENB3');
    </script>
    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
</head>

<body>
    <div id="app" data-bs-popper="data">
        {{-- App Content will be rendered here--}}
    </div>

    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>
</body>

</html>
