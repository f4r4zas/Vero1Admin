@include("admin.header")
<div class="wrapper">
    @include("admin.menu")
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
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Settings</h4>
                        </div>
                        <div class="card-body">
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

                          ?>

                          {{Form::open(array('url'=>'admin/configs'))}}
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                Percent Cost / Gallon
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
                                Percent Cost / Minute
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
                                Percent / Gallon
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
                                step="0.1" max="1" min="0" value="{{(!empty($bronzeDriver)) ? $bronzeDriver : 0}}" required />
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
                                step="0.1" max="1" min="0" value="{{(!empty($bronzeAdmin)) ? $bronzeAdmin : 0}}" disabled required />
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
                                name="profit_percent_silver_driver"
                                tabindex="6"
                                step="0.1" max="1" min="0" value="{{(!empty($silverDriver)) ? $silverDriver : 0}}" required />
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
                                step="0.1" max="1" min="0" value="{{(!empty($silverAdmin)) ? $silverAdmin : 0}}" disabled required />
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
                                step="0.1" max="1" min="0" value="{{(!empty($goldDriver)) ? $goldDriver : 0}}" required />
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
                                step="0.1" max="1" min="0" value="{{(!empty($goldAdmin)) ? $goldAdmin : 0}}"
                                required
                                disabled
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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
        var driverVal = parseFloat($(changeVal).val()).toFixed(2);

        if(driverVal > 1)
        {
            $(changeVal).val('');
        }
        else
        {
            var adminVal = parseFloat(1 - driverVal).toFixed(1);

            console.log(adminVal);

            $(afftedVal).val(adminVal);
        }
      }
    </script>


@include("admin.footer")
