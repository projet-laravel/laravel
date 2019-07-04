@extends('layouts.portefeuille')

@section('content')

        <!--CUSTOM CHART START -->
        <div class="border-head">
            <h3>USER VISITS</h3>
        </div>
        <div class="custom-bar-chart">
            <ul class="y-axis">
                <li><span>10.000</span></li>
                <li><span>8.000</span></li>
                <li><span>6.000</span></li>
                <li><span>4.000</span></li>
                <li><span>2.000</span></li>
                <li><span>0</span></li>
            </ul>
            <div class="bar">
                <div class="title">JAN</div>
                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
            </div>
            <div class="bar ">
                <div class="title">FEB</div>
                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
            </div>
            <div class="bar ">
                <div class="title">MAR</div>
                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
            </div>
            <div class="bar ">
                <div class="title">APR</div>
                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
            </div>
            <div class="bar">
                <div class="title">MAY</div>
                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
            </div>
            <div class="bar ">
                <div class="title">JUN</div>
                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
            </div>
            <div class="bar">
                <div class="title">JUL</div>
                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
            </div>
        </div>
        <!--custom chart end-->
        <div class="row mt">
            <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                    <div id="profile-02">
                        <div class="user">
                            <img src="img/friends/fr-06.jpg" class="img-circle" width="80">
                            <h4>DJ SHERMAN</h4>
                        </div>
                    </div>
                    <div class="pr2-social centered">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
                <!-- /panel -->
            </div>
            <!-- SERVER STATUS PANELS -->
            <div class="col-md-4 mb">
                <div class="weather pn">
                    <i class="fa fa-cloud fa-4x"></i>
                    <h2>11º C</h2>
                    <h4>BUDAPEST</h4>
                </div>
            </div>
            <!-- /col-md-4-->

            <!-- /col-md-4 -->
            <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                    <div class="green-header">
                        <h5>REVENUE</h5>@foreach( $messages['revenu'] as $msg)
                            {{ $msg->amount }},
                        @endforeach
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[
                                @foreach( $messages['revenu'] as $key => $value)
                                    {{ $value->amount }}
                                    @if($key != count($messages['revenu'])-1)
                                    ,
                                    @endif
                                @endforeach
                                                                                                              ]"></div>
                    </div>
                    <p class="mt"><b><strong>{{ $messages['sum1']}}€</strong>
                        </b><br/>Total</p>
                </div>
            </div>
            <!-- /col-md-4 -->
        </div>
        <!-- /row -->


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="lib/jquery/jquery.min.js"></script>

        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="lib/jquery.scrollTo.min.js"></script>
        <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="lib/jquery.sparkline.js"></script>
        <!--common script for all pages-->
        <script src="lib/common-scripts.js"></script>
        <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="lib/gritter-conf.js"></script>
        <!--script for this page-->
        <script src="lib/sparkline-chart.js"></script>
        <script src="lib/zabuto_calendar.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var unique_id = $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'Welcome to Dashio!',
                    // (string | mandatory) the text inside the notification
                    text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
                    // (string | optional) the image to display on the left
                    image: 'img/ui-sam.jpg',
                    // (bool | optional) if you want it to fade out on its own or just sit there
                    sticky: false,
                    // (int | optional) the time you want it to be alive for before fading out
                    time: 8000,
                    // (string | optional) the class name you want to apply to that specific message
                    class_name: 'my-sticky-class'
                });

                return false;
            });
        </script>
        <script type="application/javascript">
            $(document).ready(function() {
                $("#date-popover").popover({
                    html: true,
                    trigger: "manual"
                });
                $("#date-popover").hide();
                $("#date-popover").click(function(e) {
                    $(this).hide();
                });

                $("#my-calendar").zabuto_calendar({
                    action: function() {
                        return myDateFunction(this.id, false);
                    },
                    action_nav: function() {
                        return myNavFunction(this.id);
                    },
                    ajax: {
                        url: "show_data.php?action=1",
                        modal: true
                    },
                    legend: [{
                        type: "text",
                        label: "Special event",
                        badge: "00"
                    },
                        {
                            type: "block",
                            label: "Regular event",
                        }
                    ]
                });
            });

            function myNavFunction(id) {
                $("#date-popover").hide();
                var nav = $("#" + id).data("navigation");
                var to = $("#" + id).data("to");
                console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
            }
        </script>
@endsection