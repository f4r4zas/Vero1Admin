@include('includes.header')

    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDZ6v5rVNIY_XwJfCdIntpT1jNj0wLVReY&libraries=places"></script>

     <script>
        var placeSearch, autocomplete;
        var componentForm = {
            /*street_number: 'short_name',*/
           /* route: 'long_name',*/
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };



        function initAutocomplete(){

            var input = document.getElementById('home_address');
            var searchBox = new google.maps.places.SearchBox(input);
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
          /*  map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
*/
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('home_address')),
                {types: ['geocode'],  componentRestrictions: {country: "us"}
                });
            autocomplete.addListener('place_changed', fillInAddress);

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            /*for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }*/

        }


        function fillInAddress() {

            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>

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
                                        <li><a href="#">Home</a></li>
                                        <li><a href="{{ URL::to("/how-it-works") }}">How it works</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Driver Store</a></li>
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

                <form id="registerFormStep1" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                    @if(Session::has('message'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                    @endif

                    <?php

                    if(Session::get("register-form-1")){
                       $form_data = Session::get("register-form-1");
                    }
                    //print_r($form_data);
                    ?>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>First Name</span>
                            <input type="text" value="{{ (@old('first_name')) ? @old('first_name') : @$form_data['first_name'] }}" required name="first_name">
							
                        </div>
                        <div class=" form-group col-md-6 ">
                            <span>Last Name</span>
                            {{--<input type="text" required name="last_name" value="{{ @$form_data['last_name']  }}">--}}
                            <input type="text" required name="last_name" value="{{ (@old('last_name')) ? @old('last_name') : @$form_data['last_name']  }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Gender</span>
                            {{ Form::select('gender', ["Male"=>"Male","Female"=>"Female","Other"=>"Other"], (@old("gender")) ? @old("gender") : @$form_data['gender'] ) }}
                        </div>
                        <div class=" form-group col-md-6">
                            <span>Mobile Phone Number</span>
                            <input type="text" value="{{ (@old("phoneNumber")) ? @old("phoneNumber") : @$form_data['phoneNumber'] }}" required name="phoneNumber" class="fonto">
                        </div>
                    </div>
                    <div class="form-group form-row">
					 <div class="spacer form-group col-md-6 ">
                        <span>Email Address</span>
                        <input type="email" value="{{ (@old("userEmail")) ? @old("userEmail") : @$form_data['userEmail'] }}" required name="userEmail">
						 </div>
						 <div class="spacer form-group col-md-6 ">
                        <span>Confirm Email Address</span>
                        <input type="email" value="{{ (@old("userEmail")) ? @old("userEmail") : @$form_data['userEmail'] }}" required name="userEmail">
						 </div>
                    </div>
                    <div class="form-row ">
                        <div class="spacer form-group col-md-6 ">
                            <span>Password</span>
                            <input type="password" id="main_password" name="password" required>
                            <span class="custom help-block">Password should contain at least one capital and one special character</span>
                        </div>
                        <div class=" form-group col-md-6 ">
                            <span>Confirm Password</span>
                            <input type="password" id="confirmPassword" name="confirm_Password" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>What country do you want to drive in?</span>
                            <select name="question[driveCountry]">
                                <option value="USA">United States of America</option>
                            </select>
                        </div>
                        <div class=" form-group col-md-6 fonto">
                            <span>State</span>
                            {{ Form::select('question[state]', $data["USStates"],(@old("question[state]")) ? @old("question[state]") : @$form_data['question']['state']) }}
                            {{--<input type="text" value="{{ (@old("question")['state']) ? @old("question")['state'] : @$form_data['home_address'] }}" required name="question[state]">--}}


                        </div>
                    </div>
                    <div class="form-group form-row">
                        <span>Home Address</span>
                        <input placeholder="Type Full Address" type="text" value="{{ (@old("home_address")) ? @old("home_address") : @$form_data['home_address'] }}" required id="home_address" placeholder="" name="home_address">

                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Zip Code</span>
                            <input type="text" placeholder="Zip Code *" id="postal_code" value="{{ (@old("zip")) ? @old("zip") : @$form_data['zip'] }}" autocomplete="nok" required name="zip" class="fonto">

                        </div>
                         <div class=" form-group col-md-6 city">

                            <span>City</span>
                             <input type="text"  placeholder="City" id="locality" value="{{ (@old("city")) ? @old("city") : @$form_data['city'] }}" autocomplete="nok" required name="city" id="city" class="fonto">
                        </div>
                    </div>
                    <!--<div class="form-row">
                         <div class=" form-group col-md-6 ">
                            <span>State</span>
                            {{--{{ Form::select('state', $data["USStates"],(@old("state")) ? @old("state") : @$form_data['state']) }}--}}
                             <input type="text" disabled="true" id="administrative_area_level_1" value="{{ (@old("state")) ? @old("state") : @$form_data['state'] }}" placeholder="State" autocomplete="nok" required name="state" class="fonto">
                        </div>
                        <div class="form-group col-md-6">
                            <span>Country</span>
                            <input type="text" placeholder="Country" disabled="true" id="country" value="{{ (@old("country")) ? @old("country") : @$form_data['country'] }}" autocomplete="nok" required name="country" class="fonto">
                            {{--<select  name="country">
                                <option>United States</option>
                            </select>--}}
                        </div>
                    </div>-->
                    <div class="form-row">
                        <div class="spacer form-group col-md-6">
                            <span>What is your highest level of education?</span>

                            {{ Form::select('question[hightLevelEducation]', ['No formal education'=>'No formal education',
                            'Primary education'=> 'Primary education',
                            'Secondary education or high school' => 'Secondary education or high school',
                            'GED' => 'GED',
                            'Vocational qualification'=> 'Vocational qualification',
                            'Bachelor"s degree' => 'Bachelor"s degree',
                            'Master"s degree'=> 'Master"s degree',
                            'Doctorate or higher' => 'Doctorate or higher' ],(@old("question")['hightLevelEducation']) ? @old("question")['hightLevelEducation'] : @$form_data['question']['hightLevelEducation']) }}





                            {{-- <select name="question[hightLevelEducation]">
                                 <option>High School Graduate</option>
                                 <option>None</option>
                             </select>--}}
                        </div>
                        <div class="adjustform form-group col-md-6 ">
                            <span>Which service you are most interested?</span>

                            {{ Form::select('question[interestedService]', ['Item Purchase'=>'Item Purchase','Parcel delivery'=>'Parcel delivery' ],(@old("question")['interestedService']) ? @old("question")['interestedService'] : @$form_data['question']['interestedService']) }}



                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Are you professionally licensed?</span>

                            {{ Form::select('question[professionalLicensed]', ['Yes'=>'Yes','No'=>'No' ],(@old("question")['professionalLicensed']) ? @old("question")['professionalLicensed'] : @$form_data['question']['professionalLicensed']) }}



                        </div>
                        <div class=" form-group col-md-6 ">
                            <span>Are you bonded?</span>

                            {{ Form::select('question[bounded]', ['Yes'=>'Yes','No'=>'No' ],(@old("question")['bounded']) ? @old("question")['bounded'] : @$form_data['question']['bounded']) }}

                        </div>
                    </div>
                    <div class="form-group form-row">
                        <span>Are you insured?</span>

                        <?php
                        $youInsured = "No";
                        if(!empty(@$form_data['insured'])){
                            $youInsured = "Yes";
                        }

                        if(!empty(@old("insured"))){
                            $youInsured = "Yes";
                        }

                        ?>

                        {{ Form::select('insured', ['No'=>'No','Yes'=>'Yes' ],(@old("insured")) ? @old("insured") : @$form_data['insured']) }}

                    </div>

                    <div class="form-group form-row" style="<?php if($youInsured == "No"){echo 'display:none';} ?>" id="ans-insured">
                        <span>Name of insurance Provider</span>
                        <input placeholder="provide details" type="text" value="{{ (@old("question")['insured']) ? @old("question")['insured'] : @$form_data['question']['insured'] }}" name="question[insured]">

                    </div>

                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Do you have any professional service licenses?</span>

                            {{ Form::select('question[professionalServiceLicenses]', ['Yes'=>'Yes','No'=>'No' ],(@old("question")['professionalServiceLicenses']) ? @old("question")['professionalServiceLicenses'] : @$form_data['question']['professionalServiceLicenses']) }}

                        </div>
                        <div class=" form-group col-md-6 ">
                            <span>Please select</span>

                            {{ Form::select('question[profession]', ['Electrician'=>'Electrician','HVAC'=>'HVAC','Health care'=>'Health care','Pest control exterminators'=>'Pest control exterminators','House cleaning services'=>'House cleaning services','Junk, waste, and debris removal'=>'Junk, waste, and debris removal','Driving'=>'Driving','Swimming pool cleaner'=>'Swimming pool cleaner','Gardener and landscaping'=>'Gardener and landscaping','Yard maintenance and cleaning'=>'Yard maintenance and cleaning','Window cleaning'=>'Window cleaning','Electrician'=>'Electrician','Handyman'=>'Handyman','Snow removal'=>'Snow removal','Locksmith'=>'Locksmith','Nursing and home therapists'=>'Nursing and home therapists' ],(@old("question")['profession']) ? @old("question")['profession'] : @$form_data['question']['profession']) }}

                        </div>
                    </div>
                    <div class="form-group form-row">
                        <span>Are you authorized to work in the U.S.?</span>

                        {{ Form::select('question[autToWorkUS]', ['Yes'=>'Yes','No'=>'No' ],(@old("question")['autToWorkUS']) ? @old("question")['autToWorkUS'] : @$form_data['question']['autToWorkUS']) }}


                    </div>

                    <div class="form-group form-row">
                        <span>Do you have commercial auto policy.?</span>

                        {{ Form::select('question[autoPolicy]', ['Yes'=>'Yes','No'=>'No' ],(@old("question")['autoPolicy']) ? @old("question")['autoPolicy'] : @$form_data['question']['autoPolicy']) }}


                    </div>

                    <div class="form-group form-row">
                        <span>Do you have property damage coverage.?</span>

                        <input placeholder="provide details" type="text" value="{{  (@old("question")['damageCover']) ? @old("question")['damageCover'] : @$form_data['question']['damageCover'] }}" name="question[damageCover]">


                    </div>

                    <div class="form-group form-row">
                        <span>Do you have personal liability coverage.?</span>

                        <input placeholder="provide details" type="text" value="{{  (@old("question")['personalCover']) ? @old("question")['personalCover'] : @$form_data['question']['personalCover'] }}" name="question[personalCover]">


                    </div>
                    <div class="form-group form-row">
                        <span>Have you ever been convicted of a felony?</span>


                        <?php
                        $everFelony = "No";
                        if(!empty(@$form_data['question']['everFelony'])){
                            $everFelony = "Yes";
                        }
						
						if(!empty(@old("question")['everFelony'])){
							$everFelony = "Yes";
						}

                        ?>
                        {{ Form::select('everFelony', ['Yes'=>'Yes','No'=>'No' ],$everFelony) }}

                    </div>
                    <div class="form-group form-row" style="<?php if($everFelony == "No"){echo 'display:none';} ?>" id="ans-everFelony">
                        <span>Provide Details</span>
                        <input placeholder="provide details" type="text" value="{{ (@old("question")['everFelony']) ? @old("question")['everFelony'] : @$form_data['question']['everFelony'] }}" name="question[everFelony]">

                    </div>


                    <div class="form-group form-row">
                        <span>Have you ever been convicted of a DUI and/or reckless driving?</span>

                        <?php
                        $conviction = "No";
                        if(!empty(@$form_data['question']['conviction'])){
                            $conviction = "Yes";
                        }
						
						if(!empty(@old("question")['conviction'])){
                            $conviction = "Yes";
                        }
						
                        ?>

                        {{ Form::select('conviction', ['Yes'=>'Yes','No'=>'No' ],$conviction) }}


                    </div>

                    <div class="form-group form-row" id="ans-conviction" style="<?php if($conviction == "No"){echo 'display:none';} ?>">
                        <span>Provide Details</span>
                        <input placeholder="provide details" type="text" value="{{  (@old("question")['conviction']) ? @old("question")['conviction'] : @$form_data['question']['conviction'] }}" name="question[conviction]">

                    </div>
                    <div class="form-group form-row">
							<span>Have you ever been convicted of a crime of dishonesty and/or terminated from any prior employment for dishonesty
(e.g., theft, shoplifting, embezzlement, fraud, identify theft, misrepresentation)?</span>

                        <?php
                        $provideDetailsThree = "No";
                        if(!empty(@$form_data['question']['provideDetailsThree'])){
                            $provideDetailsThree = "Yes";
                        }
						
						if(!empty(@old("question")['provideDetailsThree'])){
                            $provideDetailsThree = "Yes";
                        }
                        ?>

                        {{ Form::select('provideDetailsThree', ['Yes'=>'Yes','No'=>'No' ],$provideDetailsThree) }}

                    </div>
                    <div class="form-group form-row" id="ans-provideDetailsThree" style="<?php if($provideDetailsThree == "No"){echo 'display:none';} ?>">
                        <span>Provide Details</span>

                        <input placeholder="provide details" type="text" value="{{ (@old("question")['provideDetailsThree']) ? @old("question")['provideDetailsThree'] : @$form_data['question']['provideDetailsThree'] }}" name="question[provideDetailsThree]">

                    </div>
                    <div class="submit-row submit-button col-md-12">
                        <input type="submit" name="submit" value="Next">
                    </div>
                </form>
            </div>
        </div>
    </div><!--container-->
</div>
@include('includes.footer')
<script>
    $(document).ready(function(){


        $("[name='phoneNumber']").mask("(000) 000-0000");

      /*  $("[name='state']").select2();
        $("[name='city']").select2();*/
        /*$("[name='question[interestedService]']").select2({
            multiple: true,
        });*/



        $("[name='state']").change(function(){

            var state = $("option:selected",this).text();

            $.ajax({
                type:"POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    state:state
                },
                url: " {{ URL::to('/get_city')  }}",
                beforeSend: function( xhr ) {
                    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                }
            }).done(function( data ) {
                    $("[name='city']").html(data);
            });
        });

            $("#registerFormStep1").validate({
                rule:{
                    password:"required",
                    confirm_Password: {
                        equalTo: "#main_password"
                    },
                }
            });

            $("[name='everFelony']").change(function(){
                if($(this).val() == "Yes"){
                    $("#ans-everFelony").show();
                }else{
                    $("#ans-everFelony").hide();
                    $("[name='question[everFelony]']").val("");
                }
            });

            $("[name='conviction']").change(function(){
                console.log("worked");
                    if($(this).val() == "Yes"){
                        $("#ans-conviction").show();
                    }else{
                        $("#ans-conviction").hide();
                        $("[name='question[conviction]']").val("");
                    }
            });

            $("[name='provideDetailsThree']").change(function(){
                    if($(this).val() == "Yes"){

                        $("#ans-provideDetailsThree").show();
                    }else{
                        $("#ans-provideDetailsThree").hide();
                        $("[name='question[provideDetailsThree]']").val("");
                    }
            });


            $("[name='insured']").change(function(){
                    if($(this).val() == "Yes"){

                        $("#ans-insured").show();
                    }else{
                        $("#ans-insured").hide();
                        $("[name='question[insured]']").val("");
                    }
            });

        });
</script>