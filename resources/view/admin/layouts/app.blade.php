<!doctype html>
<html lang="en">

<head>
   @include('admin.layouts.head-tag')
   @yield('title')
</head>




    @include('admin.layouts.sidebar')

<nav class="admin-title">
    <!-- name -->
    <h2><?= \System\Auth\Auth::user()->first_name .' '. \System\Auth\Auth::user()->last_name ?></h2>
    <!-- logout -->
    <a href="/logout"><button class="button">خروج</button></a>
</nav>

            <div>
                @yield('content')
            </div>


<div>
    @include('admin.layouts.scripts')
    @yield('script')
</div>

</body>

</html>