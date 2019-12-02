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
                  
                  {{ Form::open(array('url' => 'admin/driver-details/'.base64_encode($data['driver'][0]->_id))) }}

                    <input type="hidden" name="user_detail" value="{{ base64_encode($data['driver'][0]->_id) }}" />

                    @if(isset($data['driver'][0]->verified_by_admin) && $data['driver'][0]->verified_by_admin == 1)
                      <input type="hidden" name="user_status" value="0" />
                      <button type="submit" name="submit"
                            style="margin-bottom: 10px;"
                            class="btn btn-danger pull-right">
                            Block Driver
                      </button> 
                      
                    @else
                      <input type="hidden" name="user_status" value="1" />
                      <button type="submit" name="submit"
                            style="margin-bottom: 10px;"
                            class="btn btn-success pull-right">

                            Approve Driver
                      </button>  
                    @endif

                  {{ Form::close() }}

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
                                <?= (empty($driverPersonalDetails->mobile_number)) ? 'N/A' : $driverPersonalDetails->mobile_number; ?>
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
                            <div class="col-sm-6 col-xs-12"> <b>Admin Approval</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?php 
                                  if(isset($driverPersonalDetails->verified_by_admin)) 
                                  {

                                    switch ($driverPersonalDetails->verified_by_admin) 
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
                                <?= ($driverPersonalDetails->is_verified) ? 'Verified' : 'Not Verified'; ?>
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

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Education</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['hightLevelEducation'])) ? $driverPersonalDetails->additional_information['hightLevelEducation'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Interested Service</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['interestedService'])) ? $driverPersonalDetails->additional_information['interestedService'] : 'N/A'; ?>
                            </div>
                          </div>
                          
                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Professional License</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['professionalLicensed'])) ? $driverPersonalDetails->additional_information['professionalLicensed'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Bounded</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['bounded'])) ? $driverPersonalDetails->additional_information['bounded'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Insurance</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['insured'])) ? $driverPersonalDetails->additional_information['insured'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Professional Service Licensed</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['professionalServiceLicenses'])) ? $driverPersonalDetails->additional_information['professionalServiceLicenses'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Profession</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['profession'])) ? $driverPersonalDetails->additional_information['profession'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Auto Work US</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['autToWorkUS'])) ? $driverPersonalDetails->additional_information['autToWorkUS'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Auto Policy</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['autoPolicy'])) ? $driverPersonalDetails->additional_information['autoPolicy'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Damage Coverage</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['damageCover'])) ? $driverPersonalDetails->additional_information['damageCover'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Personal Coverage</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['personalCover'])) ? $driverPersonalDetails->additional_information['personalCover'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Ever Felony</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['everFelony'])) ? $driverPersonalDetails->additional_information['everFelony'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Conviction</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['conviction'])) ? $driverPersonalDetails->additional_information['conviction'] : 'N/A'; ?>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <div class="col-sm-6 col-xs-12"> <b>Details</b></div>
                            <div class="col-sm-6 col-xs-12">
                                <?= (isset($driverPersonalDetails->additional_information, $driverPersonalDetails->additional_information['provideDetailsThree'])) ? $driverPersonalDetails->additional_information['provideDetailsThree'] : 'N/A'; ?>
                            </div>
                          </div>


                          <div class="clearfix"></div>

                        </div>

                    </div>

                    <?php if(isset($driverPersonalDetails->vehicle))  { ?>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Vehicle Information</h4>
                        </div>
                        
                        <div class="card-body">

                          <table class="table table-striped table-responsive table-borderless table-condensed table-hover">
                            
                            <?php foreach($driverPersonalDetails->vehicle as $key=>$value): ?>

                              <tr>
                                <th><?= @ucfirst( preg_replace('/_/', ' ', $key) ); ?></th>
                                <td>{{$value}}</td>
                              </tr>

                            <?php endforeach; ?>

                          </table>

                          <div class="clearfix"></div>

                        </div>

                    </div>
                    
                    <?php  } ?>


                    <?php if(isset($driverPersonalDetails->pictures))  { ?>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Driver Documents</h4>
                        </div>
                        
                        <div class="card-body">

                          <table class="table table-striped table-responsive table-borderless table-condensed table-hover">
                            
                            <?php foreach($driverPersonalDetails->pictures as $key=>$value): ?>

                              <tr>
                                <th><?= @ucfirst( preg_replace('/_/', ' ', $key) ); ?></th>
                                <td>
                                  
                                  <?php

                                    if(is_array($value))
                                    {
                                      if(findFileExtension($value[0]) == 'png' || findFileExtension($value[0]) == 'jpg')
                                      {
                                        ?>
                                        <a href="{{URL::to('/uploads').'/'.$value[0]}}" target="_blank">
                                        <img src="{{URL::to('/uploads').'/'.$value[0]}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                        <?php
                                      }
                                      elseif(findFileExtension($value[0]) == 'doc')
                                      { ?>
                                        <a href="{{URL::to('/uploads').'/'.$value[0]}}" target="_blank">
                                        <img src="{{URL::to('/assets/img/doc.png')}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                      <?php
                                      }
                                      elseif(findFileExtension($value[0]) == 'pdf')
                                      {
                                        ?>
                                        <a href="{{URL::to('/uploads').'/'.$value[0]}}" target="_blank">
                                        <img src="{{URL::to('/assets/img/pdf.svg')}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                        <?php
                                      }
                                    }
                                    else
                                    {
                                      if(findFileExtension($value) == 'png' || findFileExtension($value) == 'jpg')
                                      {
                                        ?>
                                        <a href="{{URL::to('/uploads').'/'.$value}}" target="_blank">
                                        <img src="{{URL::to('/uploads').'/'.$value}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                        <?php
                                      }
                                      elseif(findFileExtension($value) == 'doc')
                                      { ?>
                                        <a href="{{URL::to('/uploads').'/'.$value}}" target="_blank">
                                        <img src="{{URL::to('/assets/img/doc.png')}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                      <?php
                                      }
                                      elseif(findFileExtension($value) == 'pdf')
                                      {
                                        ?>
                                        <a href="{{URL::to('/uploads').'/'.$value}}" target="_blank">
                                        <img src="{{URL::to('/assets/img/pdf.svg')}}" alt="{{$key}}" width="120px" class="img img-thumbnail" />
                                        </a>
                                        <?php
                                      }
                                    }

                                  ?>

                                </td>
                              </tr>

                            <?php endforeach; ?>

                          </table>

                          <div class="clearfix"></div>

                        </div>

                    </div>
                    
                    <?php  } ?>

                </div>
            </div>

            

        </div>
    </div>

<?php 

function findFileExtension($fileName)
{
  return @array_pop( explode(".", $fileName) );
}

?>

@include("admin.footer")