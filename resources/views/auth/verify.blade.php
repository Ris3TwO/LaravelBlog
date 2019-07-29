@extends('layouts.app')

@section('content')
    <div class="row narrow add-bottom text-center">
        <div class="col-twelve tab-full">
            <div class="row">
                    <div class="col-three tab-full">
                        .
                    </div>
                    <div class="col-six tab-full">
                        <h1>{{ __('Verify Your Email Address') }}</h1>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.        
                    </div>
                    <div class="col-four tab-full">   
                    </div>
            </div>			
        </div>
    </div>

@endsection
