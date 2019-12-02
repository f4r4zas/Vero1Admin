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
                                <h4 class="title">Users</h4>
                                <p class="category">Showing all the users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped"
                                data-paging="true" data-filtering="false" data-sorting="true" data-editing="false" data-state="true">
                                    <thead>
                                        <th>Sr#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th data-breakpoints="xs sm">User type</th>
                                        <th data-breakpoints="xs" >Updated Date</th>
                                        <th data-breakpoints="all" >Gender</th>
                                        <th data-breakpoints="all" >Street Address</th>
                                        <th data-breakpoints="all" >City</th>
                                        <th data-breakpoints="all" >State</th>
                                        <th data-breakpoints="all" >Country</th>
                                        <th data-breakpoints="all" >Zip</th>
                                        <th data-breakpoints="xs sm" >User Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>

                                <?php 
                                    $count = 1;
                                 foreach($users as $usersData){

                                    ?>

                                        <tr>
                                            <td><?php echo $count; ?> </td>
                                            <td><?php echo $usersData->first_name." ".$usersData->last_name; ?> </td>
                                            <td><?php echo $usersData->email; ?> </td>
                                            <td><?php if(!empty($usersData->user_type)){ echo $usersData->user_type; } ?></td>
                                            <td><?php 
                                                if(isset($usersData->updated_at))
                                                {
                                                    if(strtotime($usersData->updated_at))
                                                    {
                                                        echo date('D, d, M, Y h:i A', strtotime($usersData->updated_at));    
                                                    }
                                                    else
                                                    {
                                                        $dateTime = $usersData->updated_at->toDateTime()->format('D, d, M, Y h:i A');

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
                                                <?php 
                                                echo (isset($usersData->gender) && !empty($usersData->gender)) ? $usersData->gender : 'N/A' 
                                                ?>
                                                    
                                            </td>

                                            <td>
                                                <?php echo (isset($usersData->street_address) && !empty($usersData->street_address)) ? $usersData->street_address : 'N/A' ?>
                                                    
                                            </td>
                                            
                                            <td>
                                                <?php echo (isset($usersData->city) && !empty($usersData->city)) ? $usersData->city : 'N/A' ?>
                                                    
                                            </td>
                                            
                                            <td>
                                            <?php 
                                            echo (isset($usersData->state) && !empty($usersData->state)) ? $usersData->state : 'N/A' ?>
                                            </td>

                                            <td><?php 
                                            echo (isset($usersData->country) && !empty($usersData->country)) ? $usersData->country : 'N/A' ?>
                                                
                                            </td>

                                            <td>
                                                <?php echo (isset($usersData->zip) && !empty($usersData->zip)) ? $usersData->zip : 'N/A' ?>
                                                    
                                            </td>

                                            <td>

                                                <?php  
                                                    if(isset($usersData->verified_by_admin))
                                                    {
                                                        switch ($usersData->verified_by_admin) 
                                                        {
                                                            case '0':
                                                                    echo 'Blocked';
                                                                break;

                                                            case '1':
                                                                    echo 'Approved';
                                                                break;
                                                            
                                                            case '2':
                                                                    echo 'Pending';
                                                                break;
                                                            
                                                            default:
                                                                    echo 'N/A';
                                                                break;
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo 'N/A';
                                                    }
                                             ?>
                                                
                                            </td>

                                            <td>
                                                @if(isset($type) && $type == 'driver')
                                                <a class="btn btn-primary"
                                               href="{{ url( "/admin/driver-details", base64_encode($usersData->_id) ) }}">
                                                View Details
                                              </a>
                                                @else
                                              <a class="btn btn-primary"
                                               href="{{ url( "/admin/details", base64_encode($usersData->_id) ) }}">
                                                View Details
                                              </a>
                                              @endif
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


    @include("admin.footer")
