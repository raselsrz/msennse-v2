@extends('layouts.profile') @section('content')

<!-- main-content -->
<div class="main-content-dashboard-wrap gap80">
    @include('includes.user-left-menu')

    <!-- main-content -->
    <div class="main-content-dashboard">
        <!-- table-statistical -->
        <div class="tf-container">
            <div class="row p-4">
                  @if($transactions->count() > 0)
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
                                        <div class="completed" >
                                            withdraw
                                        </div>
                                        @elseif($transaction->type == 'deposit')
                                        <div class="pending" >
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
                                        <div>  {{$transaction->created_at->diffForHumans()}}</div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                 <ul class="wg-pagination justify-start">
    {{-- Previous Button --}}
    @if ($transactions->onFirstPage())
        <li class="disabled">
            <span><i class="icon-back"></i></span>
        </li>
    @else
        <li>
            <a href="{{ $transactions->previousPageUrl() }}"><i class="icon-back"></i></a>
        </li>
    @endif

    {{-- Page Numbers --}}
    @foreach ($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url)
        @if ($page == $transactions->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
        @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach

    {{-- Next Button --}}
    @if ($transactions->hasMorePages())
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
        <!-- /table-statistical -->

        @include('includes.user-main-footer')
    </div>
    <!-- /main-content -->
</div>
<!-- /main-content -->

@stop @push('css')

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

@endpush
