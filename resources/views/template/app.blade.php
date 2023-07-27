<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - @yield('title')</title>
    @include('template.style')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('template.sidebar')
        </div>
        <div id="main" class='template-navbar'>
            @include('template.navbar')
            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>

                @include('template.footer')
            </div>
        </div>
    </div>
    @include('template.scripts')
</body>

</html>
