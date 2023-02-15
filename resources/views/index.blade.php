<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ban-DERA</title>

    @env('production')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

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
    @endenv

    @include('components.favicon')


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="preloader" class="preloader show">
        <div class="container">
            <h3 class="loading text-uppercase">{{ __('Loading') }}</h3>
            <div class="quote-container">
                <div class="quote">
                    {!! $quote->content !!}
                </div>
                <small>{!! $quote->author !!}</small>
            </div>
        </div>
    </div>
    <div id="app" data-bs-popper="data">
        {{-- Vue App will be rendered here--}}
    </div>

    <script src="{{ asset('js/app.js') }}" type="application/javascript"></script>
</body>

</html>
