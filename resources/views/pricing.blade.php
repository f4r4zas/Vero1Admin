@include("includes.header")
<span class="howhide">

@include("includes.full_header")
	

  <!--   <script src="{{ URL::to("js/map_calc.js") }}"></script>
 -->    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ6v5rVNIY_XwJfCdIntpT1jNj0wLVReY&libraries=places"></script>
    <script src="https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js" type="text/javascript"></script>

 


</span>
<style type="text/css">
.bgofrow {
	background: url(images/bgabout.png) repeat 100% 100% !important;
	padding: 45px 0px;
}
.bgofrow h1 {
	font-size: 54px;
	color: #fff;
	font-weight: 700;
}
.form-horizontal {
	padding: 30px 0px;
}
 h2 {
	font-size: 42px;
	font-weight: 200;
	padding: 30px 0 0 0;
	margin: 0;
	text-transform: uppercase;
}
.inputtype {
	font-size: 1rem;
	min-height: 55px;
	padding: 31px 47px;
	border: 0;
	border-radius: .5rem;
	box-shadow: inset 0 2px 0 0 rgba(17,17,31,.25);
	transition: box-shadow .5s cubic-bezier(.19,1,.22,1);
	width: 100%;
	color: #11111f;
	margin-bottom: 8px;
	background: #f3f3f5;
}
.col-md-4.paddingsadj {
	padding-left: 0;
}
.s7mFmX {
	position: relative;
	top: -44px;
	left: 19px;
}
.btna .login-wrap a {
	padding: 18px 65px;
	margin: 0;
	border: 3px solid #ff9200;
	border-radius: 50px;
	color: #000;
	font-size: 13px;
	font-family: 'Montserrat', sans-serif;
	text-transform: uppercase;
	font-weight: bold;
	/* margin-top: 8px !important; */
	position: relative;
	top: 5px;
}
.form-control.inputtype {
	font-size: 18px;
}
.discalmers {
	max-width: 724px;
	margin: 25px 0px;
	font-size: 13px;
}
</style>
<div class="bgofrow">
			<div class="container text-center">
				<h1>Pricing</h1>
				
			</div>
	</div>
<div class="container">
	<p class="clearfix"></p>
	<div class="col-md-12">


		<form class="form-horizontal">

			<h2>Fare Estimate</h2>

			<br>
			<br>

			<div class="col-md-4 paddingsadj">
				<input type="text" placeholder="Enter pick-up Location" id="point_a" class="form-control inputtype">
				<div class="s7mFmX" data-reactid="88"><svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 500 500" class="_2x-x95 T7qYZp" style="vertical-align:middle;" data-reactid="89"><g data-reactid="90"><circle cx="243.056" cy="243.056" r="243.056" transform="translate(6.944 6.944)" stroke="#000" data-reactid="91"></circle></g></svg></div>
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="Enter drop-off Location" id="point_b" class="form-control inputtype">
				<div class="s7mFmX" data-reactid="88"><svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="1em" width="1em" viewBox="0 0 500 500" class="_2x-x95 T7qYZp" style="vertical-align:middle;" data-reactid="89"><g data-reactid="90"><circle cx="243.056" cy="243.056" r="243.056" transform="translate(6.944 6.944)" stroke="#000" data-reactid="91"></circle></g></svg></div>
			</div>
			
			
			<div class="col-sm-4 btna">
                    <div class="login-wrap">
                        <a id="getEstimate" href="#">Get Estimate</a>
                    </div>
                </div>
			
				
                <div class="col-md-12" id="estimate_map" style="display: none;">
                	<div id="map-canvas" style="width: 100%;height: 100%;"></div>

                	<p></p>
					<table class="table">
					<th><h1 id="ride_title">Vero1 Basic</h1></th>
					<th><h2 id="ride_type">Personal</h2></th>
					<th><span id="price_title">  <span class="ride_price"></span>|<span class="ride_time"></span>  </span></th>
					<th><input type="button" class="btn btn-primary" value="more" name=""></th>

				</table>


                </div>
		
		
		</form>

		<div class="clear"></div>
		<p class="discalmers">Sample fares are ride share estimates only and do not reflect variations due to discounts, traffic delays or other factors. Actual fares may vary. You agree to pay the fare shown upon confirming your ride request. If your route or destination changes on trip, your fare may change based on the rates above and other applicable taxes, tolls, charges and adjustments. Subject to VERO1 Terms of Service.<p>

		


		<div class="col-md-12">
				
				
		</div>

	

	</div><!-- Form -->
</div>

@include('includes.footer')


<script type="text/javascript">

	var point_a ;
	var point_b;

	var distance; 
	var duration;
	
	function initMap() {

			$("#estimate_map").hide();
	        var input = document.getElementById('point_a');
            var searchBox = new google.maps.places.SearchBox(input);
            
            autocomplete1 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('point_a')),
                { types: ['geocode'],  componentRestrictions: {country: "us"} });
            

            //autocomplete1.addListener('place_changed', fillInAddress);



            var input2 = document.getElementById('point_b');
            var searchBox2 = new google.maps.places.SearchBox(input2);
            
            autocomplete2 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('point_b')),
                { types: ['geocode'],  componentRestrictions: {country: "us"} });
            
            
            autocomplete2.addListener('place_changed', fillInAddress);




            if(point_a === void 0 || point_b[0] === void 0){
            	console.log("Return");
            	return false;
            }	

            	console.log("point be");
            	console.log(point_a);
	 var pointA = new google.maps.LatLng(point_a[0],point_a[1]),
   	 pointB = new google.maps.LatLng(point_b[0],point_b[1]),
    myOptions = {
      zoom: 20,
      center: pointA
    },
    map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),



    // Instantiate a directions service.
    directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
      map: map
    }),
    markerA = new google.maps.Marker({
      position: pointA,
      title: "point A",
      label: "A",
      map: map
    }),
    markerB = new google.maps.Marker({
      position: pointB,
      title: "point B",
      label: "B",
      map: map
    });

    map.setZoom(1);
  // get route from A to B
  calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
map.setZoom(1);

}

function fillInAddress() {

            // Get the place details from the autocomplete object.
             point_a = autocomplete1.getPlace();
             point_b = autocomplete2.getPlace();
             	console.log("Places");
               GetLatlong(point_a.formatted_address,1);
               GetLatlong(point_b.formatted_address,2);

               
             
}


function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      console.log("Worked");
	 distance = response.routes[0].legs[0].distance.value / 1609; 
	 duration = response.routes[0].legs[0].duration.value / 60;
		console.log(distance+" asd "+duration);	
    } else {
      //window.alert('Directions request failed due to ' + status);
      initMap();
    }
  });
}



function GetLatlong(address,pointNo)
    {
        var geocoder = new google.maps.Geocoder();
        var address = address;
        var loc = [];

        geocoder.geocode({ 'address': address }, function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                 loc[0] = latitude;
                 loc[1] = longitude;

                 if(pointNo == 1){
                 	point_a = loc;
                 }else if(pointNo == 2){
					point_b = loc;
					initMap();
                 }

            }
        });
}
initMap();


</script>

<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load',initMap);	
</script>


<script type="text/javascript">

	$("#getEstimate").click(function(){

		$("#estimate_map").hide();

		$.ajax({  headers: {
		'Accept': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }, url: "{{ url::to("get-pricing") }}",type:"POST",data:{ distance:distance,duration:duration } , success: function(result){
        	
    		console.log(result);

    		try {
			    var data =  $.parseJSON(result);

			var serviceChargesMilesPerGallon = data.charges["serviceChargesMilesPerGallon"];
			var serviceChargesPerMinutes = data.charges["serviceChargesPerMinutes"];
			var totalServiceCharges = data.charges["totalServiceCharges"];


			$("#price_title .ride_price").text("$ "+parseInt(totalServiceCharges));
			$("#price_title .ride_time").text(parseInt(duration)+" Min");


			$('html,body').animate({ scrollTop: 9999 }, 'slow');
			$("#estimate_map").show();

			}
			catch(err) {
			    alert("Try a different address");
			}


    	}});


	});

</script>
