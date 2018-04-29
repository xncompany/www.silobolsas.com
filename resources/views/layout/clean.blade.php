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

            <div class="sidebar-header">
              <div class="pull-right pt-lg text-muted hidden">
                <em class="ion-close-round"></em>
              </div>
              <a class="sidebar-header-logo" href="#">
                <img src="/img/logo.png" alt="Logo">
              </a>
            </div>
          
          <!-- Main section-->
          <main class="main-container m0">

            @yield('content')

          </main>

        </div>

        @include('layout/scripts')

    </body>
</html>