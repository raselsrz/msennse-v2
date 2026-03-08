@extends('layouts.default')
@section('content')


<!-- page-title -->
<div class="page-title">
    <div class="tf-tsparticles">
        <div id="tsparticles1" data-color="#fff" data-line="#fff"></div>
    </div>
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <h1 class="title">{{ __('Contact us') }}</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li><i class="icon-next"></i></li>
                        <li>{{ __('Contact') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- main-content -->
<div class="main-content">

    <!-- section contact info -->
    <section class="s-contact-infor s-get-started tf-spacing-1">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section mb-40">
                        <h1 class="title fw-9 fs-50 mb-8">
                            {{ __('Contact info') }}
                        </h1>
                        <p class="sub-title fw-4">
                            {{ __('Follow these 3 easy steps!') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="getstart-item  style-2 color-1 type-1 wow fadeInUp" data-wow-delay="0s">
                        <div class="wrapper hover-item">
                            <div class="wrap-image image-item">
                                <img src="./images/item/infor-call.png" alt="">
                            </div>
                            <div class="content">
                                <div class="title"><a href="#">{{ __('Phone') }}</a></div>
                                <p>{{ get_option('phone', '') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="getstart-item style-2 color-3 type-1 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="wrapper hover-item">
                            <div class="wrap-image image-item">
                                <img src="./images/item/infor-email.png" alt="">
                            </div>
                            <div class="content">
                                <div class="title"><a href="#">{{ __('Email') }}</a></div>
                                <p class="text-2">{{ get_option('email', '') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="getstart-item style-2 color-3 type-1 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="wrapper hover-item">
                            <div class="wrap-image image-item">
                                <img src="./images/item/infor-address.png" alt="">
                            </div>
                            <div class="content">
                                <div class="title"><a href="#">{{ __('Location') }}</a></div>
                                <p>{{ get_option('address', '') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="wg-social">
                        <p class="caption fw-9 fs-20">{{ __('Follow us on social media') }}</p>
                        <ul class="list-social">
                            <li class="item">
                                <a href="{{ get_option('facebook', '') }}" class="">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="{{ get_option('twitter', '') }}" class="">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="{{ get_option('tiktok', '') }}" class="">
                                    <i class="icon-tiktok"></i>
                                </a>
                            </li>
                            <li class="item">
                                <a href="{{ get_option('youtube', '') }}" class="">
                                    <i class="icon-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /section contact info -->

    <!-- section send message -->
    <section class="s-send-message tf-spacing-1">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2 class="title">
                            {{ __('Send us a message') }}
                        </h2>
                        <p class="sub-title">
                            {{ __('Our team of lottery experts is prepared to provide a quick and thorough response to all your questions and concerns via email.') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form class="form-add-message wow fadeInUp" data-wow-delay="0s" action="{{ route('contactStore') }}" method="post">
                        @csrf
                        <div class="cols">
                            <fieldset class="tf-field">
                                <label for="field1">{{ __('Your name') }} *</label>
                                <input class="tf-input" type="text" id="field1" placeholder="{{ __('Your name') }}" required="" name="name" value="{{ old('name') }}">
                            </fieldset>
                        </div>
                        <div class="cols">
                            <fieldset>
                                <label for="field4">{{ __('Email address') }}</label>
                                <input type="email" id="field4" placeholder="{{ __('Your email') }}" required="" name="email" value="{{ old('email') }}">
                            </fieldset>
                            <fieldset>
                                <label for="field2">{{ __('Phone number') }}</label>
                                <input type="number" id="field2" placeholder="{{ __('Your phone') }}" required="" name="phone" value="{{ old('phone') }}">
                            </fieldset>
                        </div>
                        <fieldset class="fieldText mb-30">
                            <label for="field3">{{ __('Your message') }}</label>
                            <textarea id="field3" placeholder="{{ __('Your message') }}" required="" name="message">{{ old('message') }}</textarea>
                        </fieldset>

                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>

                        <div class="btn-send-comment flex justify-center">
                            <button type="submit" class="btn-send tf-btn ">{{ __('Send message') }} <i class="icon-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section send message -->

</div>



@stop

@push('js')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


@endpush