@include("admin.header")
<div class="wrapper">
    @include("admin.menu")

    <style type="text/css">
        ul.settingsRow {
            margin: 20px auto;
        }
    </style>
    
    <script type="text/javascript">
        
        var url = "<?php echo URL::to('driver'); ?>";
        
    </script>

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
                            <p>Stripe</p>
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
                            <h1 class="title">Stripe</h1>
                        </div>
                        <div class="card-body">
                          
                            <div class="col-xs-12">
                                
                                <div class="row">
                                    
                                    <!-- stripe form-->
<script src="https://js.stripe.com/v3/"></script>
  <script src="{{ URL::to("assets/stripe/js/index.js") }}" data-rel-js></script>

<link rel="stylesheet" type="text/css" href="{{ URL::to("assets/stripe/css/base.css") }}" data-rel-css="" />
<link rel="stylesheet" type="text/css" href="{{ URL::to("assets/stripe/css/example1.css") }}" data-rel-css="" />
                                    
                                    <div class="globalContent">
    <main>
    
    <section class="container-lg">
      

      <!--Example 1-->
      <div class="cell example example1" id="example-1">
      
        <p id="message" class="text-danger" style="display: none;"></p>
          
        <form>
          <fieldset>
            <div class="row">
              <label for="example1-name" data-tid="elements_examples.form.name_label">Name</label>
              <input id="example1-name" data-tid="elements_examples.form.name_placeholder" type="text" placeholder="Jane Doe" required="" autocomplete="name">
            </div>
            <div class="row">
              <label for="example1-email" data-tid="elements_examples.form.email_label">Email</label>
              <input id="example1-email" data-tid="elements_examples.form.email_placeholder" type="email" placeholder="janedoe@gmail.com" required="" autocomplete="email">
            </div>
            <div class="row">
              <label for="example1-phone" data-tid="elements_examples.form.phone_label">Phone</label>
              <input id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">
            </div>
          </fieldset>
          <fieldset>
            <div class="row">
              <div id="example1-card"></div>
            </div>
          </fieldset>
          <input type="hidden" name="stripe_token" value="" id="stripe_tok" />
          <button type="submit" data-tid="elements_examples.form.pay_button">Submit</button>
          <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span></div>
        </form>
        
      </div>

    </section>
    
    </main>
  </div>

  <!-- Simple localization script for Stripe's examples page. -->
  <script src="{{ URL::to("assets/stripe/js/l10n.js") }}" data-rel-js></script>

  <!-- Scripts for each example: -->
  <script src="{{ URL::to("assets/stripe/js/example1.js") }}" data-rel-js></script>
  
                                    
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
