@extends('layouts.profile')
@section('content')


            <!-- main-content -->
            <div class="main-content-dashboard-wrap">

                @include('includes.user-left-menu')

                <!-- /section-menu-left-mobile -->
                <!-- main-content -->
                <div class="main-content-dashboard gap62">

                    <!-- page-heading -->
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-heading">
                                    <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Plans')}}</h2>
                                  
                                                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                        <span class="alert-text">{{Session::get('success')}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                        <span class="alert-text">{{Session::get('error')}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                @if(Session::has('balance_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                        <span class="alert-text">{{Session::get('balance_error')}} <a href="{{  route('diposit')  }} " style="font-weight: bold; color:black;" > Please deposit  </a> </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page-heading -->

                    <!-- my account contest -->
                    <div class="my-account-contest">
                        <div class="widget-tabs">
                            <div class="tf-container">
                                <div class="widget-content-tab">
                                    <div class="widget-content-inner active">
                                        <div class="row">
                                            @if(count($packages) == 0)
                                                <div class="col-md-4 mt-5">
                                                    <div class="wg-game style-5">
                                                        <div class="content">
                                                            <div class="heading">
                                                                <h4 class="title text-center fw-9 mb-0">
                                                                    {{__('Not Added')}}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                    
                                            @foreach ($packages as $package)
                                                <div class="col-md-4 mt-5">
                                                    <div class="wg-game style-5">
                                                        <form id="subscribe-form-{{ $package->id }}" action="{{ route('subscribe', ['plan_id' => $package->id]) }}" method="POST">
                                                            @csrf
                                                            <div class="content">
                                                                <div class="heading">
                                                                    <h4 class="title text-center fw-9 mb-0">{{ __($package->name) }}</h4>
                                                                    <ul class="sub-title-list">
                                                                        <li class="item"><i class="icon-ticket"></i>
                                                                            <p><span>{{__('Daily')}} {{ get_field('daily_work', 'plan', $package->id, '') }} {{__('Work')}}</span></p>
                                                                        </li>
                                                                        <li class="item"><i class="icon-ticket"></i>
                                                                            <p><span>{{__('Duration:')}} {{ $package->duration_days }} {{__('Days')}}</span></p>
                                                                        </li>
                                                                        <li class="item"><i class="bi bi-cash-coin"></i>
                                                                            <p><span>{{__('Total Eran:')}} ${{ get_field('total_price', 'plan', $package->id, '') }}</span></p>
                                                                        </li>
                                                                    </ul>
                                                                    <p class="money text-color-clip style-6">${{ number_format($package->price) }}</p>
                                                                    <button type="button" class="tf-btn w-100 confirm-purchase" data-id="{{ $package->id }}" data-price="{{ $package->price }}">
                                                                        ${{ number_format($package->price) }} {{__('Subscribe')}} <i class="icon-right"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                    
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function () {
                                                    document.querySelectorAll(".confirm-purchase").forEach(button => {
                                                        button.addEventListener("click", function () {
                                                            let planId = this.getAttribute("data-id");
                                                            let price = this.getAttribute("data-price");
                    
                                                            Swal.fire({
                                                                title: "{{__('Are you sure?')}}",
                                                                text: `{{__('You are about to purchase this package for')}} $${price}.`,
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonText: "{{__('Confirm')}}",
                                                                cancelButtonText: "{{__('Cancel')}}",
                                                                reverseButtons: true
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Submit the associated form
                                                                    document.getElementById(`subscribe-form-${planId}`).submit();
                                                                }
                                                            });
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /my account contest -->


                    @include('includes.user-main-footer')

                </div>
                <!-- /main-content -->
            </div>
            <!-- /main-content -->





@stop