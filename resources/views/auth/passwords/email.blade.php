@include("includes.header")
<span class="howhide">

@include("includes.full_header")
</span><div class="bgs">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 sampepage">
            <div class="card">
                <div class="card-header loginfont">{{ __('Reset Password') }}</div>

                <div class="card-body">
				<?php
				
				echo "<pre style='display:none'>";
				print_r(session()->all());
				
				echo "</pre>";
					
			
				?>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status')[0] }}
                        </div>
                    @endif
 
					@if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error')[0] }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}  vero-field" name="email" value="{{ old('email') }}" required placeholder="example@example.com">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary vero2 vero-btn1">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="body2">
    @include("includes.footer")
</div>
