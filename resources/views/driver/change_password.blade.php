@include("admin.header")
<div class="wrapper">
    @include("admin.menu")

    <style type="text/css">
        ul.settingsRow {
            margin: 20px auto;
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
                            <p>Change Password</p>
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
                            <h4 class="title">Change Password</h4>
                        </div>
                        <div class="card-body">
                          
                            <div class="col-xs-12">
                                
                                <div class="row">
                                    
                                    <form id="form-change-password" role="form" 
                                          method="POST" 
                                          action="{{ url('/driver/change-password') }}" 
                                          novalidate 
                                          class="form-horizontal">
                                        
                                        <div class="col-md-9">             
                                          <label for="current_password" class="col-sm-4 control-label">Current Password</label>
                                          <div class="col-sm-8">
                                            <div class="form-group">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                              <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
                                                @if ($errors->has('current_password'))
                                                    <div class="error text-danger">{{ $errors->first('current_password') }}</div>
                                                @endif
                                            </div>
                                          </div>
                                          <label for="password" class="col-sm-4 control-label">New Password</label>
                                          <div class="col-sm-8">
                                            <div class="form-group">
                                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                @if ($errors->has('password'))
                                                    <div class="error text-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                          </div>
                                          <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
                                          <div class="col-sm-8">
                                            <div class="form-group">
                                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                                                @if ($errors->has('password_confirmation'))
                                                    <div class="error text-danger">{{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-5 col-sm-6">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                          </div>
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>    


@include("admin.footer")
