<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.frontend.partials.head')
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
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