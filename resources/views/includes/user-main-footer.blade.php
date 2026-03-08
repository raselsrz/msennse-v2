<!-- section-dowload-app -->
<div class="tf-container">
    <div class="row">
        <div class="col-12">
            <section class="section-dowload-app">
                <div class="wrapper">
                    <div class="content">
                        <div class="title wow fadeInUp">{{__('Earn Money Anytime,')}} <br>
                            {{__('Anywhere, Even on the Go')}}</div>
                        <p class="wow fadeInUp">
                            {{__('Complete tasks and earn money anytime, anywhere with our convenient mobile app.')}}
                            <br> {{__('Download now and start earning today!')}}</p>
                    </div>
                    {{-- <div class="bottom wow fadeInUp">
                        <div class="btn-dowload">
                            <a href="#"><img src="images/item/Android.jpg" alt=""></a>
                        </div>
                        <div class="btn-dowload">
                            <a href="#"><img src="images/item/IOS.jpg" alt=""></a>
                        </div>
                    </div> --}}
                    {{-- <div class="item-1 wow fadeInRight" data-wow-delay="0.3s" data-wow-duration="4s">
                        <img src="images/item/phone.png" alt="">
                    </div> --}}
                    <div class="item coin-1 wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="3s">
                        <img src="images/item/coin-1.png" alt="">
                    </div>
                    <div class="item coin-2 wow fadeInLeft" data-wow-delay="1s" data-wow-duration="3s">
                        <img src="images/item/coin-2.png" alt="">
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- /section-dowload-app -->
<!-- footer -->
<footer id="footer" class="footer-dashboard">
    <div class="footer-about">
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-about-inner">
                        <div class="footer-menu">
                            <div class="footer-logo">
                                <a href="{{ route('dashboard') }}">
                                    <img src="{{ get_option('logo') }}" alt="logo"
                                        data-retina="{{ get_option('logo') }}">
                                </a>
                            </div>
                            <ul class="menu overflow-x-auto">
                                <li><a href="{{ route('home') }}">{{__('HOME')}}</a></li>
                                <li><a href="{{ route('about') }}">{{__('ABOUT')}}</a></li>
                                <li><a href="{{ route('blog') }}">{{__('BLOG')}}</a></li>
                                <li><a href="{{ route('contact') }}">{{__('CONTACT')}}</a></li>
                            </ul>
                        </div>
                        <div class="content">
                            <p class="mb-20">
                                {{__('At MSENNSE, we believe in empowering individuals to earn money through simple, creative, and engaging tasks. Whether you’re looking to make extra income or turn your skills into cash, our platform offers a variety of opportunities to suit your interests and abilities.')}}
                            </p>
                            <p class="mb-20">
                                {{__('From text typing and photography to math quizzes and video watching, MSENNSE provides a seamless way to earn money anytime, anywhere. Our user-friendly platform ensures that everyone, regardless of experience, can participate and start earning. Join us today and take the first step toward financial independence!')}}
                            </p>
                            <div class="note"><i
                                    class="icon-infor"></i>{{__('Earning money requires effort and dedication. Please use our platform responsibly and enjoy the rewards of your hard work.')}}
                            </div>
                        </div>
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
                            {{__('MSENNSE')}}
                        </div>
                        <ul>
                            <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                            <li><a href="{{ route('about') }}">{{__('About us')}}</a></li>
                            <li><a href="{{ route('blog') }}">{{__('Latest News')}}</a></li>
                            <li><a href="{{ route('contact') }}">{{__('Careers')}}</a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer">
                        <div class="widget-title">
                            {{__('Useful Information')}}
                        </div>
                        <ul>
                            <li><a href="faq.html">{{__('Find a store')}}</a></li>
                            <li><a href="faq.html">{{__('FAQ')}}</a></li>
                            <li><a href="#">{{__('How to claim your prize')}}</a></li>
                            <li><a href="faq.html">{{__('Unclaimed prizes')}}</a></li>
                            <li><a href="faq.html">{{__('How to play - Games Info')}}</a></li>
                            <li><a href="faq.html">{{__('Games End Notices')}}</a></li>
                            <li><a href="faq.html">{{__('Syndicates')}}</a></li>
                            <li><a href="faq.html">{{__('Supported Browsers')}}</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer dowload-app">
                        {{-- <div class="widget-title">
                            {{__('Download the app')}}
                        </div>
                        <div class="button-dowload">
                            <a class="ios" href="#">
                                <img src="images/item/IOS.jpg" alt="">
                            </a>
                            <a class="android" href="#">
                                <img src="images/item/Android.jpg" alt="">
                            </a>
                        </div> --}}
                        <div class="bottom">
                            <div class="widget-title">
                                {{__('Find us')}}
                            </div>
                            <ul class="tf-social">
                                <li><a href="{{get_option('facebook', '')}}" target="_blank"><i
                                            class="icon-facebook"></i></a></li>
                                <li><a href="{{get_option('twitter', '')}}" target="_blank"><i
                                            class="icon-twitter"></i></a></li>
                                <li><a href="{{get_option('tiktok', '')}}" target="_blank"><i
                                            class="icon-tiktok"></i></a></li>
                                <li><a href="{{get_option('youtube', '')}}" target="_blank"><i
                                            class="icon-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-footer help">
                        <div class="widget-title">
                            {{__('How can we help?')}}
                        </div>
                        <a class="tf-btn" href="{{ route('contact') }}">
                            {{__('Contact us')}} <i class="icon-right"></i></a>
                        <p>{{__('If you can’t find answer to your question, fill your query & submit, or you can always contact us. We answer to you shortly')}}
                        </p>
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
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 17.5C11.6625 17.4999 13.2779 16.9477 14.5925 15.93C15.9072 14.9124 16.8466 13.4869 17.2633 11.8775M10 17.5C8.33751 17.4999 6.72212 16.9477 5.40748 15.93C4.09284 14.9124 3.1534 13.4869 2.73667 11.8775M10 17.5C12.0708 17.5 13.75 14.1417 13.75 10C13.75 5.85833 12.0708 2.5 10 2.5M10 17.5C7.92917 17.5 6.25 14.1417 6.25 10C6.25 5.85833 7.92917 2.5 10 2.5M17.2633 11.8775C17.4175 11.2775 17.5 10.6483 17.5 10C17.5021 8.71009 17.1699 7.44166 16.5358 6.31833M17.2633 11.8775C15.041 13.1095 12.541 13.754 10 13.75C7.365 13.75 4.88917 13.0708 2.73667 11.8775M2.73667 11.8775C2.57896 11.2641 2.49944 10.6333 2.5 10C2.5 8.6625 2.85 7.40583 3.46417 6.31833M10 2.5C11.3302 2.49945 12.6366 2.8528 13.7852 3.5238C14.9337 4.19481 15.8831 5.15931 16.5358 6.31833M10 2.5C8.6698 2.49945 7.3634 2.8528 6.21484 3.5238C5.06628 4.19481 4.11692 5.15931 3.46417 6.31833M16.5358 6.31833C14.7214 7.88994 12.4004 8.75345 10 8.75C7.50167 8.75 5.21667 7.83333 3.46417 6.31833"
                                        stroke="#7791BA" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="tf-dropdown-sort tf-languages" data-bs-toggle="dropdown">
                                <div class="btn-select">
                                    <span class="text-sort-value">{{__('English')}}</span>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="select-item active">
                                        <span class="text-value-item">{{__('English')}}</span>
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
                            <span>©
                                <script>document.write(new Date().getFullYear())</script> MSENNSE.
                                {{__('All rights reserved.')}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->