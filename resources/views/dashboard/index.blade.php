@extends('layouts.profile')
@section('content')


<!-- main-content -->
<div class="main-content-dashboard-wrap">

    
    @include('includes.user-left-menu')


    <!-- main-content -->
    <div class="main-content-dashboard gap80">

        <!-- page-title-dashboard -->
       <section class="">
            <div class="tf-container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-dashboard">
                            <div class="swiper-container" data-swiper='{
                                "spaceBetween": 0,
                                "slidesPerView": 1,
                                "pagination": {
                                    "el": ".page-title-pagination",
                                    "clickable": true
                                }
                            }'>
                                <div class="swiper-wrapper">
                                    <!-- Slide 1: Earn with Simple Tasks -->
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <!--<img src="images/slider/dashboard-1.png" alt="">-->
                                            <h4 class="fw-9 title">
                                                {{__('Earn Money with Simple Tasks')}} <br>
                                                {{__('Start Earning in Minutes!')}}
                                            </h4>
                                            <p class="text-color-clip sileder-clip-text  style-2 type-color-1 ">
                                                <span class="d-block animationtext letters rotate-3">
                                                    <span class="cd-words-wrapper">
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-visible">{{__('$30+ Daily*')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('$210+ Weekly*')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('$900+ Monthly*')}}</span>
                                                    </span>
                                                </span>
                                            </p>
                                            <div class="bot">
                                                <a class="tf-btn style-lg" href="{{ route('tasks') }}"><span>{{__('Start from $4')}}</span><i class="icon-right"></i></a>
                                                <div class="sub">{{__('*Earnings vary based on tasks')}}</div>
                                            </div>
                                            <div class="image">
                                                {{-- <img class="lazyload" data-src="images/slider/dashboard-2.png" src="images/slider/dashboard-2.png" alt=""> --}}
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Slide 2: Creative Tasks for Big Rewards -->
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <!--<img src="images/slider/dashboard-1.png" alt="">-->
                                            <h4 class="fw-9 title">
                                                {{__('Unlock Big Rewards')}} <br>
                                                {{__('with Creative Tasks!')}}
                                            </h4>
                                            <p class="text-color-clip sileder-clip-text  style-2 type-color-1 ">
                                                <span class="d-block animationtext letters rotate-3">
                                                    <span class="cd-words-wrapper">
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-visible">{{__('Photography')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('Video Creation')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('Math Quez')}}</span>
                                                    </span>
                                                </span>
                                            </p>
                                            <div class="bot">
                                                <a class="tf-btn style-lg" href="{{ route('tasks') }}"><span>{{__('Earn Up to $10')}}</span><i class="icon-right"></i></a>
                                                <div class="sub">{{__('*Per task')}}</div>
                                            </div>
                                            <div class="image">
                                                {{-- <img class="lazyload" data-src="images/slider/dashboard-2.png" src="images/slider/dashboard-2.png" alt=""> --}}
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Slide 3: Fun Activities, Real Earnings -->
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <!--<img src="images/slider/dashboard-1.png" alt="">-->
                                            <h4 class="fw-9 title">
                                                {{__('Fun Activities, Real Earnings')}} <br>
                                                {{__('Turn Your Time into Cash!')}}
                                            </h4>
                                            <p class="text-color-clip sileder-clip-text style-2 type-color-1 ">
                                                <span class="d-block animationtext letters rotate-3">
                                                    <span class="cd-words-wrapper">
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-visible">{{__('Watch Videos')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('Text Tepy')}}</span>
                                                        <span class="item-text text-color-clip style-2 type-color-1 is-hidden">{{__('Solve Quizzes')}}</span>
                                                    </span>
                                                </span>
                                            </p>
                                            <div class="bot">
                                                <a class="tf-btn style-lg" href="{{ route('tasks') }}"><span>{{__('Earn Instantly')}}</span><i class="icon-right"></i></a>
                                                <div class="sub">{{__('*No hidden fees')}}</div>
                                            </div>
                                            <div class="image">
                                                {{-- <img class="lazyload" data-src="images/slider/dashboard-2.png" src="images/slider/dashboard-2.png" alt=""> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="bottom">
                                    <div class="swiper-pagination page-title-pagination pagination-rectangle"></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /page-title-dashboard -->

        <!-- section-online-lottery -->
        <section class="section-online-lottery">
            <div class="tf-container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section">
                            <div class="title wow fadeInUp" data-wow-delay="0s">
                                {{__('Welcome to MSENNSE')}}
                            </div>
                            <p class="fs-14">{{__('Start earning money with MSENNSE today!')}}</p>
                        </div>
                    </div>
                    {{-- <div class="wrap-our-jackpot">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="wg-our-jackpot">
                                    <div class="content">
                                        <div class="title">
                                            <h2 class="title">{{__('Top Earning Tasks')}}</h2>
                                        </div>
                                        <div class="price">
                                            <p class="sub">{{__('TOTAL EARNINGS')}}</p>
                                            <p class="text-color-clip fs-70">
                                                $140
                                                <span class="fs-40">{{__('thousand')}}</span>
                                            </p>
                                        </div>
                                        <div class="time">
                                            <p>{{__('New tasks added daily')}}</p>
                                            <span class="js-countdown" data-timer="290603"></span>
                                        </div>
                                    </div>
                                    <div class="wrap-image">
                                        <img src="images/section/our-jackpot-2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="wg-get-ticket">
                                    <h5 class="title">{{__('Ready to Earn?')}}</h5>
                                    <p class="text-color-clip style-2">
                                        {{__('Start Now!')}}
                                    </p>
                                    <div class="wrap-image">
                                        <img src="images/section/get-ticket.png" alt="">
                                    </div>
                                    <a href="#" class="tf-btn">{{__('Join MSENNSE')}}<i class="icon-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="grid-column-4">

                        <div class="wg-game style-6 mt-5">
                            <div class="wg-game-image">
                                <img src="{{asset('images/data/available.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title fw-9 mb-0">
                                    <a href="#">
                                        {{__('Available Amount')}}
                                    </a>
                                </h4>
                                <p class="money text-color-clip fs-50">
                                    ${{ auth()->user()->wallet_balance }}
                                </p>
                            </div>
                        </div>


                        <div class="wg-game style-6 mt-5">
                            <div class="wg-game-image">
                                <img src="{{asset('images/data/total-referr.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title fw-9 mb-0">
                                    <a href="#">
                                        {{__('Total Referral')}}
                                    </a>
                                </h4>
                                <p class="money text-color-clip fs-50">
                                    {{ Auth::user()->referral_count }}
                                </p>
                            </div>
                        </div>


                        <div class="wg-game style-6 mt-5">
                            <div class="wg-game-image">
                                <img src="{{asset('images/data/reffar-eran.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title fw-9 mb-0">
                                    <a href="#">
                                        {{__('Referral Earnings')}}
                                    </a>
                                </h4>
                                <p class="money text-color-clip fs-50">
                                    ${{ Auth::user()->referral_earnings }}
                                </p>
                            </div>
                        </div>


                        <div class="wg-game style-6 mt-5">
                            <div class="wg-game-image">
                                <img src="{{asset('images/data/withdraw.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title fw-9 mb-0">
                                    <a href="#">
                                        {{__('Total Withdrawn')}}
                                    </a>
                                </h4>
                                <p class="money text-color-clip fs-50">
                                    ${{Auth::user()->total_withdrawn }}
                                </p>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </section>
        <!-- /section-online-lottery -->

        <!-- table-lottery-results -->
        {{-- <section class="">
            <div class="tf-container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section">
                            <div class="title wow fadeInUp" data-wow-delay="0s">
                                {{__('Online lottery results')}}
                            </div>
                            <p class="fs-14">{{__('Check your ticket number\'s to see if you are a Winner in the Dream Lottery.')}}</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-lottery-results mb-40">
                            <div class="title">
                                <div>{{__('Lottery')}}</div>
                                <div>{{__('Winners')}}</div>
                                <div>{{__('Time')}}</div>
                                <div>{{__('Winning numbers')}}</div>
                            </div>
                            <div class="item-table">
                                <div><a href="#">{{__('Australia - Monday Lotto')}}</a></div>
                                <div><a href="#">{{__('Eleanor Pena')}}</a></div>
                                <div>{{__('01 Jan 17:30')}}</div>
                                <div>
                                    <ul class="number-list">
                                        <li>12</li>
                                        <li>88</li>
                                        <li>26</li>
                                        <li>95</li>
                                        <li>47</li>
                                        <li class="active">17</li>
                                        <li class="active">34</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Repeat similar structure for other item-table sections -->
                        </div>
                        <ul class="wg-pagination">
                            <li><a href="#"><i class="icon-back"></i></a></li>
                            <li><a href="#">{{__('1')}}</a></li>
                            <li><a href="#">{{__('2')}}</a></li>
                            <li class="active"><a href="#">{{__('3')}}</a></li>
                            <li><a href="#">{{__('4')}}</a></li>
                            <li><a href="#">{{__('...')}}</a></li>
                            <li><a href="#"><i class="icon-next"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- /table-lottery-results -->

        @include('includes.user-main-footer')
    </div>
    <!-- /main-content -->
</div>



@stop


@push('css')

<style>


@media (max-width: 991px) {
    .sileder-clip-text span {
        display: none !important;
    }
}


</style>


@endpush


@push('js')

<script>

// document.addEventListener("DOMContentLoaded", function () {
//     var swiper = new Swiper(".swiper-container", {
//         spaceBetween: 0,
//         slidesPerView: 1,
//         loop: true,
//         pagination: {
//             el: ".page-title-pagination",
//             clickable: true,
//         },
//         autoplay: {
//             delay: 3000,
//             disableOnInteraction: false,
//         },
//     });
// });



</script>


@endpush

