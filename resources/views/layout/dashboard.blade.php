<!DOCTYPE html>
<html>

<head>
   @include('inc.moderator.head')
</head>

<body>
    <header class="header">
     @include('inc.moderator.nav')
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('inc.moderator.sidebar')

        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    @include('inc.moderator.cards')
                </div>
            </section>
            <section class="no-padding-bottom">
                <div class="container-fluid" id="content">
                    @yield('content')
                </div>
            </section>


            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        <p class="no-margin-bottom">2019 &copy; Your company. Design by <a
                                href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/dashboard/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/charts-home.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/front.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script src=" {{ asset('assets/js/common/ajaxload.js') }}"></script>
    <script src=" {{ asset('assets/js/common/pagination.js') }}"></script>
    <script src=" {{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script src=" {{ asset('assets/js/common/global.js') }}"></script>

    <script>
        AjaxLoad.initialize();
    </script>
    @yield('footer-scripts')

    
    <script>



        $(document).on('change', '.gallerist_id2', function(e) {
            var approved= $(this).prop("checked");

            var gallerist_id = $(this).attr('data-id');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('approve.gallerist',"gallerist_id") }}",
                method: 'post',
                data: {
                    approved: approved,
                    id: gallerist_id
                },
                success: function(response){
                    if (typeof response.message != "undefined" && response.message.length) {
                        toastr[response.message[0]](response.message[1]);
                    }
                }
            });
        });

        $(document).on('change', '.event_id', function(e) {

            var approved= $(this).prop("checked");

            var event_id = $(this).attr('data-id');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('approve.event',"event_id") }}",
                method: 'post',
                data: {
                    approved: approved,
                    id: event_id
                },
                success: function(response){
                  if (typeof response.message != "undefined" && response.message.length) {
                        toastr[response.message[0]](response.message[1]);
                    }
                }
            });
        });


        $(document).on('change', '.article_id', function(e) {
            var approved= $(this).prop("checked");

            var article_id = $(this).attr('data-id');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('approve.article',"article_id") }}",
                method: 'post',
                data: {
                    approved: approved,
                    id: article_id
                },
                success: function(response){
                    if (typeof response.message != "undefined" && response.message.length) {
                        toastr[response.message[0]](response.message[1]);
                    }
                }
            });
        });

    $(document).on('click', '.all-gallerists', function(e) {

            e.preventDefault();
            $('.fa-users').css("color", "#864DD9");
            $('.fa-newspaper-o').css("color", "inherit");
            $('.fa-calendar').css("color", "inherit");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/moderator/get-gallerists') }}",
                method: 'get',
                success: function(data){
                    $('#content').html(data.html);
                }
            });

        });

        $( ".all-events" ).click(function(e) {
            e.preventDefault();
            $('.fa-users').css("color", "inherit");
            $('.fa-newspaper-o').css("color", "inherit");
            $('.fa-calendar').css("color", "#CF53F9");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/moderator/get-events') }}",
                method: 'get',
                success: function(data){
                    $('#content').html(data.html);
                }
            });

        });

        $( ".all-news" ).click(function(e) {
            e.preventDefault();

            $('.fa-newspaper-o').css("color", "#e95f71");
            $('.fa-users').css("color", "inherit");
            $('.fa-calendar').css("color", "inherit");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/moderator/get-news') }}",
                method: 'get',
                success: function(data){
                    $('#content').html(data.html);
                }
            });

        });


        $(document).on('click', '.all-event-data', function(e) {

            var event_id = $(this).attr('event_id');

            

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                
                url: "/moderator/update-whole/event/"+event_id,
                method: 'get',
                success: function(data){
                    $('#content').html(data.html);
                }
            });

        });

        $(document).on('click', '.custom-control-input', function(e) {
            // e.preventDefault();

            $event_id = $(this).val();

        });
    </script>


</body>

</html>