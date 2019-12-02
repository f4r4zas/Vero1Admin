@include('includes.header')
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

                <form action="{{ URL::to("/driver-register/3") }}" id="registrationForm3" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Upload Driver's License</span>

                            <label for="imgfile" class="custom-file-upload">
                                <i class="far fa-file-image"></i>
                                <input multiple type="file" required name="pic[driver_license]">
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Upload commercial license</span>
                            <label for="imgfile" class="custom-file-upload">
                                <i class="far fa-file-image"></i>
                                <input type="file" required name="pic[car_insurance]" placeholder="no file selected">
								
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="spacer form-group col-md-6 ">
                            <span>Upload Passport</span>
                            <label for="imgfile" class="custom-file-upload">
                                <i class="far fa-file-image"></i>
                                <input type="file" required name="pic[passport]">
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Profile Picture</span>
                            <label for="imgfile" class="custom-file-upload">
                                <i class="far fa-file-image"></i>
                                <input type="file" required name="pic[profile]">
                            </label>
                        </div>


                        <div class="form-group col-md-6">
                            <span>Upload insurance documents</span>
                            <label for="imgfile" class="custom-file-upload">
                                <i class="far fa-file-image"></i>
                                <input multiple  type="file" required name="pic[insurance_pic][]">
                            </label>
                        </div>

                        <!-- <div class="form-group col-md-6">
                            <span>Insurance Expiration Date</span>
                                <input type="text" required id="insurace_exp_date" class="fonto" name="insurace_exp_date">
                        </div> -->

                    </div>
                    <div class="submit-row">
                        <div class="submit-button col-md-12">
                            <input type="submit" required name="submit" value="register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--container-->
</div>
@include('includes.footer')
<script>
    $(document).ready(function(){
        $("#registrationForm3").validate();

        $('#insurace_exp_date').datepicker();

    });
</script>