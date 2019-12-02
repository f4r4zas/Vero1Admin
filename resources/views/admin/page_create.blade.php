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
                                
                            </div>
                            

                                  @if($trac == "update")
                                    <form action="{{ route("update-page") }}" method="post" class="form-horizontal">
                                  @else  
                                    <form action="{{ route("insert-page") }}" method="post" class="form-horizontal">
                                  @endif

                             {{ csrf_field() }}

                          <div class="form-group">
                            <label for="page_title" class="control-label col-xs-4">Page Title</label> 
                            <div class="col-xs-8">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-address-card"></i>
                                </div> 

                                  @if($trac == "update")
                                    
                                    <input id="page_title" name="page_title" value="{{ $data->page_title }}" type="text" class="form-control" required="required">


                                 @else  

                                    <input id="page_title" name="page_title" value="{{ old("page_title") }}" type="text" class="form-control" required="required">                                    

                                  @endif
                                
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="page_short_desc" class="control-label col-xs-4">Short Description</label> 
                            <div class="col-xs-8">

                                  @if($trac == "update")
                                    
                               <textarea id="page_short_desc" name="page_short_desc"  cols="40" rows="5" required="required" class="form-control">{{ $data->page_short_desc }}</textarea>

                                   @else  

                              <textarea id="page_short_desc" name="page_short_desc"  cols="40" rows="5" required="required" class="form-control">{{ old("page_short_desc") }}</textarea>                                    

                                  @endif

                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="textarea1" class="control-label col-xs-4">Description</label> 
                            <div class="col-xs-8">


                                  @if($trac == "update")
                                    
                                    <textarea id="page_description"  name="page_description"  cols="40" rows="20" class="form-control">{{ $data->page_description }}</textarea>


                                   @else  

                              <textarea id="page_description"  name="page_description"  cols="40" rows="20" class="form-control">{{ old("page_description") }}</textarea>                                    

                                  @endif

                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="status" class="control-label col-xs-4">Status</label> 
                            <div class="col-xs-8">

                                      @if($trac == "update")

                                   <select id="status" name="status" class="select form-control" required="required">
                                <option value="1" <?php if($data->status) { echo "selected"; }  ?> >Enable</option>
                                <option value="0" <?php  if(!$data->status) { echo "selected"; }  ?> >Disable</option>
                              </select>


                                   @else    

                              <select id="status" name="status" class="select form-control" required="required">
                                <option value="1" <?php if(old("status")) { echo "selected"; }  ?> >Enable</option>
                                <option value="0" <?php  if(!old("status")) { echo "selected"; }  ?> >Disable</option>
                              </select>

                                  @endif


                              
                            </div>
                          </div> 
                          <div class="form-group row">
                            <div class="col-xs-offset-4 col-xs-8">
                              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>

                           @if($trac == "update")
                        <input type="hidden" name="page_slug" value="{{ $data->page_slug  }}">
                          @endif
                        </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

       
    @include("admin.footer")
    <script type="text/javascript">
    
CKEDITOR.replace( 'page_description' );
    
    CKEDITOR.config.allowedContent = true
    </script>       