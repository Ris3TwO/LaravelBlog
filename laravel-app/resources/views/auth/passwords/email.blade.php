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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
        
                            <div>
                                <label for="sampleInput">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="full-width{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="alert-box ss-error hideit" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>                  

                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </form>	            
                    </div>
                    <div class="col-four tab-full">   
                    </div>
            </div>			
        </div>
    </div>

@endsection
