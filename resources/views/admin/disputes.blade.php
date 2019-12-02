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
                            <h4 class="title">Disputes</h4>
                        </div>
                        <div class="card-body">
                          <table class="table table-responsive table-stripe col-xs-12">
                            <thead>
                              <tr>
                                <th>Sr#</th>
                                <th>ID</th>
                                <th>Dispute Type</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if($data && !empty($data) && count($data) > 0)
                                  {
                                    $i = 1;
                                    foreach($data as $key=>$details)
                                    {
                                      ?>
                                      <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$details->_id}}</td>
                                        <td>{{$details->dispute_type}}</td>
                                        <td>{{str_replace("_", " ", $details->service_type)}}</td>
                                        <td>{{$details->status}}</td>
                                        <td>
                                          <a href="{{ URL::to("admin/dispute-details/")."/".$details->_id }}"
                                            class="btn btn-xs btn-primary">
                                              Details
                                            </a>
                                        </td>
                                      </tr>
                                      <?php
                                      $i++;
                                    }
                                  }
                                  else
                                  {
                                    ?>
                                    <tr><td colspan="5"><div class="col-xs-12">
                                      <center>
                                        <p>No Record Found</p>
                                      </center></div></td></tr>
                                    <?php
                                  }
                                ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@include("admin.footer")
