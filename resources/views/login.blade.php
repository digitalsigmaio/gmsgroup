<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>Login - GMS Group</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{ asset('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}'" rel="stylesheet" />
    <link href="{{ asset('assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}'" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}'">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/xcharts.min.css') }}'" rel=" stylesheet">
    <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
    <!-- =======================================================
      Author: GMS Group
      Author URL: https://gms-gourp.company
	  Developer: Mohamed Ibrahim
	  E-Mail: m.sayed@gmsproduction.com
    ======================================================= -->
</head>

<body>

<div class="container" style="margin-top: 5%;">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Login</div>
            <div class="panel-body">

                <!-- Login Form -->
                <form action="{{ route('authentication') }}" method="post" role="form">
                    {{ csrf_field() }}
                    <!-- Username Field -->
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="username"><span class="text-danger" style="margin-right:5px;">*</span>Username:</label>
                            <div class="input-group">
                                <input class="form-control" id="username" type="text" name="username" placeholder="Username" required/>
                                <span class="input-group-btn">
                                    <label class="btn btn-primary"><span class="fa fa-user" aria-hidden="true"></span></label>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Field -->
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="password"><span class="text-danger" style="margin-right:5px;">*</span>Password:</label>
                            <div class="input-group">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required/>
                                <span class="input-group-btn">
                                <label class="btn btn-primary"><span class="fa fa-lock" aria-hidden="true"></span></label>

                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div class="row">
                        <div class="form-group col-xs-4">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </div>

                </form>
                <!-- End of Login Form -->

            </div>
        </div>
    </div>
</div>
<!-- container section start -->

<!-- javascripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}'"></script>
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- nice scroll -->
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{ asset('assets/jquery-knob/js/jquery.knob.js') }}"></script>
<script src="{{ asset('js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<!-- jQuery full calendar -->
<<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{ asset('assets/fullcalendar/fullcalendar/fullcalendar.js') }}"></script>
<!--script for this page only-->
<script src="{{ asset('js/calendar-custom.js') }}"></script>
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
<!-- custom select -->
<script src="{{ asset('js/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('assets/chart-master/Chart.js') }}"></script>

<!--custome script for all page-->
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ asset('js/sparkline-chart.js') }}"></script>
<script src="{{ asset('js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('js/xcharts.min.js') }}"></script>
<script src="{{ asset('js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('js/gdp-data.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>
<script src="{{ asset('js/sparklines.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });

    /* ------------ Delete ------------*/
    $(document).ready(function () {
        $('.deleteItem').on('click', function () {
            if (confirm('Are you sure?')) {
            } else {
                return false;
            }
        });
    });
</script>

</body>

</html>
