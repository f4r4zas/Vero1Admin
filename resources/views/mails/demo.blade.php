Welcome to Vero <i>{{ $demo->receiver }}</i>,

<p><u>Demo object values:</u></p>

<div>
<p><b>Demo One:</b>&nbsp;{{ $demo->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $demo->demo_two }}</p>
</div>

<p><u>Values passed by With method:</u></p>

<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>

Thank You,
<br/>
<i>{{ $demo->sender }}</i>
