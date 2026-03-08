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
                        <h2 class="fw-9">{{__('Affiliate')}}</h2>
                        <p>You will get ${{ get_option('refer_commission', '') }} dollar for each referral here.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-heading -->

        <!-- your information -->
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-dashboard page-affiliate mb-30 wow fadeInUp" data-wow-delay="0s">
                        {{__('Your Information')}}
                    </div>
                    <div class="wg-infomation mb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left mb-20-mobile">
                                    <div class="image">
                                            @if(auth()->user()->profile_image != null)
                                            <img src="{{ auth()->user()->profile_image }}" alt=""
                                                class="img-fluid">
                                            @else
                                            <img src="{{ asset('images/avatar/user-1.png') }}" alt="">
                                            @endif
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bot">
                                            <div class="item">
                                                <div class="item-icon">
                                                    <img src="{{asset('images/item/coin.png')}}" alt="">
                                                </div>
                                                <div>
                                                    <div class="price">${{ auth()->user()->wallet_balance }}</div>
                                                    <div class="sub">{{__('Available')}}</div>
                                                </div>
                                            </div>
                                            <a href="{{ route('withdraw') }}"
                                            class="tf-btn">{{__('Withdraw')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right">
                                    <div class="title">
                                        <i class="icon-statistics"></i>{{ __('Statistics') }}
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <div class="item-icon">
                                                    <img src="{{ asset('images/item/statistics-1.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <div class="price">${{ $totalEarnings }}</div>
                                                    <div class="sub">{{ __('Total Earnings') }}</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <div class="item-icon">
                                                    <img src="{{ asset('images/item/statistics-2.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <div class="price">{{ Auth::user()->referral_count }}</div>
                                                    <div class="sub">{{ __('Users Referred') }}</div>
                                                </div>
                                            </div>
                                        </li>
                                        {{-- <li>
                                            <div class="item">
                                                <div class="item-icon">
                                                    <img src="{{ asset('images/item/statistics-3.png') }}" alt="">
                                                </div>
                                                <div>
                                                    <div class="price">${{ $earningsLast30Days }}</div>
                                                    <div class="sub">{{ __('Earnings Last 30 Days') }}</div>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="the-vault-content mt-5">
                        <div class="right">
                            <div>
                                <div class="title">{{__('Your Referral Link')}}</div>
                                <div class="box-link style-1">
                                    <input id="referralLink" type="text" class="box-link-content" value="{{ url('/register?ref=' . auth()->user()->id) }}" readonly>
                                    <div class="button-coppy" onclick="copyReferral()">
                                        <i class="icon-coppy"></i>{{__('Copy Link')}}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="title">{{__('Share Your Referral Link')}}</div>
                                <div>
                                    <ul class="tf-social style-1">
                                        <li><a href="{{ get_option('facebook','')}} " target="_blank"><i class="icon-facebook"></i></a></li>
                                        <li><a href="{{ get_option('telegram','')}} " target="_blank"><i class="icon-send"></i></a></li>
                                        <li><a href="{{ get_option('linkedin','')}} " target="_blank"><i class="icon-linkedin2"></i></a></li>
                                        <li><a href="{{ get_option('twitter','')}} " target="_blank"><i class="icon-twitter"></i></a></li>
                                        <li><a href="{{ get_option('youtube','')}} " target="_blank"><i class="icon-youtube"></i></a></li>
                                        <li><a href="{{ get_option('tiktok','')}} " target="_blank"><i class="icon-tiktok"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /your information -->


        @include('includes.user-main-footer')

    </div>
    <!-- /main-content -->
</div>
<!-- /main-content -->



@stop


@push('css')


<style>

.the-vault-content .right .box-link .button-coppy{
    text-wrap: nowrap !important;
}

.wg-infomation .image img {
    border-radius: 50%;
    width: 90px !important;
    height: 90px !important;
}

@media (max-width: 767px) {
    .the-vault-content {
        margin-top: 45px !important;
    }
}

</style>

@endpush




@push('js')

<script>
    function copyReferral() {
        var copyText = document.getElementById("referralLink");

        // Select the text
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy text using the older execCommand method
        try {
            document.execCommand("copy");
            // Success notification
            Swal.fire({
                icon: 'success',
                title: 'Copied!',
                text: 'Your referral link has been copied.',
                timer: 1500,
                showConfirmButton: false
            });
        } catch (err) {
            // Error notification
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Unable to copy the referral link.',
                timer: 1500,
                showConfirmButton: false
            });
        }
    }
</script>


@endpush