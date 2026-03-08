@extends('layouts.profile') @section('content')

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
                        <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Withdrawal')}}</h2>

                        <p class="fs-18">
                            {{__('You can only withdraw 2 times in 1 month.')}}
                        </p>

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                            <span class="alert-text">{{Session::get('success')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                            <span class="alert-text">{{Session::get('error')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif @if (count($errors) > 0) @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                            <span class="alert-text">{{$error}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach @endif
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
                            <div class="wallet-withdrawal">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="top">
                                            <div class="wallet-withdrawal-content w-100">
                                                <div class="bg bg-7"></div>
                                                <div class="icon">
                                                    <img src="images/icon/total.png" data-src="images/icon/total.png" alt="" class="lazyload" />
                                                </div>
                                                <div class="text">
                                                    <p>{{__('Total Withdraw')}}</p>
                                                    <p class="price">${{ $user->total_withdrawn }}</p>
                                                </div>
                                            </div>
                                            <div class="wallet-withdrawal-content w-100">
                                                <div class="bg bg-8"></div>
                                                <div class="icon">
                                                    <img src="images/icon/available.png" data-src="images/icon/available.png" alt="" class="lazyload" />
                                                </div>
                                                <div class="text">
                                                    <p>{{__('Available for withdrawal')}}</p>
                                                    <p class="price">${{ $user->wallet_balance}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8">
                                        <form class="wallet-withdrawal-form" action="{{ route('withdraw') }}" method="POST" accept="application/x-www-form-urlencoded">
                                            @csrf
                                            <div class="amount">
                                                <div class="amount-title mb-4">{{ __('Amount') }}</div>
                                                <fieldset style="position: relative;">
                                                    <span style="position: absolute; left: 11px; top: 53%; transform: translateY(-50%); font-weight: bold;">$</span>
                                                    <input type="number" class="content-input p-21-19" name="amount" placeholder="{{ __('Amount') }}" id="amount" value="{{ old('amount') }}" />
                                                </fieldset>
                                            </div>

                                            <div class="payment-method mb-4">
                                                <div class="payment-method-title">{{__('Payment Method')}}</div>
                                                <fieldset>
                                                    <select class="currency-input payment_method mt-4 p-21-19" name="payment_method" id="payment-method" onchange="toggleInputField()">
                                                        <option value="" selected disabled>{{__('Select Payment Method')}}</option>
                                                        <option value="bkash">{{__('Bkash')}}</option>
                                                        <option value="nagad">{{__('Nagad')}}</option>
                                                        <option value="binance">{{__('Binance')}}</option>
                                                        <option value="trc20">{{__('trc20')}}</option>
                                                        <option value="erc20">{{__('erc20')}}</option>
                                                        <option value="bep20">{{__('bep20')}}</option>
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="bkash-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your Bkash Number')}}</div>
                                                <fieldset>
                                                    <input type="number" class="content-input p-21-19" name="bkash_number" placeholder="{{__('Bkash number')}}" value="{{old('bkash_number')}}" />
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="nagad-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your Nagad Number')}}</div>
                                                <fieldset>
                                                    <input type="number" class="content-input p-21-19" name="nagad_number" placeholder="{{__('Nagad number')}}" value="{{old('nagad_number')}}" />
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="binance-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your Binance Address')}}</div>
                                                <fieldset>
                                                    <input type="text" class="content-input p-21-19" name="binance_address" placeholder="{{__('Enter your Binance address')}}" value="{{old('binance_address')}}" />
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="trc20-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your TRC20 Address')}}</div>
                                                <fieldset>
                                                    <input type="text" class="content-input p-21-19" name="trc20_address" placeholder="{{__('Enter your TRC20 address')}}" value="{{old('trc20_address')}}" />
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="erc20-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your ERC20 Address')}}</div>
                                                <fieldset>
                                                    <input type="text" class="content-input p-21-19" name="erc20_address" placeholder="{{__('Enter your ERC20 address')}}" value="{{old('erc20_address')}}" />
                                                </fieldset>
                                            </div>

                                            <div class="account-number" id="bep20-field" style="display: none;">
                                                <div class="account-number-title mt-4 mb-4">{{__('Your BEP20 Address')}}</div>
                                                <fieldset>
                                                    <input type="text" class="content-input p-21-19" name="bep20_address" placeholder="{{__('Enter your BEP20 address')}}" value="{{old('bep20_address')}}" />
                                                </fieldset>
                                            </div>

                                            <button type="submit" class="tf-btn mt-5 full-w">{{__('Submit')}}</button>
                                        </form>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="wallet-withdrawal-note">
                                            <i class="icon-infor-1"></i>
                                            <div class="text">
                                                <p class="fs-14">{{__('Minimum withdrawal amount $23')}}</p>
                                                <p class="fs-14">{{__('The money will be transferred to your account within 30 minutes')}}</p>
                                                <p class="fs-14">{{__('You can only withdraw 2 times in 1 month.')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tf-container mt-5">
                        <div class="title mb-2">
                            <h5 class="credit-card-title">
                                {{__('Withdraw Transaction')}}
                            </h5>
                        </div>

                        <div class="row p-4">
                            @if($transactions->count() > 0)
                            <div class="col-12">
                                <div class="table-statistical mb-30">
                                    <table class="w-100">
                                        <thead>
                                            <tr class="title">
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Account No') }}</th>
                                                <th>{{ __('Payment Method') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Time') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $transaction)
                                            <tr class="item-table">
                                                <td class="tasks">
                                                    <div class="completed">
                                                        withdraw
                                                    </div>
                                                </td>
                                                <td class="tasks">
                                                    <div>{{ $transaction->account_number }}</div>
                                                </td>
                                                <td class="tasks">
                                                    <div>{{ $transaction->payment_method }}</div>
                                                </td>

                                                <td class="tasks">
                                                    <div>${{ $transaction->amount }}</div>
                                                </td>

                                                <td class="tasks">
                                                    @if($transaction->status == 'completed')
                                                    <div class="text-success fw-semibold">
                                                        Completed
                                                    </div>
                                                    @elseif($transaction->status == 'pending')
                                                    <div class="text-warning fw-semibold">
                                                        Pending
                                                    </div>
                                                    @elseif($transaction->status == 'rejected')
                                                    <div class="text-danger fw-semibold">
                                                        Failed
                                                    </div>
                                                    @endif
                                                </td>
                                                <td class="tasks">
                                                    <div>{{date('d M Y',strtotime($transaction->created_at))}}</div>
                                                </td>
                                                <td class="tasks">
                                                    <div>{{$transaction->created_at->diffForHumans()}}</div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <ul class="wg-pagination justify-start">
                                        {{-- Previous Button --}} @if ($transactions->onFirstPage())
                                        <li class="disabled">
                                            <span><i class="icon-back"></i></span>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ $transactions->previousPageUrl() }}"><i class="icon-back"></i></a>
                                        </li>
                                        @endif {{-- Page Numbers --}} @foreach ($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url) @if ($page == $transactions->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                        @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif @endforeach {{-- Next Button --}} @if ($transactions->hasMorePages())
                                        <li>
                                            <a href="{{ $transactions->nextPageUrl() }}"><i class="icon-next"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            @else
                            <div class="congratulations item-table">
                                <h4>{{__('Transaction Not Found ')}}</h4>
                            </div>
                            @endif
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

@stop @push('css')

<style>
    .wallet-withdrawal .wallet-withdrawal-form .account-number .content-input {
        border-radius: 40px;
    }

    .wallet-withdrawal .wallet-withdrawal-form .content-input {
        padding: 14px 15px 10px 25px !important;
    }

    .payment_method {
        background-color: transparent;
        border: none;
        line-height: 18.52px;
        text-align: left;
        width: 100%;
        color: var(--Text-6);
        letter-spacing: 0.6px;

        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--Bg-3);
        border-radius: 999px;
        padding: 11px 0;
        border: 1px solid var(--Border-2);
    }

    select option {
        color: #0d0b2a;
        font-size: 18px;
    }
</style>

<style>
    .task_price {
        position: absolute;
        top: -35px;
        /* right: 0; */
        background: linear-gradient(to left, rgb(254, 140, 69), rgb(202, 40, 38));
        color: #fff !important;
        padding: 4px 6px;
        font-size: 12px;
        border-radius: 0 0 0 10px;
        font-weight: 600;
        z-index: 1;
    }

    .tasks {
        position: relative;
    }

    /* .table-lottery-results .item-table a{
    color: #fff !important;
} */

    .congratulations {
        background: #121008;
        width: 500px;
        margin: auto;
        height: 400px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        border-radius: 7px;
        /* color: #fff !important;*/
    }

    .table-statistical table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; /* So that each column keeps equal width */
    }

    .table-statistical th,
    .table-statistical td {
        padding: 10px;
        text-align: left; /* You can change to center if needed */
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table-statistical th {
        font-weight: bold;
        color: #fff;
        text-align: center;
    }
    .table-statistical td {
        text-align: center !important;
    }

    .table-statistical tr {
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .tasks > div {
        padding: 0;
        margin: 0;
    }

    .table-statistical .title,
    .table-statistical .item-table {
        display: table-row !important;
    }

    table,
    th,
    td {
        border: none !important;
    }
</style>

@endpush @push('js')

<script>
    function toggleInputField() {
        const paymentMethod = document.getElementById("payment-method").value;

        // Hide all fields first
        document.getElementById("bkash-field").style.display = "none";
        document.getElementById("nagad-field").style.display = "none";
        document.getElementById("binance-field").style.display = "none";
        document.getElementById("trc20-field").style.display = "none";
        document.getElementById("erc20-field").style.display = "none";
        document.getElementById("bep20-field").style.display = "none";

        // Show the relevant field based on selection
        if (paymentMethod === "bkash") {
            document.getElementById("bkash-field").style.display = "block";
        } else if (paymentMethod === "nagad") {
            document.getElementById("nagad-field").style.display = "block";
        } else if (paymentMethod === "binance") {
            document.getElementById("binance-field").style.display = "block";
        } else if (paymentMethod === "trc20") {
            document.getElementById("trc20-field").style.display = "block";
        } else if (paymentMethod === "erc20") {
            document.getElementById("erc20-field").style.display = "block";
        } else if (paymentMethod === "bep20") {
            document.getElementById("bep20-field").style.display = "block";
        }
    }
</script>

@endpush
