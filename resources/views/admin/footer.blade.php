        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Techopia
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="">Techopia</a>
                </div>
            </div>
        </footer>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="{{ URL::to("/") }}/assets/bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>

    <script src="{{ URL::to("/") }}/assets/bower_components/moment/min/moment.min.js"></script>

    <script src="{{ URL::to("/") }}/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ URL::to("/") }}/assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="{{ URL::to("/") }}/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ URL::to("/") }}/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="{{ URL::to("assets/footable/js/footable.min.js") }}"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ URL::to("/") }}/assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ URL::to("/") }}/assets/js/demo.js"></script>

    <script src="{{ URL::to("/") }}/assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js""></script>



    <script type="text/javascript">
        $(document).ready(function(){

            $('.table').footable();

            $('#datetimepicker1, #datetimepicker2').datetimepicker();

            demo.initChartist();


                            @if (\Session::has('success'))
                                


        $.notify({
                
                message: "{{ \Session::get('success') }}."
            },{
                type: 'success',
                timer: 4000
            });                                

                            @endif


                            @if (\Session::has('error'))
                                


                                        $.notify({

                message: "{{ \Session::get('error') }}."

            },{
                type: 'danger',
                timer: 4000
            });                                
                            @endif

            

        });
    </script>

    <?php 
        if (\Session::has('error'))
        {
            \Session::forget('error');
        }

        if (\Session::has('success'))
        {
            \Session::forget('success');
        }
    ?>

</html>
