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
                            {{__('Make payment to our PhonePe')}}
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

                                <input type="hidden" name="payment_method" value="phonepe" />

                                <div class="row d-flex number_diposit justify-content-center">
                                    <div class="col-xl-6">
                                        <div class="currency-box number_pay_box mt--10">
                                            <div class="title mb-2">
                                                <h5 class="credit-card-title">
                                                    {{__('PhonePe Payment Method')}}
                                                </h5>
                                            </div>

                                            <input type="radio" id="usd" name="currency" checked />
                                            <div class="currency-box-content">
                                                <span class="btn-radio"></span>
                                                <div class="wallet-balance">
                                                    <div class="mb-4">
                                                        <label for="bkash_number" class="text-2">
                                                            {{__('PhonePe UPI ID 👇')}}
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
                                                                  {{ convertCurrencyIndia($plan->price) }} <svg xmlns="http://www.w3.org/2000/svg" style="
    width: 10px;
    margin-left: 5px;
" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill="#FFFFFF" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 269 511.61"><path fill-rule="nonzero" d="M153.01 172.78c5.27 5.09 7.98 11.3 8.16 18.59.21 7.33-2.22 13.77-7.31 19.32-5.05 5.22-11.3 7.89-18.69 8.05-7.41.07-13.75-2.4-18.97-7.46-5.36-4.91-8.14-11.12-8.37-18.59-.03-1.32.02-2.6.15-3.86-13.44-4.99-25.31-10.64-35.75-16.76l-46.71 43.29-2.47 258.63c-.01 1.78.32 3.52.93 5.06.66 1.56 1.58 2.97 2.67 4.08 1.08 1.1 2.37 1.99 3.73 2.55 1.41.56 2.96.88 4.54.88l198.45 1.99c1.75.03 3.37-.26 4.8-.79 1.47-.56 2.81-1.39 3.9-2.4 1.19-1.09 2.16-2.44 2.81-3.87.65-1.53 1.05-3.23 1.07-4.96l-.32-260.88-116.28-96.54-39.33 36.46c9.09 4.86 19.41 9.34 31.01 13.38 3.87-2.31 8.22-3.52 13.05-3.6 7.38-.1 13.71 2.37 18.93 7.43zM76.35 339.51l9.57-21.57h36.13c-.46-1.55-1.25-3.05-2.39-4.51a17.077 17.077 0 0 0-4.22-3.83 23.145 23.145 0 0 0-5.59-2.61c-2.06-.7-4.25-1.02-6.55-1.02H76.35l9.57-21.58h103.39l-9.57 21.58h-24.98c.99.75 1.9 1.63 2.75 2.65.85.98 1.61 1.98 2.26 3.11.62 1.08 1.17 2.15 1.63 3.23.42 1.08.73 2.08.85 2.98h27.06l-9.57 21.57h-19.59c-1.43 3.66-3.55 7.12-6.39 10.4-2.86 3.29-6.15 6.21-9.92 8.82-3.78 2.62-7.87 4.77-12.29 6.56a57.17 57.17 0 0 1-13.44 3.6l54.34 55.94h-42.96l-48.43-53.16v-19.8h21.44c2.05 0 4.09-.34 6.08-1.02 2.02-.68 3.88-1.59 5.55-2.75 1.7-1.11 3.18-2.44 4.41-3.92 1.24-1.5 2.12-3.03 2.66-4.67H76.35zM52.62 158.72c-25.11-19.9-38.18-43.04-42.15-65.28-5.11-28.81 4.92-56.12 23.9-73.64C53.51 2.14 81.59-5.69 112.3 4.58c42.25 14.12 89.89 63.82 123.53 172.89l-.08.03 28.43 23.6c2.74 2.12 4.5 5.43 4.5 9.15l.32 266.4c-.06 5.13-1.12 9.87-2.96 14.06-2.02 4.51-4.88 8.48-8.33 11.66a34.692 34.692 0 0 1-11.49 7.04c-4.07 1.52-8.51 2.27-13.12 2.2l-198.23-1.99c-4.74 0-9.29-.94-13.32-2.61-4.34-1.81-8.2-4.48-11.36-7.69-3.28-3.35-5.94-7.36-7.67-11.77A37.742 37.742 0 0 1 0 473.81l2.51-262.99c-.17-3.28 1.06-6.62 3.66-9.03l46.45-43.07zm149.13-9.45c-29.27-76.35-65.08-112.23-96.77-122.82-21.86-7.31-41.65-1.93-54.97 10.36C36.59 49.2 29.51 68.7 33.2 89.37c3.25 17.97 14.54 36.91 36.6 53.43l51.24-47.49c4.2-3.86 10.74-4.13 15.24-.4l65.47 54.36z"/></svg>
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
                                                        {{__('PhonePe UPI ID')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="text" class="currency-input" placeholder="{{__('Enter your phonePe upi id')}}" value="{{ old('phone_upi_id') }}" name="phone_upi_id" />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('Your PhonePe Number')}}
                                                    </label>
                                                    <div class="content-input">
                                                        <input type="text" class="currency-input" placeholder="{{__('Enter your number')}}" value="{{ old('phone_number') }}" name="phone_number" />
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="card-input name">
                                                <fieldset>
                                                    <label class="text-2">
                                                        {{__('PhonePe Payment Screenshot')}}
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
