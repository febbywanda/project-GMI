<!DOCTYPE html>
<html lang="en">

<head>
  @include('pages.partials._head')
</head>

<body>

        @include('pages.partials._navbar')

        @yield('content')

        @include('pages.partials._footer')
        
    @include('pages.partials._script')
  </body>
</html>
