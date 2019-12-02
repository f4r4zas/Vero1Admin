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

                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="{{ url( "/admin/create-promo-codes" ) }}" class="btn btn-success pull-right">Create Promo Code</a>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="header">
                                <h4 class="title">Promo Codes</h4>
                                <p class="category">Showing all promo codes</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped"
                                data-paging="true" data-filtering="false" data-sorting="true" data-editing="false" data-state="true">
                                    <thead>
                                        <th>Sr#</th>
                                        <th>Promo Code</th>
                                        <th>Promo Discount</th>
                                        <th>Discount Type</th>
                                        <th data-breakpoints="xs sm">Promo Expire</th>
                                        <th data-breakpoints="xs sm" >Promo Start Date</th>
                                        <th data-breakpoints="xs sm" >Promo End Date</th>
                                        <th data-breakpoints="all" >Created Date</th>
                                        <th data-breakpoints="all" >Updated Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>

                                <?php 
                                    $count = 1;
                                 foreach($promoCodes as $promos){

                                    ?>

                                        <tr>
                                            <td><?php echo $count; ?> </td>
                                            <td><?php echo (isset($promos->promo_code)) ? $promos->promo_code : 'N/A'; ?> </td>
                                            <td><?php echo (isset($promos->promo_discount)) ? $promos->promo_discount : 'N/A'; ?> </td>
                                            <td><?php echo (isset($promos->discount_type)) ? $promos->discount_type : 'N/A'; ?></td>
                                            <td><?php if(isset($promos->is_expire)){
                                                if($promos->is_expire)
                                                {
                                                    echo "Expired";
                                                }
                                                else
                                                {
                                                    echo "Not Expire";
                                                }
                                            } ?></td>
                                            <td><?php 
                                                if(isset($promos->promo_start_date))
                                                {
                                                    if(strtotime($promos->promo_start_date))
                                                    {
                                                        echo date('D, d, M, Y h:i A', strtotime($promos->promo_start_date));    
                                                    }
                                                    else
                                                    {
                                                        $dateTime = $promos->promo_start_date->toDateTime()->format('D, d, M, Y h:i A');

                                                        echo $dateTime;       
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo 'N/A';
                                                }
                                            ?>
                                                
                                            </td>

                                             <td><?php 
                                                if(isset($promos->promo_end_date))
                                                {
                                                    if(strtotime($promos->promo_end_date))
                                                    {
                                                        echo date('D, d, M, Y h:i A', strtotime($promos->promo_end_date));    
                                                    }
                                                    else
                                                    {
                                                        $dateTime = $promos->promo_end_date->toDateTime()->format('D, d, M, Y h:i A');

                                                        echo $dateTime;       
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo 'N/A';
                                                }
                                            ?>
                                                
                                            </td>

                                            <td><?php 
                                                if(isset($promos->created_at))
                                                {
                                                    if(strtotime($promos->created_at))
                                                    {
                                                        echo date('D, d, M, Y h:i A', strtotime($promos->created_at));    
                                                    }
                                                    else
                                                    {
                                                        $dateTime = $promos->created_at->toDateTime()->format('D, d, M, Y h:i A');

                                                        echo $dateTime;       
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo 'N/A';
                                                }
                                            ?>
                                                
                                            </td>

                                            <td><?php 
                                                if(isset($promos->updated_at))
                                                {
                                                    if(strtotime($promos->updated_at))
                                                    {
                                                        echo date('D, d, M, Y h:i A', strtotime($promos->updated_at));    
                                                    }
                                                    else
                                                    {
                                                        $dateTime = $promos->updated_at->toDateTime()->format('D, d, M, Y h:i A');

                                                        echo $dateTime;       
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo 'N/A';
                                                }
                                            ?>
                                                
                                            </td>
                                            

                                            <td>
                                               
                                                <a class="btn btn-primary btn-sm"
                                               href="{{ url( "/admin/edit-promo", base64_encode($promos->_id) ) }}">
                                                Edit
                                              </a>

                                              <a class="btn btn-warning btn-sm"
                                               href="{{ url( "/admin/expire-promo", base64_encode($promos->_id) ) }}">
                                                Expire
                                              </a>

                                              <a class="btn btn-danger btn-sm"
                                               href="{{ url( "/admin/delete-promo", base64_encode($promos->_id) ) }}">
                                                Delete
                                              </a>

                                            </td>

                                        </tr>

                                <?php 
                                $count++;
                            } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>

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
