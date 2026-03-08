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
                        {{ __('Register') }}
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
                <form class="form-add-message wow fadeInUp" data-wow-delay="0s" action="{{ route('signupStore') }}" method="POST">
                    @csrf

                    <input type="hidden" name="referrer_id" value="{{ request('ref') ?? session('referrer_id') }}">

                    <div class="cols">
                        {{-- name --}}
                        <fieldset>
                            <label for="field1">{{ __('Name') }}</label>
                            <input type="text" id="field1" placeholder="{{ __('Your name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="cols">
                        {{-- username --}}
                        <fieldset>
                            <label for="field3">{{ __('Username') }}</label>
                            <input type="text" id="field3" placeholder="{{ __('Your username') }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="cols">
                        <fieldset>
                            <label for="field4">{{ __('Email address') }}</label>
                            <input type="email" id="field4" placeholder="{{ __('Your email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="cols">
                        <fieldset>
                            <label for="field2">{{ __('Phone number') }}</label>
                            <input type="number" id="field2" placeholder="{{ __('Your phone') }}" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
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

                    <div class="btn-send-comment flex justify-center">
                        <button type="submit" class="btn-send tf-btn">
                            {{ __('Register') }} <i class="icon-right"></i>
                        </button>
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