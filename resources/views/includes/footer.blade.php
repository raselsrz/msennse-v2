<!-- footer -->
<footer id="footer">
    <div class="footer-about">
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-menu">
                        <div class="footer-logo">
                            <a href="{{ route('home') }} ">
                                <img src="{{ get_option('logo','') }}" alt="" data-retina="{{ get_option('logo','') }}">
                            </a>
                        </div>
                        <ul class="menu overflow-x-auto">
                            <li><a href="{{ route('home') }}">{{ __('HOME') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('ABOUT') }}</a></li>
                            <li><a href="{{ route('blog') }}">{{ __('BLOG') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('CONTACT') }}</a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <p class="mb-20">{{ __('Welcome to MSENNSE, your gateway to earning money online! We provide a variety of tasks, including text typing, photography, math quizzes, video watching, and more. Our platform is designed to help you earn while having fun and learning new skills.') }}</p>
                        <p class="mb-20">{{ __('At MSENNSE, we believe in empowering our users to achieve financial independence through simple and engaging tasks. Whether you’re a student, a creative professional, or someone looking to make extra income, our platform offers opportunities for everyone. Join us today and start earning!') }}</p>
                        <div class="note"><i class="icon-infor"></i>{{ __('Earning money online requires effort and dedication. Please use our platform responsibly and enjoy the rewards of your hard work.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-main">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer">
                        <div class="widget-title">
                            {{__('Earn money with us')}}
                        </div>
                        <ul>
                            <li><a href="{{ route('home') }} ">{{__('Home')}}</a></li>
                            <li><a href="{{ route('about') }} ">{{__('About us')}}</a></li>
                            <li><a href="{{ route('blog') }} ">{{__('Latest News')}}</a></li>
                            <li><a href="{{ route('contact') }} ">{{__('Contact us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer dowload-app">
                        <div class="bottom">
                            <div class="widget-title">
                                {{__('Find us')}}
                            </div>
                            <ul class="tf-social">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-tiktok"></i></a></li>
                                <li><a href="#"><i class="icon-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer help">
                        <div class="widget-title">
                            {{__('How can we help?')}}
                        </div>
                        <a class="tf-btn" href="{{route('contact') }} ">{{__('Contact us')}} <i class="icon-right"></i></a>
                        <p>{{__('If you can’t find answer to your question, fill your query & submit, or you can always contact us. We answer to you shortly')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper">
                        <div class="left">
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 17.5C11.6625 17.4999 13.2779 16.9477 14.5925 15.93C15.9072 14.9124 16.8466 13.4869 17.2633 11.8775M10 17.5C8.33751 17.4999 6.72212 16.9477 5.40748 15.93C4.09284 14.9124 3.1534 13.4869 2.73667 11.8775M10 17.5C12.0708 17.5 13.75 14.1417 13.75 10C13.75 5.85833 12.0708 2.5 10 2.5M10 17.5C7.92917 17.5 6.25 14.1417 6.25 10C6.25 5.85833 7.92917 2.5 10 2.5M17.2633 11.8775C17.4175 11.2775 17.5 10.6483 17.5 10C17.5021 8.71009 17.1699 7.44166 16.5358 6.31833M17.2633 11.8775C15.041 13.1095 12.541 13.754 10 13.75C7.365 13.75 4.88917 13.0708 2.73667 11.8775M2.73667 11.8775C2.57896 11.2641 2.49944 10.6333 2.5 10C2.5 8.6625 2.85 7.40583 3.46417 6.31833M10 2.5C11.3302 2.49945 12.6366 2.8528 13.7852 3.5238C14.9337 4.19481 15.8831 5.15931 16.5358 6.31833M10 2.5C8.6698 2.49945 7.3634 2.8528 6.21484 3.5238C5.06628 4.19481 4.11692 5.15931 3.46417 6.31833M16.5358 6.31833C14.7214 7.88994 12.4004 8.75345 10 8.75C7.50167 8.75 5.21667 7.83333 3.46417 6.31833"
                                        stroke="#7791BA" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="tf-dropdown-sort tf-languages" data-bs-toggle="dropdown">
                                <div class="btn-select">
                                    <span class="text-sort-value"> 
                                    <a href="/hh">
                                        {{__('English')}}
                                    </a>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="select-item active">
                                        <span class="text-value-item"><a href="/hh">
                                        Hello
                                        </a>
                                    </div>
                                    <div class="select-item">
                                        <span class="text-value-item">{{__('Spain')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <ul>
                                <li><a href="#">{{__('Cookie Policy')}}</a></li>
                                <li><a href="#">{{__('Data Privacy Statement')}}</a></li>
                                <li><a href="#">{{__('Terms & Conditions')}}</a></li>
                            </ul>
                        </div>
                        <div class="right">
                            <span> <script>document.write(new Date().getFullYear())</script> © {{get_option('sitename','')}}{{__('All rights reserved')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->

<!-- login-popup -->
{{-- <div class="modal fade modalCenter auto-popup" id="modallogin">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-sm">
            <div class="login-wrap">
                <div class="image">
                    <img class="lazyload" data-src="/assets/images/section/login.png" src="/assets/images/section/login.png" alt="">
                </div>
                <div class="content">
                    <div class="close-form">
                        <a href="#" class="btn-hide-popup" data-bs-dismiss="modal"><i class="icon-close"></i></a>
                    </div>
                    <h4 class="title">
                        {{__('Welcome to Lode lottery')}}
                    </h4>
                    <form class="form-login" id="form-login" action="dashboard.html">
                        <div class="cols mb-20">
                            <fieldset>
                                <label for="field1">{{__('Email address*')}}</label>
                                <input id="field1" type="email" required placeholder="{{__('Your email')}}">
                            </fieldset>
                        </div>
                        <div class="cols mb-20 relative">
                            <fieldset>
                                <label for="field2">{{__('Password *')}}</label>
                                <input class="password" id="pass" type="password" required placeholder="{{__('Password')}}">
                                <span class="toggle-password">
                                    <i class="icon-view"></i>
                                </span>
                            </fieldset>
                        </div>
                        <div class="checkbox-item">
                            <label class="mb-0">
                                <span class="">{{__('Keep me signed in')}}</span>
                                <input type="checkbox">
                                <span class="btn-checkbox"></span>
                            </label>
                            <a href="#" class="type-main-color">{{__('Forgot my password?')}}</a>
                        </div>
                        <button type="submit" class="btn-login tf-btn full-w">
                            {{__('Log in')}}
                        </button>
                    </form>
                    <div class="text-login-with relative">
                        <span class="fs-12">{{__('Or continue with social account')}}</span>
                    </div>
                    <ul class="social-sign-list">
                        <li class="sign-google">
                            <a href="dashboard.html" class="type-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.1696 9.08734L12.196 9.08691C11.7997 9.08691 11.4785 9.40806 11.4785 9.80432V12.671C11.4785 13.0672 11.7997 13.3884 12.1959 13.3884H17.2493C16.696 14.8244 15.6632 16.0271 14.3455 16.7913L16.5002 20.5213C19.9567 18.5223 22.0002 15.0148 22.0002 11.0884C22.0002 10.5293 21.959 10.1297 21.8766 9.67967C21.814 9.33777 21.5171 9.08734 21.1696 9.08734Z"
                                        fill="#167EE6" />
                                    <path
                                        d="M10.9999 17.6954C8.52689 17.6954 6.36797 16.3442 5.20846 14.3447L1.47852 16.4946C3.37666 19.7844 6.9325 21.9997 10.9999 21.9997C12.9953 21.9997 14.878 21.4625 16.4999 20.5263V20.5211L14.3452 16.791C13.3595 17.3627 12.219 17.6954 10.9999 17.6954Z"
                                        fill="#12B347" />
                                    <path
                                        d="M16.5 20.5262V20.5211L14.3452 16.791C13.3596 17.3626 12.2192 17.6954 11 17.6954V21.9997C12.9953 21.9997 14.8782 21.4625 16.5 20.5262Z"
                                        fill="#0F993E" />
                                    <path
                                        d="M4.30435 10.9998C4.30435 9.78079 4.63702 8.64036 5.20854 7.65478L1.4786 5.50488C0.537195 7.12167 0 8.99932 0 10.9998C0 13.0002 0.537195 14.8779 1.4786 16.4947L5.20854 14.3448C4.63702 13.3592 4.30435 12.2188 4.30435 10.9998Z"
                                        fill="#FFD500" />
                                    <path
                                        d="M10.9999 4.30435C12.6126 4.30435 14.0939 4.87738 15.2509 5.83056C15.5363 6.06568 15.9512 6.04871 16.2127 5.78725L18.2438 3.75611C18.5405 3.45946 18.5193 2.97387 18.2024 2.69895C16.2639 1.0172 13.7416 0 10.9999 0C6.9325 0 3.37666 2.21534 1.47852 5.50511L5.20846 7.65501C6.36797 5.65555 8.52689 4.30435 10.9999 4.30435Z"
                                        fill="#FF4B26" />
                                    <path
                                        d="M15.251 5.83056C15.5364 6.06568 15.9513 6.04871 16.2128 5.78725L18.2439 3.75611C18.5405 3.45946 18.5194 2.97387 18.2025 2.69895C16.264 1.01716 13.7417 0 11 0V4.30435C12.6126 4.30435 14.094 4.87738 15.251 5.83056Z"
                                        fill="#D93F21" />
                                </svg>
                                <span>{{__('Sign in with Google')}}</span>
                            </a>
                        </li>
                        <li class="sign-facebook">
                            <a href="dashboard.html" class="type-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_502_3309)">
                                        <path
                                            d="M22 11C22 16.4905 17.9773 21.0414 12.7188 21.8664V14.1797H15.2818L15.7695 11H12.7188V8.93664C12.7188 8.06652 13.145 7.21875 14.5114 7.21875H15.8984V4.51172C15.8984 4.51172 14.6395 4.29688 13.4359 4.29688C10.9235 4.29688 9.28125 5.81969 9.28125 8.57656V11H6.48828V14.1797H9.28125V21.8664C4.02273 21.0414 0 16.4905 0 11C0 4.92508 4.92508 0 11 0C17.0749 0 22 4.92508 22 11Z"
                                            fill="#1877F2" />
                                        <path
                                            d="M15.2818 14.1797L15.7695 11H12.7188V8.9366C12.7188 8.0667 13.1449 7.21875 14.5114 7.21875H15.8984V4.51172C15.8984 4.51172 14.6396 4.29688 13.4361 4.29688C10.9235 4.29688 9.28125 5.81969 9.28125 8.57656V11H6.48828V14.1797H9.28125V21.8663C9.8413 21.9542 10.4153 22 11 22C11.5847 22 12.1587 21.9542 12.7188 21.8663V14.1797H15.2818Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_502_3309">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span>{{__('Sign in with Facebook')}}</span>
                            </a>
                        </li>
                    </ul>
                    <p class="bottom-form">
                        {{__('Not registered yet?')}}
                        <a href="#modalregister" data-bs-toggle="modal" class="type-main-color">
                            {{__('Create a FREE Account')}}
                        </a>
                        {{__('and start playing!')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- /login-popup -->

<!-- register-popup -->
{{-- <div class="modal fade modalCenter" id="modalregister">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-sm">
            <div class="register-wrap">
                <div class="image">
                    <img class="lazyload" data-src="/assets/images/section/register.png" src="/assets/images/section/register.png" alt="">
                </div>
                <div class="content">
                    <div class="close-form">
                        <a href="#" class="btn-hide-popup" data-bs-dismiss="modal"><i class="icon-close"></i></a>
                    </div>
                    <h4 class="title">
                        {{__('Open Your FREE Account')}}
                    </h4>
                    <form id="form-register" class="form-register" action="dashboard.html">
                        <div class="cols mb-20">
                            <fieldset>
                                <label for="field2">{{__('Your email *')}}</label>
                                <input id="field2" type="email" required placeholder="{{__('Your email')}}">
                            </fieldset>
                        </div>
                        <div class="cols mb-20 relative">
                            <fieldset>
                                <label for="pass1">{{__('Password *')}}</label>
                                <input class="password" id="pass1" type="password" required placeholder="{{__('Password')}}">
                                <span class="toggle-password first-time">
                                    <i class="icon-view"></i>
                                </span>
                            </fieldset>
                        </div>
                        <div class="cols mb-20 relative">
                            <fieldset>
                                <label for="confirmPass1">{{__('Confirm password *')}}</label>
                                <input class="password" id="confirmPass1" type="password" required placeholder="{{__('Password')}}">
                                <span class="toggle-password second-time">
                                    <i class="icon-view"></i>
                                </span>
                            </fieldset>
                        </div>
                        <div class="checkbox-item mb-10">
                            <label class="mb-0">
                                <span class="">{{__('I have read and accept the')}}
                                    <a href="#" class="notice type-secondary">
                                        {{__('Terms of Use')}}
                                    </a>
                                    {{__('and the')}}
                                    <a href="#" class="notice type-secondary">
                                        {{__('Privacy Notice')}}
                                    </a>
                                </span>
                                <input type="checkbox" required>
                                <span class="btn-checkbox"></span>
                            </label>
                        </div>
                        <div class="checkbox-item">
                            <label>
                                <span class="">{{__('Yes, I want to receive exclusive deals and discounts!')}}</span>
                                <input type="checkbox" required>
                                <span class="btn-checkbox"></span>
                            </label>
                        </div>
                        <button type="submit" class="btn-login tf-btn full-w">
                            {{__('Sign up')}}
                        </button>
                    </form>
                    <div class="text-login-with relative">
                        <span class="fs-12">{{__('Or continue with social account')}}</span>
                    </div>
                    <ul class="social-sign-list">
                        <li class="sign-google">
                            <a href="dashboard.html" class="type-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.1696 9.08734L12.196 9.08691C11.7997 9.08691 11.4785 9.40806 11.4785 9.80432V12.671C11.4785 13.0672 11.7997 13.3884 12.1959 13.3884H17.2493C16.696 14.8244 15.6632 16.0271 14.3455 16.7913L16.5002 20.5213C19.9567 18.5223 22.0002 15.0148 22.0002 11.0884C22.0002 10.5293 21.959 10.1297 21.8766 9.67967C21.814 9.33777 21.5171 9.08734 21.1696 9.08734Z"
                                        fill="#167EE6" />
                                    <path
                                        d="M10.9999 17.6954C8.52689 17.6954 6.36797 16.3442 5.20846 14.3447L1.47852 16.4946C3.37666 19.7844 6.9325 21.9997 10.9999 21.9997C12.9953 21.9997 14.878 21.4625 16.4999 20.5263V20.5211L14.3452 16.791C13.3595 17.3627 12.219 17.6954 10.9999 17.6954Z"
                                        fill="#12B347" />
                                    <path
                                        d="M16.5 20.5262V20.5211L14.3452 16.791C13.3596 17.3626 12.2192 17.6954 11 17.6954V21.9997C12.9953 21.9997 14.8782 21.4625 16.5 20.5262Z"
                                        fill="#0F993E" />
                                    <path
                                        d="M4.30435 10.9998C4.30435 9.78079 4.63702 8.64036 5.20854 7.65478L1.4786 5.50488C0.537195 7.12167 0 8.99932 0 10.9998C0 13.0002 0.537195 14.8779 1.4786 16.4947L5.20854 14.3448C4.63702 13.3592 4.30435 12.2188 4.30435 10.9998Z"
                                        fill="#FFD500" />
                                    <path
                                        d="M10.9999 4.30435C12.6126 4.30435 14.0939 4.87738 15.2509 5.83056C15.5363 6.06568 15.9512 6.04871 16.2127 5.78725L18.2438 3.75611C18.5405 3.45946 18.5193 2.97387 18.2024 2.69895C16.2639 1.0172 13.7416 0 10.9999 0C6.9325 0 3.37666 2.21534 1.47852 5.50511L5.20846 7.65501C6.36797 5.65555 8.52689 4.30435 10.9999 4.30435Z"
                                        fill="#FF4B26" />
                                    <path
                                        d="M15.251 5.83056C15.5364 6.06568 15.9513 6.04871 16.2128 5.78725L18.2439 3.75611C18.5405 3.45946 18.5194 2.97387 18.2025 2.69895C16.264 1.01716 13.7417 0 11 0V4.30435C12.6126 4.30435 14.094 4.87738 15.251 5.83056Z"
                                        fill="#D93F21" />
                                </svg>
                                <span>{{__('Sign in with Google')}}</span>
                            </a>
                        </li>
                        <li class="sign-facebook">
                            <a href="dashboard.html" class="type-secondary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_502_3309)">
                                        <path
                                            d="M22 11C22 16.4905 17.9773 21.0414 12.7188 21.8664V14.1797H15.2818L15.7695 11H12.7188V8.93664C12.7188 8.06652 13.145 7.21875 14.5114 7.21875H15.8984V4.51172C15.8984 4.51172 14.6395 4.29688 13.4359 4.29688C10.9235 4.29688 9.28125 5.81969 9.28125 8.57656V11H6.48828V14.1797H9.28125V21.8664C4.02273 21.0414 0 16.4905 0 11C0 4.92508 4.92508 0 11 0C17.0749 0 22 4.92508 22 11Z"
                                            fill="#1877F2" />
                                        <path
                                            d="M15.2818 14.1797L15.7695 11H12.7188V8.9366C12.7188 8.0667 13.1449 7.21875 14.5114 7.21875H15.8984V4.51172C15.8984 4.51172 14.6396 4.29688 13.4361 4.29688C10.9235 4.29688 9.28125 5.81969 9.28125 8.57656V11H6.48828V14.1797H9.28125V21.8663C9.8413 21.9542 10.4153 22 11 22C11.5847 22 12.1587 21.9542 12.7188 21.8663V14.1797H15.2818Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_502_3309">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span>{{__('Sign in with Facebook')}}</span>
                            </a>
                        </li>
                    </ul>
                    <p class="bottom-form">
                        {{__('Already registered?')}}
                        <a href="#modallogin" data-bs-toggle="modal" class="type-main-color">
                            {{__('Click here')}}
                        </a>
                        {{__('to login.')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- /register-popup -->

</div>
<!-- /wrapper -->
<!-- prograss -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<!-- /prograss -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/lazysize.min.js') }}"></script>
<script src="{{ asset('js/textanimation.js') }}"></script>
<script src="{{ asset('js/count-down.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<!-- js stack -->
{!! get_option('footer_codes','') !!}