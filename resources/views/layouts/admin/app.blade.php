<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Volt - Free Bootstrap 5 Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Volt CSS -->
    {{-- before --}}
    {{-- <link type="text/css" href="{{../../css/volt.css}}" rel="stylesheet"> --}}

    {{-- after --}}

    {{-- start CSS --}}
    @include('layouts.admin.css')
    {{-- end css --}}

</head>

<body>
    {{-- start sidebar --}}
    @include('layouts.admin.sidebar')
    {{-- end sidebar --}}

    <main class="content">

        {{-- start header --}}
        @include('layouts.admin.header')
        {{-- end header --}}

        {{-- start main content --}}
        @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
        @include('layouts.admin.footer')
        {{-- end footer --}}

    </main>

    {{-- before --}}
    {{-- <!-- Core -->
	<script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
	<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Vendor JS -->
	<script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script> --}}

    {{-- after --}}

    {{-- start JS --}}
    @include('layouts.admin.js')
    {{-- end JS --}}

</body>

</html>
