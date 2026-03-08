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
                        <div class="col text-end">
                            <a href="{{route('admin.plans.add')}}" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div> 
                     
                </div>
                
                <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Daily Work</th>
                                        <th scope="col">Duration Day</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Add Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($plans)==0)
                                    <tr>
                                        <td colspan="5" class="text-center">No Users Found</td>
                                    </tr>
                                    @endif
                                    @foreach($plans as $plan)
                                    <tr> 
                                        <td>
                                            {{$plan->name}}
                                        </td>

                                        <td>
                                            {{$plan->price}}
                                        </td>

                                        <td>
                                           {{ get_field('daily_work', 'plan', $plan->id, '')}}
                                        </td>

                                        <td>
                                            {{$plan->duration_days}}
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.plans.approve', ['id' => $plan->id]) }}" method="POST">
                                                @csrf
                                                <select name="status" id="status" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                                    <option value="active" {{ $plan->status == 'active' ? 'selected' : '' }}>Completed</option>
                                                    <option value="inactive" {{ $plan->status == 'inactive' ? 'selected' : '' }}>Pending</option>
                                                </select>
                                            </form>

                                        </td>

                                        <td>
                                            {{$plan->created_at->format('d M Y')}}
                                        </td>

                                        <td class="text-end">
                                            <a href="{{route('admin.plans.edit',['id'=>$plan->id])}}" class="btn btn-sm btn-neutral"><i class="bi bi-pencil"></i></a>
                                            <a href="{{route('admin.plans.delete',['id'=>$plan->id])}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                              

                                    
                                </tbody>
                            </table>

                </div>

                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}


                    
                    <span class="text-muted text-sm">
                        {{ $plans->firstItem()}}-{{ $plans->lastItem() }} of {{ $plans->total() }} results
                     </span>
                     @if($plans->total()>0)
                        <span class="text-muted text-sm">page {{$plans->currentPage()}} of {{$plans->lastPage()}}</span>
                     @endif
                     @if ($plans->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item {{ $plans->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $plans->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $plans->lastPage(); $i++)
                                    <li class="page-item {{ $plans->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $plans->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $plans->currentPage() == $plans->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $plans->nextPageUrl() }}">Next</a>
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