
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
                            <h4 class="title">CSV Files</h4>
                        </div>
                        <div class="card-body">
                            
                            <table class="table table-striped table-responsive table-lg">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>File Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                            <?php 
                                $files = scandir(base_path()."/csv", 1);
                                
                                $total_array = count($files) - 2;
                                
                                $counter = 1;
                                
                                foreach($files as $key=>$value) {
                                
                                    if($key < $total_array) {
                                    
                            ?>
                                    <tr>
                                        <td><?= $counter; ?></td>
                                        <td><?= explode(".", $value)['0']; ?></td>
                                        <td>
                                            <a href="{{ URL::to('/admin/process-csv/?q='.$value) }}" class="btn btn-primary btn-xs">
                                                Process
                                            </a>
                                        </td>
                                    </tr>
                            <?php 
                            $counter++;
                                    }
                                } 
                            ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div>


@include("admin.footer")