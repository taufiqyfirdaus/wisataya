<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.frontend.partials.head')
</head>
<body>
    <header>
        @include('template.frontend.partials.navbar')
    </header>

    @yield('content')

    @include('template.frontend.partials.footer')
    @include('template.frontend.partials.scripts')
</body>
</html>