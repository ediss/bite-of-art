<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-menu.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style2.css')}}" />

    @yield('css')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<div class="container-fluid">

    @include('inc.navbar')

    @yield('content')

</div>


<!-- Footer -->
<div class="row">
    <footer class="page-footer footer">

        <!-- Copyright -->
        <div class="footer-copyright text-center ">All rights reserved © BITE of art 2020
        </div>
        <!-- Copyright -->

    </footer>
</div>

<!-- Footer -->

<!--Scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>



@yield('footer-scripts')


</body>

</html>