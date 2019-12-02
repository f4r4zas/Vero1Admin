<h1>Driver Registration </h1>
<div class="steps-wrap">

    <ul class="steps">
        <li><a class="<?php if(empty($data["step"])){ echo "active"; } ?>" href="{{ URL::to("/driver-register") }}"><i class="glyphicon glyphicon-ok"></i></a>
            <p class="dets"></p>
            <p class="dets2">Personal Information</p>
        </li>
        <li><a   class="<?php if($data["step"] == 2){ echo "active"; }   if(Session::has("register-id")){ echo ""; }else{echo "disabledMenu";} ?>" href="{{ URL::to("/driver-register/2") }}" href="#"><i class="glyphicon glyphicon-ok"></i></a>

            <p class="dets"></p>
            <p class="dets2">Vehicle Information</p>
        </li>

        <li><a class="<?php if($data["step"] == 3){ echo "active"; }  if(Session::has("register-form-2")){ echo ""; }else{echo "disabledMenu";}?>" href="{{ URL::to("/driver-register/3") }}"  href="#"><i class="glyphicon glyphicon-ok"></i></a>
            <p class="dets nobod"></p>
            <p class="dets2">Upload Documents</p>
        </li>
    </ul>
   {{-- <ul class="details">
        <li><p>Personal Information</p></li>
        <li><p>Vehicle Information</p></li>
        <li><p>Upload Documents</p></li>
    </ul>--}}
</div><!--steps-wrap-->
<p class="clearfix"></p>
