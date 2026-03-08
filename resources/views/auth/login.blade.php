@extends('layouts.app')

@section('content')


<div class="main-content">

            <!-- section send message -->
<section class="s-send-message mt-20 tf-spacing-1">
    <div class="tf-container mt-48">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section">
                    <h2 class="title">
                        {{ __('Login') }}
                    </h2>

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                            <span class="alert-text">{{Session::get('success')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                            <span class="alert-text" style=" color: #000; " >{{Session::get('error')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif @if (count($errors) > 0) @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                            <span class="alert-text" style=" color: #000; " >{{$error}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach @endif


                </div>
            </div>
            <div class="col-lg-8 m-auto">
                <form class="form-add-message wow fadeInUp" data-wow-delay="0s" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="cols">
                        <fieldset>
                            <label for="field4">{{ __('User Name') }}</label>
                            <input type="text" id="field4" placeholder="{{ __('Your username') }}" name="username" value="{{ old('username') }}" required autofocus>
                        
                            @error('dream28')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        </fieldset>
                    </div>

                    <div class="cols">
                        {{-- password --}}
                        <fieldset>
                            <label for="field1">{{ __('Password') }}</label>
                            <input type="password" id="field1" placeholder="{{ __('Your password') }}" name="password" required autocomplete="current-password">
                        
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        </fieldset>
                    </div>

                    <div class="cols">
                        <fieldset>
                            <label for="field1">{{ __('Remember me') }}</label>
                            <input type="checkbox" id="field1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        </fieldset>
                    </div>

                    <div class="cols">
                        <p>
                            {{ __("You don't have an account?") }} <a class="current-menu-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </p>
                    </div>

                    <div class="btn-send-comment flex justify-center">
                        <button type="submit" class="btn-send tf-btn">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

            <!-- section send message -->

</div>





@endsection



@push('css')


<style>
    .s-send-message{
        margin-top: 50px;
    }
</style>


@endpush