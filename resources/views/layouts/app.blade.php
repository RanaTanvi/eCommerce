<!DOCTYPE html>
    {{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl"> --}}
        <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title','Product')</title>
        <meta name="description" content="@yield('meta_description', 'eCommerce')">
        <meta name="author" content="@yield('meta_author', 'Tanvi Rana')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        
        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->

        @stack('after-styles')

    </head>
    <body>
        <div id="app">
            @include('layouts.includes.header')
            <div class="alert alert-success fade in">
                <strong>Success!</strong> Indicates a successful or positive action.
            </div>

            <div class="container">
                @yield('content')
            </div>
        </div><!-- #app -->
      
        <!-- Scripts -->
        @stack('before-scripts')
        <script src="{{asset('js/bootstrap.js')}}"></script> 
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script src="https://unpkg.com/bootoast@1.0.1/dist/bootoast.min.js"></script>

        <script>
            var url = window.location.href; 
            $("li a").each(function() {
                console.log(url);
                if(url == (this.href)) { 
                    $(this).addClass("active");
                }
            });

            
            setTimeout(() => {
                $('.alert-success').hide();   
            }, 5000);
            </script>
        @stack('after-scripts')

    </body>
</html>
