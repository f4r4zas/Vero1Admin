<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>VERO 1</title>
    <link rel="stylesheet" href="{{ URL::to("css/bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ URL::to("css/style.css") }}" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link href="{{ URL::to("css/bootstrap-datepicker.css") }}" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/npm.js"></script><script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    

    <link href="https://fonts.googleapis.com/css?family=Montserrat:800" rel="stylesheet">

    <script src="{{ URL::to("js/bootstrap-datepicker.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.3/dist/loadingoverlay.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    


<!--     <script src="{{ URL::to("js/map_calc.js") }}"></script> -->

    <link rel="shortcut icon" href="{{ URL::to("favicon/12.png") }}" type="image/png">
    <link rel="icon" href="{{ URL::to("favicon/12.png") }}" type="image/png">
<script>

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("body").style.display = "block";
  document.getElementById("body").style.background = "transparent";

if($("#body2").length > 0){
    document.getElementById("body2").style.display = "block";  
}

  
}
</script>

   
</head>

<body onload="myFunction()"  style="" >
 <div class="skype-loader" id="loader">
    <div class="dot">
      <div class="first"></div>
    </div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>


<div id="body">
