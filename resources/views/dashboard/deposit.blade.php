@extends('layouts.profile')
@section('content')


<!-- main-content -->
<div class="main-content-dashboard-wrap">

    @include('includes.user-left-menu')

    <!-- main-content -->
    <div class="main-content-dashboard">

        <!-- page-heading -->
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="page-heading">
                        <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Deposit')}}</h2>

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                                <span class="alert-text
                                                                ">{{Session::get('success')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon
                                                                "><i class="bi bi-x-circle"></i></span>
                                <span class="alert-text
                                                                ">{{Session::get('error')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif


                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                                    <span class="alert-text
                                                                                        ">{{$error}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- /page-heading -->

        <!-- Lottery Online -->
        <section class="">
            <div class="widget-tabs page-dashboard-wallet">
                <div class="tf-container">
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <form class="wallet-deposit pt-3" action="{{ route('diposit') }}" method="POST"
                                accept="application/x-www-form-urlencoded">
                                @csrf
                                <div class="row d-flex number_diposit justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="currency-box number_pay_box mt--10">
                                            <input type="radio" id="usd" name="currency" checked />
                                            <div class="currency-box-content">
                                                <span class="btn-radio"></span>
                                                <div class="wallet-balance">
                                                    <div class="wallet-deposit">
                                                        <div class="balance">
                                                            <div class="balance-list">

                                                                <h5 class="title">{{__('Select Payment Method')}}</h5>

                                                                <div class="list">
                                                                    <div class="icon">
                                                                        <a href="{{ route('phonepe') }}" >
                                                                            <img src="images/payment/phonepe.png"
                                                                                data-src="images/payment/phonepe.png"
                                                                                alt="Visa" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('paytm') }}"
                                                                            >
                                                                            <img src="images/payment/paytm.png"
                                                                                data-src="images/payment/paytm.png"
                                                                                alt="Maestro" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('gpay') }}" >
                                                                            <img src="images/payment/gpay.png"
                                                                                data-src="images/payment/gpay.png"
                                                                                alt="Mastercard" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="list">
                                                                    <div class="icon">
                                                                        <a href="{{ route('esewa') }}" >
                                                                            <img src="images/payment/esewa.png"
                                                                                data-src="images/payment/esewa.png"
                                                                                alt="Visa" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('khalti') }}"
                                                                            >
                                                                            <img src="images/payment/khalti"
                                                                                data-src="images/payment/khalti.jpg"
                                                                                alt="Maestro" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('ime') }}" >
                                                                            <img src="images/payment/mie.png"
                                                                                data-src="images/payment/mie.png"
                                                                                alt="Mastercard" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="list">
                                                                    <div class="icon">
                                                                        <a href="{{ route('poli') }}" >
                                                                            <img src="images/payment/poli.png"
                                                                                data-src="images/payment/poli.png"
                                                                                alt="Visa" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('bpay') }}"
                                                                            >
                                                                            <img src="images/payment/BPAY.png"
                                                                                data-src="images/payment/BPAY.png"
                                                                                alt="Maestro" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('osko') }}" >
                                                                            <img src="images/payment/osko.png"
                                                                                data-src="images/payment/osko.png"
                                                                                alt="Mastercard" class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="list">
                                                                    <div class="icon">
                                                                        <a href="{{ route('erc20') }}">
                                                                            <img src="images/icon/erc.png"
                                                                                data-src="images/icon/erc.png"
                                                                                alt="Skrill" style="width: 50px;"
                                                                                class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('trc20') }}">
                                                                            <img src="images/icon/trc.png"
                                                                                data-src="images/icon/trc.png"
                                                                                alt="Neteller" style="width: 60px;"
                                                                                class="lazyload">
                                                                        </a>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <a href="{{ route('bep20') }}">
                                                                            <img src="images/icon/bep.png"
                                                                                data-src="images/icon/bep.png" alt="EPS"
                                                                                class="lazyload" style="width: 50px;">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="list">-->
                                                                <!--    <div class="icon">-->
                                                                <!--        <a href="{{ route('bkash') }}">-->
                                                                <!--            <img src="images/icon/bkash.png"-->
                                                                <!--                data-src="images/icon/bkash.png"-->
                                                                <!--                alt="EcoPays" class="lazyload">-->
                                                                <!--        </a>-->
                                                                <!--    </div>-->
                                                                <!--    <div class="icon">-->
                                                                <!--        <a href="{{ route('nagad') }}">-->
                                                                <!--            <img src="https://freepnglogo.com/images/all_img/1725618513nagad-logo.png"-->
                                                                <!--                data-src="https://freepnglogo.com/images/all_img/1725618513nagad-logo.png"-->
                                                                <!--                alt="Rapid" class="lazyload">-->
                                                                <!--        </a>-->
                                                                <!--    </div>-->
                                                                <!--    <div class="icon">-->
                                                                <!--        <a href="{{ route('binance') }}">-->
                                                                <!--            <img src="{{asset('images/logo/binance.png')}}"-->
                                                                <!--                data-src="{{asset('images/logo/binance.png')}}"-->
                                                                <!--                alt="Mifinity" style="-->
                                                                <!--                width: 75px;-->
                                                                <!--            " class="lazyload">-->
                                                                <!--        </a>-->
                                                                <!--    </div>-->
                                                                <!--</div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Lottery Online -->

        @include('includes.user-main-footer')
    </div>
    <!-- /main-content -->
</div>
<!-- /main-content -->


@stop


@push('css')


    <style>
        .payment_method {
            padding: 10px;
        }

        .number_diposit {
            display: flex !important;
            justify-content: center;
            flex-wrap: nowrap !important;
        }

        .number_pay_box {
            margin-left: 70px;
        }

        .credit-card {
            margin-right: 70px;
        }

        select option {
            color: #0d0b2a;
            font-size: 18px;
        }

        .scaner_img img {
            background: #ffffff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        @media (max-width: 1150px) {

            .number_diposit {
                display: flex !important;
                justify-content: center;
                flex-wrap: wrap !important;
            }

            .number_pay_box {
                margin-left: 0px;
                margin-top: 20px;
            }

            .credit-card {
                margin-right: 0px;
                margin-top: 20px;
            }


        }
    </style>


@endpush

@push('js')

    <script>
        function updateAmount(value, currency, event) {
            let amountInput = document.getElementById("amountInput");
            amountInput.value = value + " " + currency;
            amountInput.setAttribute("data-original-value", value);
            amountInput.setAttribute("data-original-currency", currency);

            document.querySelectorAll(".item-title1").forEach(item => {
                item.classList.remove("active");
            });

            event.target.classList.add("active");
        }

        document.getElementById("paymentMethod").addEventListener("change", function () {
            let selectedPayment = this.value;
            let allItems = document.querySelectorAll(".item-title1");

            allItems.forEach(item => item.style.display = "none");

            allItems.forEach(item => {
                if ((selectedPayment === "bkash" || selectedPayment === "nagad") && item.textContent.includes("TK")) {
                    item.style.display = "block";
                } else if (selectedPayment === "binance" && item.textContent.includes("$")) {
                    item.style.display = "block";
                }
            });
        });
    </script>

    <!-- Include SweetAlert Library -->

    <script>
        function copyToClipboard(inputId) {
            var copyText = document.getElementById(inputId);

            if (copyText) {
                if (navigator.clipboard) {
                    // Modern Clipboard API
                    navigator.clipboard.writeText(copyText.value).then(function () {
                        Swal.fire({
                            icon: "success",
                            title: "Copied successfully!",
                            text: "Copied Number: " + copyText.value,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }).catch(function (error) {
                        Swal.fire({
                            icon: "error",
                            title: "Copy failed!",
                            text: "Please try again.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                } else {
                    // Fallback for older browsers
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); // For mobile devices
                    document.execCommand('copy');
                    Swal.fire({
                        icon: "success",
                        title: "Copied successfully!",
                        text: "Copied Number: " + copyText.value,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            } else {
                console.error("Input element not found");
            }
        }
    </script>



@endpush