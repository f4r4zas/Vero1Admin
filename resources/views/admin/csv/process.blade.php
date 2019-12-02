
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
                    <a class="navbar-brand" href="#">Csv</a>
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
                <div class="card">
                        <div class="header">
                            <h4 class="title">Process File</h4>
                        </div>
                        <div class="card-body">
                          
                            <?php $url = 'admin/process-csv?q='.$_GET['q'];  ?>
                            
                            {{Form::open(array('url'=>$url))}}
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                File
                              </label>
                              <div class="col-lg-12">
                                <input type="text" id="file" class="form-control"
                                       name="csv_file" disabled="true" value="<?= $_GET['q'] ?>" />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                Start From
                              </label>
                              <div class="col-lg-12">
                                <input type="number" id="start_from" class="form-control"
                                name="start_from"
                                tabindex="2"
                                step="1" min="1" 
                                required
                                />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                End Record
                              </label>
                              <div class="col-lg-12">
                                <input type="number" id="start_to" class="form-control"
                                name="start_to"
                                tabindex="3"
                                step="1" min="1" 
                                required
                                />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                Store Name
                              </label>
                              <div class="col-lg-12">
                                <input type="text" id="store" class="form-control"
                                name="store"
                                tabindex="4"
                                required
                                />
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="percent_gallon" class="col-lg-12 control-label">
                                Category Name
                              </label>
                              <div class="col-lg-12">
                                <input type="text" id="category" class="form-control"
                                name="category"
                                tabindex="5"
                                required
                                />
                              </div>
                            </div>

                            <div class="form-group">
                              <center>
                                <button tabindex="6" type="submit" name="submit" class="btn btn-success">Submit</button>
                              </center>
                            </div>
                          {{Form::close()}}
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div>


@include("admin.footer")