@extends('layouts.app')

@section('content')



<div class="main-content">

    <!-- section send message -->
<section class="s-send-message mt-5 tf-spacing-1">
    <div class="tf-container mt-5">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="heading-section mt-5">
                    <h2 class="title">
                        {{ __('Verify Your Email') }}
                    </h2>
                </div>
            </div>
            <div class="col-lg-8 m-auto">
                <form class="form-add-message wow fadeInUp" data-wow-delay="0s" action="{{ route('verify-email') }}" method="POST">
                    @csrf

                    <div class="cols d-none">
                        <fieldset>
                            <label for="field4">{{ __('Email address') }}</label>
                            <input type="hidden" id="field4" placeholder="{{ __('Your email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>

                    {{-- verification_code --}}
                    <div class="cols">
                        <fieldset>
                            <label for="field1">{{ __('Verification Code') }}</label>
                            <input type="text" id="field1" placeholder="{{ __('Your verification code') }}" name="verification_code" required>
                        
                            @error('verification_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="btn-send-comment flex justify-center">
                        <button type="submit" class="btn-send tf-btn">{{ __('Submit Code') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- section send message -->

</div>







@stop