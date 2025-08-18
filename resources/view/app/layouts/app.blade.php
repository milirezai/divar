<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>

    <head>
        @include('app.layouts.head-tag')
        @yield('head-tag')
    </head>

</head>
<body>

@include('app.layouts.header')

@yield('content')


@include('app.layouts.scripts')
</body>
</html>