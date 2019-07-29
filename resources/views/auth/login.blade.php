@extends('layouts.app')

@section('content')

    <div class="row narrow add-bottom text-center">

        <div class="col-twelve tab-full">

            <div class="row">
                    <div class="col-four tab-full">
                        <h1>Textos Informativos</h1>
                        @if ($errors->has('email'))
                            <div class="alert-box ss-error hideit">
                                <p><strong>{{ $errors->first('email') }}</strong></p>
                            </div><!-- /error -->
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert-box ss-error hideit">
                                <p><strong>{{ $errors->first('password') }}</strong></p>
                            </div><!-- /error -->
                        @endif
                    </div>
                    <div class="col-four tab-full">
                        <h1>{{ __('Login') }}</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="sampleInput">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="full-width{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="correo@mail.com">
                            </div>
                            <div>
                                <label for="sampleInput">{{ __('Password') }}</label>
                                <input id="password" type="password" class="full-width{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="123456789">
                            </div>

                            <label class="add-bottom">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>			            
                                <span class="label-text">{{ __('Remember Me') }}</span>
                            </label>

                            <button type="submit" class="button-primary full-width-on-mobile">
                                    {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="button" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
         
                        </form>	            
                    </div>
                    <div class="col-four tab-full">
                        
                    </div>
            </div>			

        </div>

    </div>

    
@endsection
