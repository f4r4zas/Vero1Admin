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
						<!-- Driver Password  -->
						<div class="card  @if ($errors->any()) @else card-collapsed @endif" style="zoom: 1;">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Change Password</h6>
								<div class="header-elements">
									<div class="list-icons">
										<a class="list-icons-item" data-action="collapse"></a>
										<a class="list-icons-item" data-action="remove"></a>
									</div>
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
                                            <form id="form-change-password" role="form" method="POST" action="{{route('driver-changepassword')}}" novalidate="" class="form-horizontal">                                                
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
                                            </form>
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
@endsection