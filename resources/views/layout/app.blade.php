<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Smartium">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Smartium - @yield('title')</title>
        
        @include('layout/styles')
    </head>
    <body class="theme-1">
        <div class="layout-container">

            @section('topbar')
                @include('layout/topbar', ['admin' => isset($admin)])
            @show

            @section('sidebar')
                @include('layout/sidebar', ['admin' => isset($admin)])
            @show
          
          <!-- Main section-->
          <main class="main-container">

            @yield('content')

          </main>

        </div>

        @include('layout/scripts')

    </body>
</html>