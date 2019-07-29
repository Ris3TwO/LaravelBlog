@extends('layouts.app')

@section('content')
    <div class="row narrow add-bottom text-center">
        <div class="col-twelve tab-full">
            <div class="row">
                    <div class="col-three tab-full">
                        .
                    </div>
                    <div class="col-six tab-full">
                        <h1>{{ __('Reset Password') }}</h1>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
        
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div>
                                <label for="sampleInput">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="full-width{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @if ($errors->has('email'))
                                    <span class="alert-box ss-error hideit" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="sampleInput">{{ __('Password') }}</label>
                                <input id="password" type="password" class="full-width{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="alert-box ss-error hideit" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="sampleInput">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="full-width" name="password_confirmation" required autocomplete="new-password">                                
                            </div>                            

                            <button type="submit" class="button-primary full-width-on-mobile">
                                    {{ __('Reset Password') }}
                            </button>
         
                        </form>	            
                    </div>
                    <div class="col-four tab-full">
                        
                    </div>
            </div>			

        </div>

    </div>
@endsection
