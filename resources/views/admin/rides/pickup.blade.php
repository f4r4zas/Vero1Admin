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
                <?php
              $driverPurchased = $purchases;

              if(count($driverPurchased) > 0)
              {
            ?>

            <div class="row">

              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Ride Details</h4>
                      </div>
                      <div class="card-body">
                        <div class="panel-group" id="accordion">
                        <?php
                        $i = 0;
                          foreach($driverPurchased as $key=>$rides)
                          {
                                  ?>
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <div class="binder panel-title">
                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                                <div class="col-xs-12 col-sm-5">
                                                    <label for="service_number_<?php echo $i; ?>">Service Number: </label>
                                                    <span id="service_number_<?php echo $i; ?>" class="text-capitalize">
                                                      <?php echo $rides->_id; ?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <label for="service_viewer_<?php echo $i; ?>">Service Type: </label>
                                                    <span id="service_viewer_<?php echo $i; ?>" class="text-capitalize">
                                                      <?php echo str_replace("_", " ", $rides->service_type); ?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <label for="service_status_<?php echo $i; ?>">Service Status: </label>
                                                    <span id="service_status_<?php echo $i; ?>">
                                                      <?php echo $rides->status; ?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                  <label for="service_number_<?php echo $i; ?>">Ride Date: </label>
                                                    <span id="service_number_<?php echo $i; ?>" class="text-capitalize">
                                                      <?php 

                                                      if(isset($rides->created_at))
                                                      {
                                                          if(strtotime($rides->created_at))
                                                          {
                                                              echo date('D, d, M, Y h:i A', strtotime($rides->created_at));    
                                                          }
                                                          else
                                                          {
                                                              $dateTime = $rides->created_at->toDateTime()->format('D, d, M, Y h:i A');

                                                              echo $dateTime;       
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          echo 'N/A';
                                                      }
                                                      ?>
                                                    </span>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                            </a>
                                          </div>
                                        </div>

                                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                                          <?php
                                            if(!empty($rides->item_purchases['items']))
                                            {
                                          ?>
                                          <div class="card">
                                            <div class="header">Item Purchased</div>
                                            <div class="card-body">

                                            </div>
                                          </div>
                                          <?php
                                            }
                                            ?>

                                            <?php
                                              if(!empty($rides->drop_of_packages['items']))
                                              {
                                            ?>
                                            <div class="card">
                                              <div class="header"><h4 class="title"><?= $rides->drop_of_packages['delivery_type'] ?></h4></div>
                                              <div class="card-body">
                                                <?php
                                                foreach($rides->drop_of_packages['items'] as $key=>$deliveryItems)
                                                {
                                                  ?>
                                                  <div class="col-xs-12 col-sm-6">Item Image</div>
                                                  <div class="col-xs-12 col-sm-6">
                                                    <img src="<?= isset($deliveryItems['image_url']) ? $deliveryItems['image_url'] : URL::to("//images/order-works.png") ?>"
                                                    class="img-responsive img-thumbnail" alt="<?= $rides->drop_of_packages['delivery_type'] ?>"
                                                    onerror="this.src='{{ URL::to("/") }}/images/order-works.png'"
                                                    /> &nbsp;
                                                  
                                                  </div>
                                                  <div class="col-xs-12 col-sm-6">Package Type</div>
                                                  <?php if(isset($deliveryItems['package_type'])) { ?>
                                                  <div class="col-xs-12 col-sm-6"><?= $deliveryItems['package_type'] ?></div>
                                                  <?php } ?>
                                                  <?php if(isset($deliveryItems['item_type'])) { ?>
                                                  <div class="col-xs-12 col-sm-6">Item Type</div>
                                                  <div class="col-xs-12 col-sm-6"><?= $deliveryItems['item_type'] ?></div>
                                                  <?php } ?>
                                                  <?php if(isset($deliveryItems['item_weight'])) { ?>
                                                  <div class="col-xs-12 col-sm-6">Item Weigth</div>
                                                  <div class="col-xs-12 col-sm-6"><?= $deliveryItems['item_weight'] ?></div>
                                                  <?php } ?>
                                                  <?php if(isset($deliveryItems['fragile'])) { ?>
                                                  <div class="col-xs-12 col-sm-6">Fragile Item</div>
                                                  <div class="col-xs-12 col-sm-6"><?= $deliveryItems['fragile'] ?></div>
                                                  <?php } ?>
                                                  <?php if(isset($deliveryItems['size'])) { ?>
                                                  <div class="col-xs-12 col-sm-6">Item Size</div>
                                                  <div class="col-xs-12 col-sm-6"><?= $deliveryItems['size'] ?></div>
                                                  <?php } ?>
                                                  <?php
                                                }
                                                ?>
                                                <hr />
                                                <div class="clearfix"></div>
                                              </div>
                                            </div>
                                            <?php
                                              }
                                              ?>

                                              <?php
                                                if(!empty($rides->fear_break_down))
                                                {
                                              ?>
                                              <div class="card">
                                                <div class="header"> <h4 class="title">Ride Fare</h4></div>
                                                <div class="card-body">
                                                  <div class="col-xs-12">
                                                    <h5 class="container-title">Charged Fare</h5>
                                                    <div class="col-xs-12 col-sm-6">Purchase Amount</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                    <?=  (!empty($rides->fear_break_down['purchase_amount'])) ? 
                                                        $rides->fear_break_down['purchase_amount'] : 'N/A';
                                                     ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">Service Charges Miles/Gallon</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= 
                                                        (!empty($rides->fear_break_down['service_charges_miles_per_gallon'] )) ? 
                                                        $rides->fear_break_down['service_charges_miles_per_gallon']  : 'N/A';
                                                      ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Service Charges Per Minutes</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= 
                                                      (!empty($rides->fear_break_down['service_charges_per_minutes'])) ? 
                                                      $rides->fear_break_down['service_charges_per_minutes'] : 'N/A' ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Distance Covered</div>
                                                    <div class="col-xs-12 col-sm-6"><?= 
                                                    (!empty($rides->fear_break_down['distance_covered'])) ? 
                                                      $rides->fear_break_down['distance_covered'] : 'N/A' 
                                                      ?>
                                                      </div>

                                                    <div class="col-xs-12 col-sm-6">Time</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= 
                                                      (!empty($rides->fear_break_down['time'])) ? $rides->fear_break_down['time'] : 'N/A' ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Total Service Charges</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= 
                                                      (!empty($rides->fear_break_down['total_service_charges'])) ? $rides->fear_break_down['total_service_charges'] : 'N/A'
                                                      ?></div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                    <h5 class="container-title">Collected Fare</h5>
                                                    <div class="col-xs-12 col-sm-6">Transaction Number</div>
                                                    <div class="col-xs-12 col-sm-6"><?= 
                                                    (!empty($rides->stripe_charge['transaction_number'])) ? $rides->stripe_charge['transaction_number'] : 'N/A' ?></div>

                                                    <div class="col-xs-12 col-sm-6">Customer Transaction Number</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= (!empty($rides->stripe_charge['customer_transaction_number'])) ? $rides->stripe_charge['customer_transaction_number'] : 'N/A' ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Paid</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= (!empty($rides->stripe_charge['paid'])) ? $rides->stripe_charge['paid'] : 'N/A' ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Card Charged</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= (!empty($rides->stripe_charge['card_charged'])) ? $rides->stripe_charge['card_charged'] : 'N/A' ?>
                                                        
                                                      </div>
                                                    <div class="col-xs-12 col-sm-6">Amount Charged</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <?= (!empty($rides->stripe_charge['amount_charged'])) ? $rides->stripe_charge['amount_charged'] : 'N/A' ?>
                                                        
                                                      </div>
                                                      </div>


                                                  <div class="clearfix"></div>
                                                </div>
                                              </div>
                                              <?php
                                                }
                                                ?>

                                        </div>
                                      </div>

                                  <?php
                                  $i++;
                          }
                        ?>
                        </div>
                        <div class="clearfix"></div>

                      </div>

                  </div>
              </div>

            </div>

          <?php } ?>
            </div>
        </div>

    @include("admin.footer")
