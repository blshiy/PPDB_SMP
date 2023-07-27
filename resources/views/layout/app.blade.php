<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - @yield('title')</title>
    @include('layout.style')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layout.sidebar')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layout.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>

                @include('layout.footer')
            </div>
        </div>
    </div>
    @include('layout.scripts')
</body>

</html>
