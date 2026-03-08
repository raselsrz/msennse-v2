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


                {{--         'user_id', 'amount', 'transaction_id', 'status', 'payment_method', 'account_number', 'notes'
--}}
                
                <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Address / Phone') }}</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Timne Ago</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($withdrawals)==0)
                                    <tr>
                                        <td colspan="7" class="text-center">No withdrawals Found</td>
                                    </tr>
                                    @endif
                                    @foreach($withdrawals as $withdraw)
                                    <tr> 
                                        <td>
                                            {{$withdraw->account_number}}
                                        </td>

                                        <td>
                                            {{ number_format($withdraw->amount)}}
                                            $

                                        </td>

                                        <td>
                                            {{$withdraw->payment_method}}
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.withdrawals.approve', ['id' => $withdraw->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="amount" value="{{$withdraw->amount}}">
                                                <select name="status" id="status" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                                    <option value="completed" {{ $withdraw->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="pending" {{ $withdraw->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="failed" {{ $withdraw->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                                </select>
                                            </form>
                                        </td>

                                        <td>
                                            {{$withdraw->created_at->diffForHumans()}}
                                        </td>

                                        <td>
                                            {{$withdraw->created_at->format('d M Y')}}
                                        </td>

                                        <td class="text-end">
                                            <a href="{{route('admin.withdrawals.delete',['id'=>$withdraw->id])}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                              

                                    
                                </tbody>
                            </table>

                </div>
               

                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}


                    
                    <span class="text-muted text-sm">
                        {{ $withdrawals->firstItem()}}-{{ $withdrawals->lastItem() }} of {{ $withdrawals->total() }} results
                     </span>
                     @if($withdrawals->total()>0)
                        <span class="text-muted text-sm">page {{$withdrawals->currentPage()}} of {{$withdrawals->lastPage()}}</span>
                     @endif
                     @if ($withdrawals->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item {{ $withdrawals->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $withdrawals->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $withdrawals->lastPage(); $i++)
                                    <li class="page-item {{ $withdrawals->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $withdrawals->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $withdrawals->currentPage() == $withdrawals->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $withdrawals->nextPageUrl() }}">Next</a>
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