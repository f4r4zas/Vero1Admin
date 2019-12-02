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
                                <h4 class="title">Pages</h4>
                                <p class="category">Showing all the Pages</p>
                                <a href="{{ URL::to('admin/createPage') }}" class="btn btn-primary pull-right">Create Pages</a>
                            </div>
                            <div class="content table-responsive table-full-width">


                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Page Name</th>
                                        <th>Page Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                     
                                <?php  foreach($pages as $usersData){  ?>
                                        <tr>
                                            <td><?php echo $usersData->_id; ?> </td>
                                            <td><?php echo $usersData->page_title; ?> </td>
                                            <td><?php if(!empty($usersData->page_slug)){ echo $usersData->page_slug; } ?> </td>
                                            <td><?php if(!empty($usersData->status)){ if($usersData->status == 1){ echo "Enable"; }else{ echo "Disable"; } }else{ echo "Disable";  } ?></td>
                                            <td>
                                                   
                                            
                                            <form action="{{ route("edit-page") }}" method="post">
                                                    {{ csrf_field() }}
                                        <input type="hidden" name="page_slug" value="<?php echo $usersData->page_slug; ?>">
                                                    <input type="submit" name="" class="btn btn-primary" value="Edit">
                                            </form>
  
                                                <a href="<?php echo URL::to($usersData->page_slug); ?>" target="_blank
" class="btn btn-info">View</a>
                                                <p class="clearfix"></p>
                                            <form action="{{ route("remove-page") }}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="<?php echo $usersData->_id ?>">
                                                    <input type="submit" name="" class="btn btn-danger" value="Remove">
                                            </form>

                                                
                                             </td>
                                        </tr>
                                <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include("admin.footer")
