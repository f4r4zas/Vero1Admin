    @include("admin.header")
<div class="wrapper">
        @include("admin.menu")

<style type="text/css">
	.bootstrap-datetimepicker-widget
	{
		display: block;
		z-index: 9999;
		opacity: 1 !important;
	    visibility: visible;
	}
</style>


    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    	<?php 

                    		if(is_array($messages) && array_key_exists('success', $messages))
                    		{
                    			?>
                    			<p class="text-success">{{$messages['success']}}</p>
                                <script type="text/javascript">
                                    setTimeout(function(){
                                        window.location.href = '{{ url( "/admin/promo-codes" ) }}';
                                    }, 2000);
                                </script>
                    			<?php
                    		}
                    		elseif(is_array($messages) && count($messages) > 0 && $messages !== null)
                    		{
                    			foreach($messages as $key => $value)
                    			{
                    				echo "<p class='text-danger'>".$value."</p>";
                    			}
                    		} 

                            if(count($promo) > 0)
                            {
                                $promo = $promo[0];

                    	?>
                        
                    	{{Form::open(array('url'=>'admin/edit-promo/'.base64_encode($promo->_id)))}}
                            <div class="form-group">
                              <label for="promotion_code" class="col-lg-12 control-label">
                                Promotion Code
                              </label>
                              <div class="col-lg-12">
                                <input type="text" id="promotion_code" class="form-control"
                                name="promo_code"
                                tabindex="1"
                                value="<?= (isset($promo->promo_code)) ? $promo->promo_code : '' ?>" required placeholder="Please Enter Promo Code" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="discount_type" class="col-lg-12 control-label">
                                Discount Type
                              </label>
                              <div class="col-lg-12">
                                <select class="form-control" tabindex="2" id="discount_type" name="discount_type" required>
                                	<option value="" 
                                    <?= (isset($promo->discount_type) && $promo->discount_type == '') ? 'selected="selected"' : '' ?> disabled="true">
                                        Please Select Discount Type
                                    </option>
                                	<option value="percent" <?= (isset($promo->discount_type) && $promo->discount_type == 'percent') ? 'selected="selected"' : '' ?>>
                                    Percentage
                                    </option>
                                	<option value="flat" <?= (isset($promo->discount_type) && $promo->discount_type == 'flat') ? 'selected="selected"' : '' ?>>
                                    Flat
                                    </option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="promo_discount" class="col-lg-12 control-label">
                                Promotion Discount
                              </label>
                              <div class="col-lg-12">
                                <input type="number" id="promo_discount" class="form-control"
                                name="promo_discount"
                                tabindex="3"
                                step="1" min="1" value="<?= (isset($promo->promo_discount)) ? $promo->promo_discount : '' ?>" required placeholder="Please Enter Promo Discount" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="promo_on_rides" class="col-lg-12 control-label">
                                Promotion On Rides
                              </label>
                              <div class="col-lg-12">
                                <input type="number" id="promo_on_rides" class="form-control"
                                name="promo_on_rides"
                                tabindex="3"
                                step="1" min="0" value="<?= (isset($promo->promo_on_rides)) ? $promo->promo_on_rides : '' ?>" required placeholder="Please Enter Promotion on Rides" />
                              </div>
                            </div>

					        <div class='form-group'>
					        	<label class="col-lg-12 control-label" for="datetimepicker1">Select Promotion Start Date</label>
					            <div class="col-lg-12">
					                <div class='input-group date' id='datetimepicker1'>
					                    <input tabindex="4" type='text' class="form-control" name="promo_start_date" placeholder="Please Enter Promo Start Date"  required />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>

					        <div class='form-group'>
					        	<label class="col-lg-12 control-label" for="datetimepicker2">Select Promotion End Date</label>
					            <div class="col-lg-12">
					                <div class='input-group date' id='datetimepicker2'>
					                    <input tabindex="5" type='text' class="form-control" name="promo_end_date" placeholder="Please Enter Promo End Date"  required />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
					            </div>
					        </div>
					    	

                            <div class="form-group">
                              <center>
                                <button tabindex="6" type="submit" name="submit" class="btn btn-success">Update</button>
                              </center>
                            </div>
                          {{Form::close()}}

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        	jQuery(document).ready(function($){

        		$("#discount_type").change(function(){

        			var discountSelected = $(this).val();

        			if(discountSelected == 'percent')
        			{
        				$('#promo_discount').attr('max', '100');
        			}
        			else
        			{
        				$('#promo_discount').attr('max', '1000');
        			}

        		});

        	});
        </script>
    @include("admin.footer")
