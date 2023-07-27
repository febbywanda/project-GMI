<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header" data-background-color="blue">
                <a href="{{ url('/dashboard') }}" class="logo">
                    <img src="{{ asset('admin/img/GMI Manna.png') }}" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>

            @include('admin.includes.navbar')
        </div>

        @include('admin.includes.sidebar')

        @yield('content')

        @include('admin.includes.footer')
    </div>

    </div>
    <!--   Core JS Files   -->
    @include('admin.includes.script')

</body>

</html>
