@extends('layouts.default')
@section('content')



<!-- page-title-home-1 -->
<div class="page-title-home-1">
    <!-- <img class="item-page-title-home-1" src="./{{asset('images/item/page-title-1.png')}}" alt=""> -->
    <img class="coin item-1" src="{{ asset('images/item/coin-3.png') }}" alt="">
    <img class="coin item-2" src="{{ asset('images/item/coin-4.png') }}" alt="">
    <img class="coin item-3" src="{{ asset('images/item/coin-5.png') }}" alt="">
    <img class="coin item-4" src="{{ asset('images/item/coin-6.png') }}" alt="">
    <img class="coin item-5" src="{{ asset('images/item/coin-7.png') }}" alt="">
    <img class="coin item-6" src="{{ asset('images/item/coin-8.png') }}" alt="">
    <img class="coin item-7" src="{{ asset('images/item/ball.png') }}" alt="">
    <img class="coin item-8" src="{{ asset('images/item/ball-1.png') }}" alt="">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-page-title">
                    <p class="title">
                        {{ __('Earning Money with') }}
                    
                        <span class="d-block animationtext clip">
                            <span class="cd-words-wrapper">
                                <span class="item-text is-visible">{{ __('Simple Tasks') }}</span>
                                <span class="item-text is-hidden">{{ __('Creative Tasks') }}</span>
                                <span class="item-text is-hidden">{{ __('Fun Activities') }}</span>
                            </span>
                        </span>
                    </p>
                    <p class="sub-title">
                        {{ __('Opportunities to earn are waiting for you. Ready to start your journey and') }} <br>
                        {{ __('become our next top earner?') }}
                    </p>

                    @if(Auth::check() && Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="tf-btn">{{ __('Admin Dashboard') }} <i class="icon-right
                        "></i> </a>
                    @elseif(Auth::check())
                    <a href="{{ route('dashboard') }}" class="tf-btn">{{ __('Dashboard') }} <i class="icon-right"></i> </a>
                    @else
                    <a href="{{ route('login') }}" class="tf-btn">{{ __('Sign In') }} <i class="icon-right"></i> </a>
                    @endif


                    <div class="item-car">
                        <img src="{{ asset('images/item/page-title-car.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="main-content">
    <section class="section-cta tf-spacing-1">
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-cta-inner">
                        <div class="cta-content">
                            <div class="text">
                                {{ __('Earn Money Effortlessly!') }}
                            </div>
                            <p class="text-color-clip style-2">
                                {{ __('Start completing tasks today!') }}
                            </p>
                        </div>
                        <div class="cta-middle">
                            <div class="icon">
                                <img src="{{ asset('images/icon/earn-money.png') }}" 
                                     data-src="{{ asset('images/icon/earn-money.png') }}" 
                                     alt="" class="lazyload">
                            </div>
                            <p class="money text-color-clip fs-50">
                                {{ __('Up to $500 Daily!') }}
                            </p>
                            {{-- <span class="js-countdown" data-timer="290603"></span> --}}
                        </div>
                        <div class="cta-right text-center">
                            <a href="{{ route('tasks') }}" class="tf-btn border-node-backgroud">
                                {{ __('Start Earning Now') }} <i class="icon-right"></i>
                            </a>
                            <div class="text-2">
                                *{{ __('Easy & Reliable') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-get-started tf-spacing-1">
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-start pb-0">
                        <div class="title pb-1">
                            {{ __('How to Earn Money on MSENNSE') }}
                        </div>
                        <p class="text-title fs-14">
                            {{ __('Follow these 3 simple steps!') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row homes-ticket-img">
                <div class="col-md-6">
                    <div class="get-started-content">
                        <div class="get-started-main">
                            <div class="getstart-item color-1 hover-item wow fadeInUp" data-wow-delay="0s">
                                <div class="wrap-image image-item">
                                    <img src="{{ asset('images/banner/task.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="title"><a href="#">{{ __('Complete Tasks') }}</a></div>
                                    <p class="fs-16">{{ __('Choose from various tasks like watching videos, typing, or uploading photos.') }}</p>
                                </div>
                            </div>
                            <div class="getstart-item hover-item color-2 wow fadeInUp" data-wow-delay="0s">
                                <div class="wrap-image image-item">
                                    <img src="{{ asset('images/banner/earn.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="title"><a href="#">{{ __('Earn Instantly') }}</a></div>
                                    <p class="fs-16">{{ __('Complete tasks and get rewarded in your MSENNSE wallet instantly.') }}</p>
                                </div>
                            </div>
                            <div class="getstart-item hover-item color-3 wow fadeInUp" data-wow-delay="0s">
                                <div class="wrap-image image-item">
                                    <img src="{{ asset('images/banner/withdraw.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="title"><a href="#">{{ __('Withdraw Your Earnings') }}</a></div>
                                    <p class="fs-16">{{ __('Withdraw your money anytime via multiple payment options.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="get-started-image">
                        <div class="mt-5 image-2 wow pulse animated" data-wow-delay="1s">
                            <img src="{{ asset('images/banner/bannersbg.png') }}"
                                data-src="{{ asset('images/banner/bannersbg.png') }}" alt="" class="lazyload">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
<!-- section success story -->
<section class="s-succes-story tf-spacing-1">
    <div class="tf-container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="heading-section mb-40">
                    <h2 class="title mb-6 wow fadeInUp" data-wow-delay="0s">
                        {{ __('MSENNSE Success Stories') }}
                    </h2>
                    <p class="sub-title fs-14">
                        {{ __('Real people, real earnings - See what our users have achieved!') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="wg-counter justify-center">
                    <div class="counter-item">
                        <div class="counter">
                            <div class="number-counter">
                                <span class="number" data-speed="2500" data-to="500" 
                                          data-inviewport="yes">500</span>
                                <span class="plus">
                                    {{ __('K') }}
                                </span>
                            </div>
                        </div>
                        <p class="text ">{{ __('Over 500K users earning daily through tasks.') }}</p>
                    </div>
                    <div class="counter-item type-center">
                        <div class="counter">
                            <div class="number-counter">
                                <span class="number" data-speed="2500" data-to="2" 
                                          data-inviewport="yes">2</span>
                                <span class="plus">
                                    {{ __('M') }}
                                </span>
                            </div>
                        </div>
                        <p class="text">{{ __('More than $2 million paid out to users.') }}</p>
                    </div>
                    <div class="counter-item type-right">
                        <div class="counter">
                            <div class="number-counter">
                                <span class="number" data-speed="2500" data-to="10" 
                                          data-inviewport="yes">10</span>
                                <span class="plus">
                                    {{ __('K') }}
                                </span>
                            </div>
                        </div>
                        <p class="text">{{ __('10,000+ tasks completed daily.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /section success story -->


<section class="section-testimonials tf-spacing-1">
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="testimonials-inner">
                    <div class="heading-section mb-0">
                        <div class="title mb-4 wow fadeInUp" data-wow-delay="0s">
                            {{ __('What Our Users Say About Earning on MSENNSE') }}
                        </div>
                        <p>{{ __('Join thousands of users who are earning real money by completing simple tasks on MSENNSE. Start your journey today!') }}</p>
                    </div>
                    <div class="swiper-container mt--" data-swiper='{
                        "spaceBetween": 30,
                        "slidesPerView": 3,
                        "breakpoints": {
                            "300": {
                                "slidesPerView": 1
                            },
                            "550": {
                                "slidesPerView": 1.8
                            },
                            "768": {
                                "slidesPerView": 3
                            },
                            "1200": {
                                "slidesPerView": 3
                            },
                            "1400": {
                                "slidesPerView": 3
                            }
                        },
                        "pagination": {
                            "el": ".lottery-1",
                            "clickable": true
                        }
                    }'>
                        <div class="swiper-wrapper pb-0">
                            <div class="swiper-slide">
                                <div class="testimonial-item wow fadeInUp" data-wow-delay="0s">
                                    <div class="info">
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar/testimonials-1.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="name lh-32"><a href="#">{{ __('Robert Fox') }}</a></div>
                                            <p><span>{{ __('Earned $500') }}</span>, 25 November</p>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        “{{ __('I started using MSENNSE a month ago, and I’ve already earned $500 by completing simple tasks. It’s so easy to get started, and the payouts are quick!') }}“
                                    </p>
                                    <div class="trust">
                                        <div class="icon">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <p class="verified fs-12">
                                            <i class="icon-check-1"></i>
                                            {{ __('Verified Earnings') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="info">
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar/testimonials-4.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="name lh-32"><a href="#">{{ __('Wade Warren') }}</a></div>
                                            <p><span>{{ __('Earned $300') }}</span>, 25 November</p>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        “{{ __('MSENNSE is a game-changer! I’ve been able to earn extra income by completing tasks in my free time. The platform is user-friendly, and the support team is amazing.') }}“
                                    </p>
                                    <div class="trust">
                                        <div class="icon">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <p class="verified fs-12">
                                            <i class="icon-check-1"></i>
                                            {{ __('Verified Earnings') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="info">
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar/testimonials-3.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="name lh-32"><a href="#">{{ __('Albert Flores') }}</a></div>
                                            <p><span>{{ __('Earned $750') }}</span>, 25 November</p>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        “{{ __('I was skeptical at first, but MSENNSE has proven to be a legitimate way to earn money. I’ve made $750 in just two months by completing tasks. Highly recommend it!') }}“
                                    </p>
                                    <div class="trust">
                                        <div class="icon">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <p class="verified">
                                            <i class="icon-check-1 fs-12"></i>
                                            {{ __('Verified Earnings') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="info">
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar/testimonials-1.jpg') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="name lh-32"><a href="#">{{ __('Robert Fox') }}</a></div>
                                            <p><span>{{ __('Earned $200') }}</span>, 25 November</p>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        “{{ __('MSENNSE is perfect for anyone looking to make some extra cash. I’ve earned $200 in my first month, and I’m excited to see how much more I can make!') }}“
                                    </p>
                                    <div class="trust">
                                        <div class="icon">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <p class="verified fs-12">
                                            <i class="icon-check-1"></i>
                                            {{ __('Verified Earnings') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="info">
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar/testimonials-4.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="name lh-32"><a href="#">{{ __('Wade Warren') }}</a></div>
                                            <p><span>{{ __('Earned $450') }}</span>, 25 November</p>
                                        </div>
                                    </div>
                                    <p class="desc">
                                        “{{ __('I love how flexible MSENNSE is. I can complete tasks whenever I have time, and the earnings add up quickly. I’ve made $450 so far, and I’m just getting started!') }}“
                                    </p>
                                    <div class="trust">
                                        <div class="icon">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div>
                                        <p class="verified fs-12">
                                            <i class="icon-check-1"></i>
                                            {{ __('Verified Earnings') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="swiper-pagination style-1 lottery-1 pagination-rectangle pt-31">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-banner tf-spacing-1">
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="banner-inner style-2">
                    <div class="banner-left">
                        <div class="time">
                            {{-- <span class="js-countdown" data-timer="290603"></span> --}}
                        </div>
                        <div class="banner">
                            <span>{{ __('Earn Real Money with MSENNSE') }}</span>
                        </div>
                        <div class="text-giveaway wow fadeInUp" data-wow-delay="0s">
                            {{ __('Complete Tasks & Win Big!') }}
                        </div>
                        <div class="text">{{ __('How to earn money? 5 simple steps to get started:') }}</div>
                        <ol class="steps">
                            <li>{{ __('Sign up on MSENNSE') }}</li>
                        </ol>
                        <a href="{{ route('tasks') }}" class="tf-btn">{{ __('Start Earning Now') }} <i class="icon-right"></i></a>
                    </div>
                    <div class="banner-img">
                        <div class="image-1">
                            <img src="{{ asset('images/icon/banner-2-item.png') }}"
                                 data-src="{{ asset('images/icon/banner-2-item.png') }}" alt="" class="lazyload">
                        </div>
                        <div class="image-2">
                            <img src="{{ asset('images/item/coin-banner-2-1.png') }}"
                                 data-src="{{ asset('images/item/coin-banner-2-1.png') }}" alt="" class="lazyload">
                        </div>
                        <div class="image-3">
                            <img src="{{ asset('images/item/coin-banner-2-2.png') }}"
                                 data-src="{{ asset('images/item/coin-banner-2-2.png') }}" alt="" class="lazyload">
                        </div>
                        <div class="image-4">
                            <img src="{{ asset('images/item/coin-banner-2-3.png') }}"
                                 data-src="{{ asset('images/item/coin-banner-2-3.png') }}" alt="" class="lazyload">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section-faq -->
<section class="section-faq tf-spacing-1">
    <div class="tf-container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <div class="title wow fadeInUp" data-wow-delay="0s">
                        {{ __('Frequently Asked Questions') }}
                    </div>
                    <p class="desc">
                        {{ __('We\'re here to help! If you can\'t find the answer you\'re looking for, please contact us via email at') }} <a href="mailto:{{ get_option('email','') }}">{{ get_option('email','') }}</a> {{ __('or by phone at') }}
                        <span>{{ get_option('phone','') }} </span>
                    </p>
                </div>
                <div class="wrap-image">
                    <img class="lazyload" data-src="{{ asset('images/banner/faq.png') }}"
                         src="{{ asset('images/banner/faq.png') }}" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="tf-accordion1 has-bg">
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('How do I sign up and start earning on MSENNSE?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Signing up on MSENNSE is easy! Just create an account, verify your email, and start completing tasks like text typing, photography, math quizzes, and video watching. Each task you complete earns you money.') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1 active">
                        <div class="toggle-title active">
                            <div class="title"><i class="icon-question"></i>{{ __('What types of tasks can I do to earn money?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('MSENNSE offers a variety of tasks to suit your skills and interests. You can earn money by completing tasks such as text typing, photography, math quizzes, video watching, and more. New tasks are added regularly to keep things exciting!') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('How do I withdraw my earnings?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Once you’ve earned money by completing tasks, you can withdraw your earnings directly to your bank account, PayPal, or other supported payment methods. Simply go to the "Withdraw" section in your account and follow the instructions.') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('Is MSENNSE free to use?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Yes, MSENNSE is completely free to join and use. There are no hidden fees or charges. Simply sign up, complete tasks, and start earning money!') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('How much can I earn on MSENNSE?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Your earnings depend on the tasks you complete and how much time you invest. Some users earn a few dollars a day, while others make hundreds monthly. The more tasks you complete, the more you can earn!') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('Are there any tips to maximize my earnings?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('To maximize your earnings, check the platform regularly for new tasks, complete tasks accurately, and refer friends to join MSENNSE. You can also participate in bonus challenges and promotions to earn extra money.') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('Is my personal information safe on MSENNSE?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Yes, your personal information is safe with us. MSENNSE uses advanced security measures to protect your data and ensure a safe earning experience.') }}</p>
                        </div>
                    </div>
                    <div class="tf-toggle1">
                        <div class="toggle-title">
                            <div class="title"><i class="icon-question"></i>{{ __('Can I refer friends to earn more?') }}</div>
                            <div class="icon"></div>
                        </div>
                        <div class="toggle-content">
                            <p>{{ __('Absolutely! MSENNSE has a referral program where you can earn bonuses for inviting friends to join. Share your referral link, and when they sign up and complete tasks, you’ll earn extra money.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /section-faq  -->
<section class="section-support">
    <div class="tf-container">
        <div class="row">
            <div class="heading-section">
                <div class="title">
                    {{ __('Customer Support') }}
                </div>
                <p>{{ __('Have a question or need help? Contact our friendly support team for assistance with earning money on MSENNSE.') }}</p>
            </div>
            <div class="col-md-6">
                <div class="customer-support-item wow fadeInUp" data-wow-delay="0s">
                    <div class="icon">
                        <img src="{{ asset('images/icon/customer-support-item-icon-1.png') }}"
                             data-src="{{ asset('images/icon/customer-support-item-icon-1.png') }}" alt="" class="lazyload">
                    </div>
                    <div class="customer-support-item-content">
                        <h4 class="title">
                            {{ __('Talk to our support team') }}
                        </h4>
                        <div class="customer-support-item-text">
                            {{ __('Got a question about earning money or completing tasks? Our friendly support team is here to help you every step of the way.') }}
                        </div>
                        <div class="btn-customer-support-item">
                            <a href="#" class="tf-btn">{{ __('Contact us') }} <i class="icon-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="customer-support-item wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon">
                        <img src="{{ asset('images/icon/customer-support-item-icon-2.png') }}"
                             data-src="{{ asset('images/icon/customer-support-item-icon-2.png') }}" alt="" class="lazyload">
                    </div>
                    <div class="customer-support-item-content">
                        <h4 class="title">
                            {{ __('Our Guide to Earning on MSENNSE') }}
                        </h4>
                        <div class="customer-support-item-text">
                            {{ __('Check out our FAQ section for tips on how to maximize your earnings, complete tasks, and withdraw your money.') }}
                        </div>
                        <div class="btn-customer-support-item">
                            <a href="#" class="tf-btn">{{ __('Help center') }} <i class="icon-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
</div>




@stop



