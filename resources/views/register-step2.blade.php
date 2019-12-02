@include("includes.header")
<div class="drive-reg-banner">
    <div class="top-nav-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo-wrap">
                        <a href="{{ URL::to("/") }}"><img src="{{ URL::to("images/ver-logo.png") }}"></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="top-nav">
                        <nav class="navbar-default" role="navigation">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbarCollapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse navbarCollapse">
                                    <ul>
                                        <li><a href="#">Overview</a></li>
                                        <li><a href="{{ URL::to("/how-it-works") }}">How it works</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Magazine</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="login-wrap">
                        <a href="{{ URL::to("/login") }}">login</a>
                    </div>
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--top-nav-bg-->

    <div class="container">
        <div class="col-sm-12 page-title">
            <h1>Driver Registration</h1>
        </div>
    </div>
</div><!--drive-reg-banner-->
<div class="body-content">
    <div class="container">
        <div class="col-sm-12">
            <div class="form-wrap">

                @include("includes.driver-register-header.driver-register")

                <form action="" id="registerFormStep2" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <?php

                    if(Session::get("register-form-2")){
                        $form_data = Session::get("register-form-2");
                    }

                    ?>

                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Vehicle Type</span>

                            {{ Form::select('vehicle[type]', ["SUV"=>"SUV","Car"=>"Car","Truck"=>"Truck","Bus"=>"Bus"],@$form_data['vehicle']['type']) }}
                            {{--<select >
                                <option>SUV</option>
                                <option>Car</option>
                                <option>Truck</option>
                                <option>Bus</option>
                            </select>--}}
                        </div>

                        <input type="hidden" name="verified_by_admin" value="2" />

                        <div class=" form-group col-md-6 ">
                            <span>Licence Plate Number</span>

                            <input type="text" id="vehicle[licence_plate_number]" value="{{ @$form_data['vehicle']['licence_plate_number'] }}" required name="vehicle[licence_plate_number]">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer2 form-group col-md-3">
                            <span>Car Color</span>
                            {{ Form::select('vehicle[car_color]', ["White"=>"White","Yellow"=>"Yellow","Blue"=>"Blue","Black"=>"Black"],@$form_data['vehicle']['car_color']) }}
                        </div>
                        <div class="spacer form-group col-md-3">
                            <span>Car Model</span>
                            <select name="vehicle[car_model]" class="fonto">
                                <?php
                                $starting_year  =date('Y', strtotime('-50 year'));
                                $ending_year = date('Y');
                                $current_year = date('Y');
                                for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                                    echo '<option value="'.$starting_year.'"';
                                    if( $starting_year ==  $current_year ) {
                                        echo ' selected="selected"';
                                    }
                                    echo ' >'.$starting_year.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Driver's Licence Number</span>
                            <input type="text" required id="vehicle[licence_number]" value="{{  @$form_data['vehicle']['licence_number'] }}" name="vehicle[licence_number]" class="fonto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6">
                            <span>Social Security Number</span>
                            <input type="text" class="fonto" placeholder="000-00-0000" required id="vehicle[social_security_number]" value="{{  @$form_data['vehicle']['social_security_number'] }}" name="vehicle[social_security_number]">
                        </div>
                        <div class="form-group col-md-6">
                            <span>Insurance Provider Name</span>
                            <input type="text" class="fonto" required id="vehicle[insurance_provider]"  value="{{  @$form_data['vehicle']['insurance_provider'] }}" name="vehicle[insurance_provider]">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Insurance Policy Number</span>
                            <input type="text" class="fonto" required id="vehicle[insurance_policy_number]"  value="{{  @$form_data['vehicle']['insurance_policy_number'] }}" name="vehicle[insurance_policy_number]">
                        </div>
                        <div class=" form-group col-md-6">
                            <span>Insurance Expiration Date</span>
                            <input type="text"  required id="vehicle[insurance_expire]"  value="{{  @$form_data['vehicle']['insurance_expire'] }}" name="vehicle[insurance_expire]" placeholder="MM" class="expireone fonto p1">
                            <input type="text" required id="vehicle[insurance_expire]"  value="{{  @$form_data['vehicle']['insurance_expire'] }}" name="vehicle[insurance_expire]" placeholder="YYYY" class="expireone fonto p2">
                        </div>
                       {{-- <div class="spacer3 form-group col-md-3">
                            <span></span>
                            <input type="text" name="" placeholder="YY" class="fixit">
                        </div>--}}
                    </div>
                    <div class="submit-row submit-button col-md-12">
                        <input type="submit" name="submit" value="Next">
                    </div>
                </form>
            </div>
        </div>
    </div><!--container-->
</div>
@include("includes.footer")
<script>

    $(document).ready(function(){
        $("[name='vehicle[insurance_expire]'].p1").mask('00');
        $("[name='vehicle[insurance_expire]'].p2").mask('0000');

        $("[name='vehicle[social_security_number]']").mask('000-00-0000');
        $("[name='vehicle[licence_plate_number]']").mask('AAA-AAA');
        //$("[name='vehicle[licence_number]']").mask('000-000');


        $("#registerFormStep2").validate();
    });
</script>
