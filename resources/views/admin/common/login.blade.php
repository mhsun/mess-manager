<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/styles.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{ asset('public/backend/js/html5shiv.js') }}"></script>
    <script src="{{ asset('public/backend/js/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                <form method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Login">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->



<script src="{{ asset('public/backend/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/js/chart.min.js') }}"></script>
<script src="{{ asset('public/backend/js/chart-data.js') }}"></script>
<script src="{{ asset('public/backend/js/easypiechart.js') }}"></script>
<script src="{{ asset('public/backend/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap-datepicker.js') }}"></script>
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
