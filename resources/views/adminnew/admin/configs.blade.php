@extends('adminnew.layouts.master_layout')

@section('content')
  
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
        @include('adminnew.partials.sidebar')
		<!-- /main sidebar -->  

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Vero1 Dashboard </h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Driver</a>
							<span class="breadcrumb-item active">Settings</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

                        @if (\Session::has('success'))                        
                            <div class="alert alert-success" role="alert">
                                Configurations successfully Updated!
                            </div>
                        @endif  

						<!-- Driver Password  -->
						<div class="card" style="zoom: 1;">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Settings</h6>
								<div class="header-elements">
									<!-- <div class="list-icons">
										<a class="list-icons-item" data-action="collapse"></a>
										<a class="list-icons-item" data-action="remove"></a>
									</div> -->
								</div>
                            </div>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif                            

							<div class="card-body pb-0" style="">

                          <?php
                            /*echo "<pre>";
                            print_r($data);
                            echo "</pre>";*/

                            $percentGallon  =
                            $percentMinutes =
                            $costPerGallon  =
                            $bronzeDriver   =
                            $bronzeAdmin    =
                            $silverDriver   =
                            $silverAdmin    =
                            $goldDriver     =
                            $goldAdmin      = null;

                            if($data && count($data) > 0)
                            {
                              $percentGallon = (isset($data[0]->percent_cost_gallon) && !empty($data[0]->percent_cost_gallon)) ? $data[0]->percent_cost_gallon : null;
                              $percentMinutes = (isset($data[0]->percent_cost_minutes) && !empty($data[0]->percent_cost_minutes)) ? $data[0]->percent_cost_minutes : null;
                              $costPerGallon = (isset($data[0]->cost_per_gallon) && !empty($data[0]->cost_per_gallon)) ? $data[0]->cost_per_gallon : null;

                              $bronzeDriver = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['bronze'], $data[0]->profit_percent['bronze']['driver']
                                                  )
                                                && !empty($data[0]->profit_percent['bronze']['driver'])
                                                ) ? $data[0]->profit_percent['bronze']['driver'] : null;
                              $bronzeAdmin  = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['silver'], $data[0]->profit_percent['bronze']['admin']
                                                  )
                                                && !empty($data[0]->profit_percent['bronze']['admin'])
                                                ) ? $data[0]->profit_percent['bronze']['admin'] : null;

                              $silverDriver = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['silver'], $data[0]->profit_percent['silver']['driver']
                                                  )
                                                && !empty($data[0]->profit_percent['silver']['driver'])
                                                ) ? $data[0]->profit_percent['silver']['driver'] : null;
                              $silverAdmin = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['silver'], $data[0]->profit_percent['silver']['admin']
                                                  )
                                                && !empty($data[0]->profit_percent['silver']['admin'])
                                                ) ? $data[0]->profit_percent['silver']['admin'] : null;

                              $goldDriver     = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['gold'], $data[0]->profit_percent['gold']['driver']
                                                  )
                                                && !empty($data[0]->profit_percent['gold']['driver'])
                                                ) ? $data[0]->profit_percent['gold']['driver'] : null;
                              $goldAdmin      = (
                                                isset(
                                                  $data[0]->profit_percent, $data[0]->profit_percent['gold'], $data[0]->profit_percent['gold']['admin']
                                                  )
                                                && !empty($data[0]->profit_percent['gold']['admin'])
                                                ) ? $data[0]->profit_percent['gold']['admin'] : null;
                            }

                            function convertDecimalToPercent($string){
                                return round((float)$string * 100 );
                            }                              
                          ?>                            
								<div class="row">
									<div class="col-xl-12">
										<!--<div class="media flex-column flex-sm-row mt-0 mb-3">
											<div class="mr-sm-3 mb-2 mb-sm-0">
												<div class="card-img-actions">
													<a href="#">
														<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
														<span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
													</a>
												</div>
											</div>

											<div class="media-body">
												<h6 class="media-title"><a href="#">Up unpacked friendly</a></h6>
												<ul class="list-inline list-inline-dotted text-muted mb-2">
													<li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>
												</ul>
												The him father parish looked has sooner. Attachment frequently terminated son hello...
											</div>
										</div>

										<div class="media flex-column flex-sm-row mt-0 mb-3">
											<div class="mr-sm-3 mb-2 mb-sm-0">
												<div class="card-img-actions">
													<a href="#">
														<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid img-preview rounded" alt="">
														<span class="card-img-actions-overlay card-img"><i class="icon-play3 icon-2x"></i></span>
													</a>
												</div>
											</div>

											<div class="media-body">
												<h6 class="media-title"><a href="#">It allowance prevailed</a></h6>
												<ul class="list-inline list-inline-dotted text-muted mb-2">
													<li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>
												</ul>
												Alteration literature to or an sympathize mr imprudence. Of is ferrars subject enjoyed...
											</div>
										</div> -->
									</div>

                                        <div class="col-xl-12">

                                        
                                            <!-- <form id="form-change-password" role="form" method="POST" action="{{route('driver-changepassword')}}" novalidate="" class="form-horizontal">                                                
                                                <input type="hidden" name="_token" value={{Session::token()}} />
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">Current Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" type="password" name="current_password">
                                                    </div>
                                                </div>      
                                                
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">New Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" type="password" name="password">
                                                    </div>
                                                </div> 
                                                
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">Re-enter New Password</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" type="password" name="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="text-right">
								                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
							                    </div>                                                
                                            </form> -->
                                            {{Form::open(array('url'=>'admin/configs'))}}
                                                <div class="form-group">
                                                <label for="percent_gallon" class="col-lg-12 control-label">
                                                    Cost / Gallon ( in dollars )
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="percent_gallon" class="form-control"
                                                    name="percent_cost_gallon"
                                                    tabindex="1"
                                                    step="0.1" max="100" min="0" value="{{(!empty($percentGallon)) ? $percentGallon : 0}}" required />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label for="percent_cost" class="col-lg-12 control-label">
                                                    Cost / Minute ( in dollars )
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="percent_cost" class="form-control"
                                                    name="percent_cost_minutes"
                                                    tabindex="2"
                                                    step="0.1" max="100" min="0" value="{{(!empty($percentMinutes)) ? $percentMinutes : 0}}" required />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label for="percent_gallon" class="col-lg-12 control-label">
                                                    Per Gallon  ( in dollars )
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="percent_gallon" class="form-control"
                                                    name="percent_per_gallon"
                                                    tabindex="3"
                                                    step="0.1" max="100" min="0" value="{{(!empty($costPerGallon)) ? $costPerGallon : 0}}" required />
                                                </div>
                                                </div>

                                                <hr />

                                                <div class="col-xs-12">
                                                <h4>Bronze</h4>
                                                </div>

                                                <div class="form-group">
                                                <label for="driver_percent_bronze" class="col-lg-12 control-label">
                                                    Driver Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="driver_percent_bronze" class="form-control"
                                                    name="profit_percent_bronze_driver"
                                                    tabindex="4"
                                                     value="{{(!empty($bronzeDriver)) ? convertDecimalToPercent($bronzeDriver) : 0}}" required />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label for="admin_percent_bronze" class="col-lg-12 control-label">
                                                    Admin Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="admin_percent_bronze" class="form-control"
                                                    name="profit_percent_bronze_admin"
                                                    tabindex="5"
                                                     value="{{(!empty($bronzeAdmin)) ? convertDecimalToPercent($bronzeAdmin) : 0}}" readonly required />
                                                </div>
                                                </div>

                                                <hr />

                                                <div class="col-xs-12">
                                                <h5>Silver</h5>
                                                </div>

                                                <div class="form-group">
                                                <label for="driver_percent_silver" class="col-lg-12 control-label">
                                                    Driver Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="driver_percent_silver" class="form-control"
                                                    name="profit_percent_silver_driver" min="0" pattern="[0-9]" max="100" step="1"
                                                    tabindex="6"                           
                                                     value="{{(!empty($silverDriver)) ? convertDecimalToPercent($silverDriver) : 0}}" required />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label for="admin_percent_silver" class="col-lg-12 control-label">
                                                    Admin Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="admin_percent_silver" class="form-control"
                                                    name="profit_percent_silver_admin"
                                                    tabindex="7" 
                                                     value="{{(!empty($silverAdmin)) ? convertDecimalToPercent($silverAdmin) : 0}}" readonly required />
                                                </div>
                                                </div>

                                                <hr />

                                                <div class="col-xs-12">
                                                <h5>Gold</h5>
                                                </div>

                                                <div class="form-group">
                                                <label for="driver_percent_gold" class="col-lg-12 control-label">
                                                    Driver Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="driver_percent_gold" class="form-control"
                                                    name="profit_percent_gold_driver"
                                                    tabindex="6"
                                                     value="{{(!empty($goldDriver)) ? convertDecimalToPercent($goldDriver) : 0}}" required />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label for="admin_percent_gold" class="col-lg-12 control-label">
                                                    Admin Percent
                                                </label>
                                                <div class="col-lg-12">
                                                    <input type="number" id="admin_percent_gold" class="form-control"
                                                    name="profit_percent_gold_admin"
                                                    tabindex="7"
                                                     value="{{(!empty($goldAdmin)) ? convertDecimalToPercent($goldAdmin) : 0}}"
                                                    required
                                                    readonly
                                                    />
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <center>
                                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                                </center>
                                                </div>
                                            {{Form::close()}}                                            
									    </div>
								</div>
							</div>
						</div>
						<!-- /Driver Password -->
					</div>
				</div>
				<!-- /main charts -->



			</div>
			<!-- /content area -->

            @include('adminnew.partials.footbar')

		</div>
		<!-- /main content -->

	</div>
    <!-- /page content -->
    
    <script type="text/javascript">
      $("#driver_percent_gold").change(function(){
            changeVals('#driver_percent_gold', '#admin_percent_gold');
      });

      $("#driver_percent_gold").keyup(function(){
            changeVals('#driver_percent_gold', '#admin_percent_gold');
      });

      $("#driver_percent_silver").change(function(){
            changeVals('#driver_percent_silver', '#admin_percent_silver');
      });

      $("#driver_percent_silver").keyup(function(){
            changeVals('#driver_percent_silver', '#admin_percent_silver');
      });

      $("#driver_percent_bronze").change(function(){
            changeVals('#driver_percent_bronze', '#admin_percent_bronze');
      });

      $("#driver_percent_bronze").keyup(function(){
            changeVals('#driver_percent_bronze', '#admin_percent_bronze');
      });

      function changeVals(changeVal, afftedVal)
      {
        //Convert driver input to Decimal from Percent..
        var convertedToDecimalChangeVal = convertPercentToDecimal( $(changeVal).val() );
        //Convert admin input to Decimal        
        var convertedToDecimalafftedVal = convertPercentToDecimal( $(afftedVal).val() );

        var driverVal = convertedToDecimalChangeVal;//parseFloat(convertedToDecimalChangeVal).toFixed(2);

        if(driverVal > 1)
        {
            $(changeVal).val('');
        }
        else
        {
            var adminVal = parseFloat(1 - driverVal).toFixed(1);

            //Convert adminval from Decimal to Percent..
            adminVal     = convertDecimalToPercent(adminVal);
            console.log(adminVal);

            $(afftedVal).val(adminVal);
        }
      }

      //Convert Percent to Decimal
      function convertPercentToDecimal(value){
          return parseFloat(value) / 100.0;
      }

      //Convert Decimal to Percent
      function convertDecimalToPercent(value){
        return ((value) * 100);
      }

    </script>

@endsection