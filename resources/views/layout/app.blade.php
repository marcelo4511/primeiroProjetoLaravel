<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Produtos</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <style>
            body {
                padding: 20px;
            }
            .navbar {
                margin-bottom: 20px;
            }
        </style>
    </head>
<body>
    <div class="container">
        @component('componente_navbar', [ "current" => $current ])
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
      
    @hasSection('javascript')
    @yield('javascript')
    @endif
</body>
</html>