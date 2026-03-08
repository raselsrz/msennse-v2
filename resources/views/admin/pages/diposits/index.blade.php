@extends('layouts.admin')
@section('content')


<div class="h-screen flex-grow-1 overflow-y-lg-auto">

    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <!-- Card stats -->
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                    <span class="alert-text
                                ">{{Session::get('success')}}</span>
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
            <div class="card shadow border-0 mb-7">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">All {{$name}}</h5>
                        </div>
                    </div>

                </div>


                {{-- Schema::create('deposits', function (Blueprint $table) {
                $table->id();
                $table->foreignId('deposit_id')->constrained()->onDelete('cascade'); // Links to deposits table
                $table->decimal('amount', 15, 2); // Deposit amount
                $table->string('transaction_id')->unique(); // Unique transaction ID
                $table->string('phone_number');
                $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Deposit status
                $table->string('payment_method'); // Payment method (Bkash, Nagad, etc.)
                $table->timestamps(); --}}

                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Phone</th>
                                <th scope="col">Screenshot</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Timne Ago</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($deposits) == 0)
                                <tr>
                                    <td colspan="5" class="text-center">No deposits Found</td>
                                </tr>
                            @endif
                            @foreach($deposits as $deposit)
                                <tr>
                                    <td>
                                        
                                        {{ $deposit->phone_number }}
                                    
                                    </td>
                                    
                                    <td>
                                        @if($deposit->screenshot)
                                            <small>Screenshot: <a href="{{ asset('uploads/' . $deposit->screenshot) }}" target="_blank">Click Here</a></small>
                                        @else
                                            <small>No screenshot available</small>
                                        @endif
                                    
                                    </td>

                                    <td>
                                        {{$deposit->transaction_id}}
                                    </td>

                                    <td>
                                        {{ $deposit->amount}}
                                            $
                                    </td>

                                    <td>
                                        {{$deposit->payment_method}}
                                    </td>

                                    <td>
                                        <form action="{{ route('admin.diposits.approve', ['id' => $deposit->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="amount" value="{{$deposit->amount}}">
                                            <select name="status" id="status" class="form-select form-select-sm w-auto"
                                                onchange="this.form.submit()">
                                                <option value="completed" {{ $deposit->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="pending" {{ $deposit->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="failed" {{ $deposit->status == 'failed' ? 'selected' : '' }}>
                                                    Failed</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td>
                                        {{$deposit->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        {{$deposit->created_at->format('d M Y')}}
                                    </td>

                                    <td class="text-end">
                                        <a href="{{route('admin.diposits.delete', ['id' => $deposit->id])}}"
                                            onclick="return confirm('Are you sure you want to delete ?')"
                                            class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>

                </div>


                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}



                    <span class="text-muted text-sm">
                        {{ $deposits->firstItem()}}-{{ $deposits->lastItem() }} of {{ $deposits->total() }} results
                    </span>
                    @if($deposits->total() > 0)
                        <span class="text-muted text-sm">page {{$deposits->currentPage()}} of
                            {{$deposits->lastPage()}}</span>
                    @endif
                    @if ($deposits->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item {{ $deposits->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $deposits->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="true">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $deposits->lastPage(); $i++)
                                    <li class="page-item {{ $deposits->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $deposits->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li
                                    class="page-item {{ $deposits->currentPage() == $deposits->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $deposits->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    @endif




                </div>
            </div>
        </div>
    </main>
</div>

@stop
@push('js')
    <style>
        /* hello */
    </style>
@endpush