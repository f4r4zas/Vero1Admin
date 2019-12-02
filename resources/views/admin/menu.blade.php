  <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Vero1 Dashboard 
                </a>
            </div>

            <?php 
                if(isset(Auth::user()->user_type) && Auth::user()->user_type === 'driver')
                {
                 ?>
            <ul class="nav">
                <li @if(request()->path() == 'driver')
                    class="active"
                    @endif
                    >
                    <a href="{{ URL::to("/driver") }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
              <li @if(request()->path() == 'driver/configs')
                    class="active"
                    @endif>
                 <a href="{{ URL::to("driver/configs") }}">
                     <i class="ti-user"></i>
                     <p>Settings</p>
                 </a>
             </li>
             
            </ul>
            <?php
                }
                else
                {
            ?>
            
            <ul class="nav">
                <li @if(request()->path() == 'admin')
                    class="active"
                    @endif
                    >
                    <a href="{{ URL::to("/admin") }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li @if(request()->path() == 'admin/users')
                    class="active"
                    @endif
                    >
                    <a href="{{ URL::to("admin/users") }}">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li @if(request()->path() == 'admin/pages')
                    class="active"
                    @endif>
                    <a href="{{ URL::to("admin/pages") }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Pages</p>
                    </a>
                </li>
                <li @if(request()->path() == 'admin/riders')
                    class="active"
                    @endif>
                   <a href="{{ URL::to("admin/riders") }}">
                       <i class="ti-user"></i>
                       <p>Riders</p>
                   </a>
               </li>
               <li @if(request()->path() == 'admin/drivers')
                    class="active"
                    @endif>
                  <a href="{{ URL::to("admin/drivers") }}">
                      <i class="ti-user"></i>
                      <p>Drivers</p>
                  </a>
              </li>
              <li @if(request()->path() == 'admin/dispute')
                    class="active"
                    @endif>
                 <a href="{{ URL::to("admin/dispute") }}">
                     <i class="ti-user"></i>
                     <p>Disputes</p>
                 </a>
             </li>

             <li @if(request()->path() == 'admin/purchases')
                    class="active"
                    @endif>
                 <a href="{{ URL::to("admin/purchases") }}">
                     <i class="ti-user"></i>
                     <p>Purchases Services</p>
                 </a>
             </li>
             <li @if(request()->path() == 'admin/promo-codes')
                    class="active"
                    @endif>
                 <a href="{{ URL::to("admin/promo-codes") }}">
                     <i class="ti-user"></i>
                     <p>Create Promotions</p>
                 </a>
             </li>
             
              <li @if(request()->path() == 'admin/configs')
                    class="active"
                    @endif>
                 <a href="{{ URL::to("admin/configs") }}">
                     <i class="ti-user"></i>
                     <p>Settings</p>
                 </a>
             </li>
             
                <!--
                <li>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
            <?php } ?>
    	</div>
    </div>
