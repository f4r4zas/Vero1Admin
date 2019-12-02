@include("admin.header")
<div class="wrapper">
    @include("admin.menu")

<style type="text/css">
  
  .card > .header {
    margin: 10px 0px;
    border-bottom: 1px solid #efefef;
    background-color: #5774cc;
    color: #fff;
    padding: 10px 20px
}

h4.title {
    color: #fff !important;
}



.card-body > div {
    margin: 5px 0px;
}

h5.container-title {
    font-weight: 800;
    font-size: 16px;
    padding-left: 15px;
    border-bottom: 1px solid #efefef;
    margin-bottom: 10px;
    padding-bottom: 10px;
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

                  <div class="clearfix"></div>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users Details</h4>
                        </div>
                        <?php
                          $driverPersonalDetails = $data['driver'][0];
                        ?>
                        <div class="card-body">

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12 "> <b>Name</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->first_name.' '.$driverPersonalDetails->last_name; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Phone Number</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (empty($driverPersonalDetails->phone_number)) ? 'N/A' : $driverPersonalDetails->phone_number; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Mobile Number</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (empty($driverPersonalDetails->mmobile_number)) ? 'N/A' : $driverPersonalDetails->mmobile_number; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Address</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->street_address; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Email</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->email; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Online</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= ($driverPersonalDetails->is_online) ? 'Online' : 'Offline'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Verify User</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= ($driverPersonalDetails->is_verified) ? 'Online' : 'Offline'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Gender</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->gender; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>City</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->city; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>State</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->state; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Country</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->country; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>User Type</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= $driverPersonalDetails->user_type; ?>
                            </div>
                          </div>

                          <div class="clearfix"></div>

                        </div>

                    </div>
                </div>
            </div>

            <?php
              $driverPurchased = $data['driver_purchases'];

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
                          foreach($driverPurchased as $key=>$purchases)
                          {
                            if(!empty($purchases))
                            {
                                foreach($purchases as $key=>$rides)
                                {
                                  ?>
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <div class="binder panel-title">
                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                                <div class="col-xs-12 col-sm-4">
                                                    <label for="service_number_<?php echo $i; ?>">Service Number: </label>
                                                    <span id="service_number_<?php echo $i; ?>" class="text-capitalize">
                                                      <?php echo $rides->_id; ?>
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
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
                                            <div class="card-header">Item Purchased</div>
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
                                              <div class="card-header"><h4><?= $rides->drop_of_packages['delivery_type'] ?></h4></div>
                                              <div class="card-body">
                                                <?php
                                                foreach($rides->drop_of_packages['items'] as $key=>$deliveryItems)
                                                {
                                                  ?>
                                                  <div class="col-xs-12 col-sm-6">Item Image</div>
                                                  <div class="col-xs-12 col-sm-6">
                                                    <?php if(isset($deliveryItems['image_url']))
                                                    { ?>
                                                    <img src="<?= $deliveryItems['image_url'] ?>"
                                                    class="img-responsive" alt="<?= $rides->drop_of_packages['delivery_type'] ?>"/>
                                                  <?php } ?>
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
                                                <div class="card-header"><h4>Ride Fare</h4></div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Charged Fare</h5>
                                                    <div class="col-xs-12 col-sm-6">Purchase Amount</div>
                                                    <div class="col-xs-12 col-sm-6">
                                                    <?=  $rides->fear_break_down['purchase_amount'] ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">Service Charges Miles/Gallon</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->fear_break_down['service_charges_miles_per_gallon'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Service Charges Per Minutes</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->fear_break_down['service_charges_per_minutes'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Distance Covered</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->fear_break_down['distance_covered'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Time</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->fear_break_down['time'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Total Service Charges</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->fear_break_down['total_service_charges'] ?></div>
                                                    <hr />

                                                    <h5 class="card-title">Collected Fare</h5>
                                                    <div class="col-xs-12 col-sm-6">Transaction Number</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->stripe_charge['transaction_number'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Customer Transaction Number</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->stripe_charge['customer_transaction_number'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Paid</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->stripe_charge['paid'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Card Charged</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->stripe_charge['card_charged'] ?></div>
                                                    <div class="col-xs-12 col-sm-6">Amount Charged</div>
                                                    <div class="col-xs-12 col-sm-6"><?= $rides->stripe_charge['amount_charged'] ?></div>


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
                            }

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
