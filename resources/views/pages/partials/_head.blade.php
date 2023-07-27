<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
{{-- Icon --}}
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<!-- Bootstrap CSS -->

<link rel="icon" href="{{ asset('pages/images/icon.png') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('pages/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('pages/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@stack('styles')
@method('css')

