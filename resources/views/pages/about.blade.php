@extends('layouts.default')
@section('content')

<style>

.about_img img{ 
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    z-index: 1;
    padding: 20px;
    margin-top: 20px;
}


</style>


        <!-- page-title -->
        <div class="page-title page-about-us">
            <div class="tf-tsparticles">
                <div id="tsparticles1" data-color="#fff" data-line="#fff"></div>
            </div>
            <div class="tf-container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="title">{{ __('About Us') }}</h1>
                            <ul class="breadcrumbs">
                                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li><i class="icon-next"></i></li>
                                <li>{{ __('About us') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->


        <!-- main content -->
        <div class="main-content">

            <!-- section about -->
<!-- section about -->
            <section class="s-about tf-spacing-1">
                <div class="tf-container">
                    <div class="row justify-center">
                        <div class="col-lg-12 justify-center">
                            <div class="wrap-about-us justify-center">
                                <p class="text">{{ __('At MSENNSE, we empower individuals to earn money by completing simple and engaging tasks. Whether you’re typing text, taking photos, solving math quizzes, or watching videos, our platform offers a variety of ways to turn your skills into cash. Join thousands of users who are already earning real money with MSENNSE.') }}</p>
                                <div class="wrap-image">
                                    <img class="lazyload" data-src="images/section/about-1.jpg"
                                        src="images/section/about-1.jpg" alt="">
                                </div>
                                <div class="blockquote">
                                    <div class="wrap-paragraph">
                                        <p class="paragraph-1">{{ __('MSENNSE is a trusted platform where users can earn money by completing tasks. From text typing to photography, math quizzes, and video watching, we offer a wide range of tasks to suit your skills and interests.') }}</p>
                                        <p class="paragraph-2">
                                            {{ __('Since our launch, we’ve been committed to providing a seamless and rewarding experience for our users. With secure payments, 24/7 support, and a growing community, MSENNSE is your go-to platform for earning money online.') }}
                                        </p>
                                        <div class="info">
                                            <div class="avatar">
                                                <img src="images/avatar/about-1.jpg" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="name"><a href="#">{{ __('John F. Davis') }}</a></div>
                                                <p>{{ __('Founder & CEO at MSENNSE') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-2">
                                        <svg width="65" height="57" viewBox="0 0 65 57" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 28.5V56.3572H27.8572V28.5H9.28578C9.28578 18.2599 17.6171 9.92861 27.8572 9.92861V0.642822C12.4958 0.642822 0 13.1386 0 28.5ZM65 9.92861V0.642822C49.6386 0.642822 37.1428 13.1386 37.1428 28.5V56.3572H65V28.5H46.4286C46.4286 18.2599 54.7599 9.92861 65 9.92861Z"
                                                fill="#FE8C45"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="item-1">
                                    <img src="images/item/about-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /section about -->


            <!-- section how it works -->
            <section class="s-how-it-work">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section mb-40">
                                <h2 class="title mb-6">
                                    {{ __('How it works') }}
                                </h2>
                                <p class="sub-title fs-14">
                                    {{ __('Earn money on MSENNSE in just 3 easy steps!') }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="wg-how-it-work grid-column-3 style-2">
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-1.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Sign up for free') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('Create your MSENNSE account in minutes. It’s free, easy, and secure.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-2.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Complete tasks') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('Choose from tasks like text typing, photography, math quizzes, and video watching.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-3.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Earn money') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('Get paid for every task you complete. Withdraw your earnings securely and quickly.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-4.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Explore more tasks') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('Discover new tasks daily and maximize your earnings.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-5.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Refer friends') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('Earn bonuses by inviting friends to join MSENNSE.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-item hover-item">
                                    <div class="image-item">
                                        <img src="./images/item/how-it-work-6.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title fw-9">
                                            <a href="how-to-work.html">{{ __('Grow your income') }}</a>
                                        </h4>
                                        <p class="text type-secondary fs-14">
                                            {{ __('The more tasks you complete, the more you earn. Start growing your income today!') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /section how it works -->

            <!-- section success story -->
            <section class="s-succes-story tf-spacing-2">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section mb-40">
                                <h2 class="title mb-6">
                                    {{ __('Success Story') }}
                                </h2>
                                <p class="sub-title fs-14">
                                    {{ __('Our success stories - What our users have achieved') }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="wg-counter">
                                <div class="counter-item type-left">
                                    <div class="counter">
                                        <div class="number-counter">
                                            <span class="number" data-speed="2500" data-to="500" data-inviewport="yes">500</span>
                                            <span class="plus">K</span>
                                        </div>
                                    </div>
                                    <p class="text">{{ __('Over 500,000 tasks completed by users.') }}</p>
                                </div>
                                <div class="counter-item type-center">
                                    <div class="counter">
                                        <div class="number-counter">
                                            <span class="number" data-speed="2500" data-to="10" data-inviewport="yes">10</span>
                                            <span class="plus">M</span>
                                        </div>
                                    </div>
                                    <p class="text">{{ __('More than $10 million earned by our users.') }}</p>
                                </div>
                                <div class="counter-item type-right">
                                    <div class="counter">
                                        <div class="number-counter">
                                            <span class="number" data-speed="2500" data-to="1" data-inviewport="yes">1</span>
                                            <span class="plus">M</span>
                                        </div>
                                    </div>
                                    <p class="text">{{ __('1 million+ users trust MSENNSE to earn money.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /section success story -->


            <!-- section play the biggest -->
            <section class="s-play-the-biggest tf-spacing-2">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="content-left">
                                <div class="heading-section mb-40 text-left">
                                    <h2 class="title mb-6">
                                        {{ __('Earn Money with MSENNSE') }}
                                    </h2>
                                    <p class="sub-title fs-14">
                                        {{ __('We offer users the opportunity to earn money by completing simple and engaging tasks. Here’s what makes MSENNSE unique:') }}
                                    </p>
                                </div>
                                <ul class="list">
                                    <li class="item wow hover-item fadeInUp" data-wow-delay="0s">
                                        <div class="image-item">
                                            <img src="./images/item/play-biggest-1.png" alt="">
                                        </div>
                                        <div class="text-details">
                                            <h4 class="mb-16 fw-9">
                                                <a href="#">{{ __('Wide Variety of Tasks') }}</a>
                                            </h4>
                                            <p class="text fs-14 type-secondary">
                                                {{ __('From text typing and photography to math quizzes and video watching, MSENNSE offers a diverse range of tasks to suit your skills and interests.') }}
                                            </p>
                                        </div>
                                    </li>
                                    <li class="item wow hover-item fadeInUp" data-wow-delay="0s">
                                        <div class="image-item">
                                            <img src="./images/item/play-biggest-2.png" alt="">
                                        </div>
                                        <div class="text-details">
                                            <h4 class="mb-16 fw-9">
                                                <a href="#">{{ __('Secure and Reliable') }}</a>
                                            </h4>
                                            <p class="text fs-14 type-secondary">
                                                {{ __('MSENNSE ensures secure payments and a reliable platform for users to earn money. Your earnings are safe with us.') }}
                                            </p>
                                        </div>
                                    </li>
                                    <li class="item wow hover-item fadeInUp" data-wow-delay="0s">
                                        <div class="image-item">
                                            <img src="./images/item/play-biggest-3.png" alt="">
                                        </div>
                                        <div class="text-details">
                                            <h4 class="mb-16 fw-9">
                                                <a href="#">{{ __('Flexible Earning Opportunities') }}</a>
                                            </h4>
                                            <p class="text fs-14 type-secondary">
                                                {{ __('Earn money anytime, anywhere. Whether you’re at home or on the go, MSENNSE provides flexible tasks to fit your schedule.') }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="image wow about_img fadeInRight" data-wow-delay="0s">
                                <img class="lazyload" src="{{ asset('images/banner/team4.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /section play the biggest -->
            
<!-- section our mission -->
<section class="s-our-mission s-get-started tf-spacing-2">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section mb-40">
                    <h1 class="title fw-9 fs-50 mb-8">{{ __('Our Mission') }}</h1>
                    <p class="sub-title fw-4 fs-14">{{ __('Empowering users to earn money through tasks') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="getstart-item style-2 color-4 fs-16 type-1 wow fadeInUp" data-wow-delay="0s">
                    <div class="wrapper hover-item">
                        <div class="wrap-image image-item mb-30">
                            <img src="./images/section/our-mission-1.png" alt="">
                        </div>
                        <div class="content">
                            <div class="title"><a href="#">{{ __('Complete Tasks') }}</a></div>
                            <p>{{ __('Earn money by completing various tasks like text typing, photography, and more.') }}</p>
                        </div>
                    </div>
                    <p class="number text-color-clip style-4">01</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="getstart-item style-2 color-3 fs-16 type-1 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="wrapper hover-item">
                        <div class="wrap-image image-item mb-30">
                            <img src="./images/section/our-mission-2.png" alt="">
                        </div>
                        <div class="content">
                            <div class="title"><a href="#">{{ __('Earn Rewards') }}</a></div>
                            <p>{{ __('Get paid instantly for completing engaging and simple tasks.') }}</p>
                        </div>
                    </div>
                    <p class="number text-color-clip style-4">02</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="getstart-item style-2 color-7 fs-16 type-1 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="wrapper hover-item">
                        <div class="wrap-image image-item mb-30">
                            <img src="./images/section/our-mission-3.png" alt="">
                        </div>
                        <div class="content">
                            <div class="title"><a href="#">{{ __('Grow Your Income') }}</a></div>
                            <p>{{ __('Increase your earnings by completing more tasks every day!') }}</p>
                        </div>
                    </div>
                    <p class="number text-color-clip style-4">03</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /section our mission -->

        </div>
        <!-- /main-content -->



@stop