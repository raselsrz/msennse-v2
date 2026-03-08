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
                        <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Deposit')}}</h2>

                        <p class="fs-18">
                            {{__('Make payment to our Osko')}}
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
                    <div class="widget-content-tab" style="" >
                        <div class="widget-content-inner active">
                            <form class="wallet-deposit pt-3" action="{{ route('dipositFake') }}" method="POST" accept="application/x-www-form-urlencoded" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="payment_method" value="bkash" />

                                <div class="row d-flex number_diposit justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="currency-box number_pay_box mt--10">
                                            <div class="title mb-2">
                                                <h5 class="credit-card-title">
                                                    {{__('Osko  Payment Method')}}
                                                </h5>
                                            </div>

                                            <input type="radio" id="usd" name="currency" checked />
                                            <div class="currency-box-content">
                                                <span class="btn-radio"></span>
                                                <div class="wallet-balance">
                                                    <div class="mb-4">
                                                        <label for="bkash_number" class="text-2">
                                                            {{__('PayID (Phone Number/Email/ABN)')}}
                                                        </label>
                                                    </div>
                                                    <div class="content-input mt-5">
                                                        <input type="text" id="usd4" class="currency-input" value="{{ get_option('bkash_number', '') }}" readonly />
                                                        <span class="currency">
                                                            <i class="icon-copy" onclick="copyToClipboard('usd4')" style="cursor: pointer;">{{__('Copy')}}</i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-7">
                                        <div class="credit-card">
                                            <div class="widget-tabs1">
                                                <label class="text-2">
                                                    {{__('Amount')}}
                                                </label>

                                                <ul class="widget-menu-tab1 grid grid-cols-1 sm:grid-cols-2 gap-4 mb-15">
                                                    @foreach($plans as $index => $plan)
                                                    <li class="item-title1 {{ $index === 0 ? 'active' : '' }}" onclick="updateAmount({{ $plan->price }}, this)">
                                                        <div class="plan-card p-4 rounded-xl bg-[#1a1737] text-white space-y-2">
                                                            <h3 class="text-xl font-bold">{{ $plan->name }}</h3>
                                                            <div class="text-lg font-semibold text-right">
                                                              <p>
                                                                  ${{ $plan->price}}
                                                              </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                            <div class="card-input name d-none">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('Amount')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input
                                                            id="amountInput"
                                                            readonly
                                                            type="text"
                                                            class="currency-input"
                                                            placeholder="{{__('Enter amount')}}"
                                                            value="{{ count($plans) > 0 ? $plans[0]->price : '' }}"
                                                            required
                                                            name="amount"
                                                        />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <script>
                                                function updateAmount(value, element) {
                                                    document.getElementById("amountInput").value = value;

                                                    // Remove 'active' class from all list items
                                                    document.querySelectorAll(".item-title1").forEach((item) => {
                                                        item.classList.remove("active");
                                                    });

                                                    // Add 'active' class to the clicked item
                                                    element.classList.add("active");
                                                }
                                            </script>

                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('PayID (Email or Phone)')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="text" class="currency-input" placeholder="{{__('PayID (Email or Phone)')}}" value="{{ old('osko_payid') }}" name="osko_payid" />
                                                    </div>
                                                </fieldset>
                                            </div>


                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('Your Name or PayID')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="text" class="currency-input" placeholder="{{__('Your Name or PayID')}}" value="{{ old('osko_user_info') }}" name="osko_user_info" />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('BKash Payment Screenshot')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="file" class="currency-input" placeholder="{{__('Enter screenshot')}}" name="screenshot" />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('Transaction ID')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="text" class="currency-input" placeholder="{{__('Enter transaction ID')}}" value="{{ old('transaction_id') }}" name="transaction_id" />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <button type="submit" class="tf-btn full-w">{{__('Deposit')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tf-container">
                        @if($transactions->count() > 0)
                        <div class="title mb-2">
                            <h5 class="credit-card-title mt-5 text-center">
                                {{__('Your Transaction History')}}
                            </h5>
                        </div>

                        <div class="row p-4">
                          
                            <div class="col-12">
                                <div class="table-statistical mb-30">
                                    <table class="w-100">
                                        <thead>
                                            <tr class="title">
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Transaction ID') }}</th>
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
                                                    @if($transaction->type == 'withdrawal')
                                                    <div class="completed">
                                                        withdraw
                                                    </div>
                                                    @elseif($transaction->type == 'deposit')
                                                    <div class="pending">
                                                        Deposit
                                                    </div>
                                                    @endif
                                                </td>
                                                <td class="tasks">
                                                    <div>{{ $transaction->transaction_id }}</div>
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
                                                    @elseif($transaction->status == 'failed')
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
                           
                        </div>
                         @endif
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

        @media (max-width: 768px) {
            .currency-box .wallet-balance .content-input .currency {
                font-size: 11px;
                line-height: 26.46px;
                font-weight: 645;
                color: var(--Text-6);
            }
        }
    }


    
.plan-card h3 {
    font-size: 2rem;
    margin-bottom: 6px;
    font-weight: bold;
}

.plan-card p {
    margin: 2px 0;
    font-size: 1.8rem;
    font-weight: bold;

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

    .plans{
        display: flex;
        flex-direction: column;
    }
</style>

@endpush @push('js')

<!-- Include SweetAlert Library -->

<script>
    function copyToClipboard(inputId) {
        var copyText = document.getElementById(inputId);

        if (copyText) {
            if (navigator.clipboard) {
                // Modern Clipboard API
                navigator.clipboard
                    .writeText(copyText.value)
                    .then(function () {
                        Swal.fire({
                            icon: "success",
                            title: "Copied successfully!",
                            text: "Copied Number: " + copyText.value,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    })
                    .catch(function (error) {
                        Swal.fire({
                            icon: "error",
                            title: "Copy failed!",
                            text: "Please try again.",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    });
            } else {
                // Fallback for older browsers
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices
                document.execCommand("copy");
                Swal.fire({
                    icon: "success",
                    title: "Copied successfully!",
                    text: "Copied Number: " + copyText.value,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        } else {
            console.error("Input element not found");
        }
    }
</script>

@endpush
