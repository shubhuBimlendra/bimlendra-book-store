<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.layout.top')
</head>

<body>
    <!-- Topbar Start -->
    @include('front.layout.header')
    <!-- Topbar End -->


    @yield('content')


    <!-- Footer Start -->
    @include('front.layout.footer')
    <!-- Footer End -->


    @include('front.layout.bottom')
</body>

</html>
