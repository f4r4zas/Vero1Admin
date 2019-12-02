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
                            <h4 class="title">Dispute Details</h4>
                        </div>
                        <div class="card-body">
                          <?php

                            if($data && count($data) > 0)
                            {
                              ?>
                              <table class="table table-responsive table-striped col-xs-12">
                                <tr>
                                  <th>ID</th>
                                  <td>{{$data[0]->_id}}</td>
                                </tr>
                                <tr>
                                  <th>Dispute Number</th>
                                  <td>{{$data[0]->dispute_number}}</td>
                                </tr>
                                <tr>
                                  <th>Service Type</th>
                                  <td>{{str_replace("_", " ", $data[0]->service_type)}}</td>
                                </tr>
                                <tr>
                                  <th>Status</th>
                                  <td>{{$data[0]->status}}</td>
                                </tr>
                                <tr>
                                  <th>Dispute Type</th>
                                  <td>{{$data[0]->dispute_type}}</td>
                                </tr>
                                <tr>
                                  <th>Details</th>
                                  <td>{{$data[0]->details}}</td>
                                </tr>
                              </table>
                              <?php
                            }
                          ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Order Details</h4>
                        </div>
                        <div class="card-body">
                          <?php

                            $orderDetails = $data[0]['order_details'];

                            if($orderDetails && count($orderDetails) > 0)
                            {
                              ?>
                              <table class="table table-responsive table-striped col-xs-12">
                                <tr>
                                  <th>Order ID</th>
                                  <td>{{$orderDetails[0]->_id}}</td>
                                </tr>
                                <tr>
                                  <th>Service Type</th>
                                  <td>{{str_replace("_", " ", $orderDetails[0]->service_type)}}</td>
                                </tr>
                                <tr>
                                  <th>Service Status</th>
                                  <td>{{str_replace("_", " ", $orderDetails[0]->status)}}</td>
                                </tr>
                                <tr>
                                  <th>Receipt Image</th>
                                  <td>
                                    <img class="img img-responsive"
                                    src="{{$orderDetails[0]->reciept_image}}" alt="Receipt Image" />
                                  </td>
                                </tr>
                              </table>
                              <?php
                            }
                          ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">User Details</h4>
                        </div>
                        <div class="card-body">
                          <?php

                            $userDetails = $data[0]['user_details'];

                            if($userDetails && count($userDetails) > 0)
                            {
                              ?>
                              <table class="table table-responsive table-striped col-xs-12">
                                <tr>
                                  <th>User ID</th>
                                  <td>{{$userDetails[0]->_id}}</td>
                                </tr>
                                <tr>
                                  <th>Name</th>
                                  <td>{{$userDetails[0]->first_name." ".$userDetails[0]->last_name}}</td>
                                </tr>
                                <tr>
                                  <th>Mobile Number</th>
                                  <td>{{$userDetails[0]->mmobile_number}}</td>
                                </tr>
                                <tr>
                                  <th>Phone Number</th>
                                  <td>{{$userDetails[0]->phone_number}}</td>
                                </tr>
                              </table>
                              <?php
                            }
                          ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@include("admin.footer")
