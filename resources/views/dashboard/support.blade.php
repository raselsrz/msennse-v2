@extends('layouts.profile')
@section('content')




            <!-- main-content -->
            <div class="main-content-dashboard-wrap gap80">
              

    @include('includes.user-left-menu')


                <!-- main-content -->
                <div class="main-content-dashboard">

                    <!-- page-heading -->
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-heading">
                                    <h2 class="fw-9 wow fadeInUp">{{__('Support')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page-heading -->


                    <!-- Popular topics -->
                    <section class="section-popular-topics">
                        <div class="tf-container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-dashboard mb-30 letter-space1 wow fadeInUp">
                                        {{__('Help Center')}}
                                    </div>

                                    <div class="text-1 mb-30 wow fadeInUp">
                                        {{__('Welcome to the MSENNSE Help Center. Find answers to your questions and get the help you need.')}}

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="grid-column-4">


                                        <div class="getstart-item style-1 type-topic color-14 hover-item">
                                           <a  target="_blank" href="{{get_option('telegram', '')}}">
                                            <div class="wrap-image ">
                                                <img src="images/icon/Telegram.svg.webp" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="title"><a  target="_blank" href="{{get_option('telegram', '')}}">{{__('Telegram')}}</a></div>
                                            </div>
                                           </a>
                                        </div>

                                        <div class="getstart-item style-1 type-topic color-14 hover-item">
                                            <a  target="_blank" href="{{get_option('facebook', '')}}">
                                             <div class="wrap-image ">
                                                 <img src="images/icon/facebbok.png" alt="">
                                             </div>
                                             <div class="content">
                                                 <div class="title"><a  target="_blank" href="{{get_option('facebook', '')}}">{{__('Facebook')}}</a></div>
                                             </div>
                                            </a>
                                         </div>


                                         <div class="getstart-item style-1 type-topic color-14 hover-item">
                                            <a  target="_blank" href="{{get_option('facebook', '')}}">
                                             <div class="wrap-image ">
                                                 <img src="images/icon/Instagram.webp" alt="">
                                             </div>
                                             <div class="content">
                                                 <div class="title"><a  target="_blank" href="{{get_option('facebook', '')}}">{{__('Instagram')}}</a></div>
                                             </div>
                                            </a>
                                         </div>


                                         <div class="getstart-item style-1 type-topic color-14 hover-item">
                                            <a  target="_blank" href="{{get_option('youtube', '')}}">
                                             <div class="wrap-image ">
                                                 <img src="images/icon/youtube.webp" alt="">
                                             </div>
                                             <div class="content">
                                                 <div class="title"><a  target="_blank" href="{{get_option('youtube', '')}}">{{__('Youtube')}}</a></div>
                                             </div>
                                            </a>
                                         </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Popular topics -->

                    <!-- /section-common-question -->
                    <section class="section-support">
                        <div class="tf-container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-30">
                                        <div class="heading-dashboard mb-6 wow fadeInUp">{{__('
                                            You Still Have A Question?')}}
                                        </div>
                                        <div class="text-1  wow fadeInUp">
                                            {{__('If you can’t find answer to your question,
                                            fill your query &
                                            submit, or you can always contact us. We answer to you shortly')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="customer-support-item page-support wow fadeInUp">
                                        <div class="icon">
                                            <img src="images/icon/customer-support-item-icon-1.png"
                                                data-src="images/icon/customer-support-item-icon-1.png" alt=""
                                                class="lazyload">
                                        </div>
                                        <div class="customer-support-item-content">
                                            <h4 class="title">
                                                {{__('Talk to our support team')}}
                                            </h4>
                                            <div class="customer-support-item-text">
                                                {{__('Got a question about earning money or completing tasks? Our friendly support team is here to help you every step of the way.')}}
                                            </div>
                                            <div class="btn-customer-support-item">
                                                <a href="{{ route('contact') }} " class="tf-btn">Contact us <i
                                                        class="icon-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customer-support-item page-support wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="icon">
                                            <img src="images/icon/customer-support-item-icon-2.png"
                                                data-src="images/icon/customer-support-item-icon-2.png" alt=""
                                                class="lazyload">
                                        </div>
                                        <div class="customer-support-item-content">
                                            <h4 class="title">
                                               {{__(' Our Guide to Lode.')}}
                                            </h4>
                                            <div class="customer-support-item-text">
                                               {{__(' Check out our FAQ section for tips on how to maximize your earnings, complete tasks, and withdraw your money.')}}
                                            </div>
                                            <div class="btn-customer-support-item">
                                                <a href="{{ route('contact') }}" class="tf-btn">{{__('Help center')}}<i
                                                        class="icon-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                    @include('includes.user-main-footer')
                    

                </div>
                <!-- /main-content -->
            </div>
            <!-- /main-content -->


            @stop