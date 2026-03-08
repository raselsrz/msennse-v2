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
                        {{-- <div class="col text-end">
                            <a href="{{route('admin.blog.add')}}" class="btn btn-sm btn-primary">Add New</a>
                        </div> --}}
                    </div> 
                     
                </div>
                
                <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Added</th>
                                        <th scope="col">Add Time</th>
                                        <th scope="col">Status</th>
                                        <th style=" text-align: center; " scope="col">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($comments)==0)
                                    <tr>
                                        <td colspan="5" class="text-center">No Message Found</td>
                                    </tr>
                                    @endif
                                    @foreach($comments as $comment)
                                    <tr> 
                                        <td>
                                            {{$comment->name}}
                                        </td>

                                        <td>
                                            {{$comment->email}}
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.comments.approve', ['id' => $comment->id]) }}" method="POST">
                                                @csrf
                                                <select name="status" id="status" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                                    <option value="0" {{$comment->status == 0 ? 'selected' : ''}}>Pending</option>
                                                    <option value="1" {{$comment->status == 1 ? 'selected' : ''}}>Approved</option>
                                                </select>
                                            </form>
                                        </td>

                                        <td>
                                            {{date('d M Y',strtotime($comment->created_at))}}
                                        </td>

                                        <td>
                                            {{$comment->created_at->diffForHumans()}}
                                        </td>
                                         
                                        <td class="text-end">

                                            <a href="{{route('admin.comments.view',['id'=>$comment->id])}}" class="btn btn-sm btn-neutral"><i class="bi bi-eye"></i></a>
                                            <a href="{{route('admin.comments.delete',['id'=>$comment->id])}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                             
                                        </td>
                                    </tr>
                                    @endforeach
                              

                                    
                                </tbody>
                            </table>

                </div>
               

                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}


                    
                    <span class="text-muted text-sm">
                        {{ $comments->firstItem()}}-{{ $comments->lastItem() }} of {{ $comments->total() }} results
                     </span>
                     @if($comments->total()>0)
                        <span class="text-muted text-sm">page {{$comments->currentPage()}} of {{$comments->lastPage()}}</span>
                     @endif
                     @if ($comments->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item {{ $comments->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $comments->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $comments->lastPage(); $i++)
                                    <li class="page-item {{ $comments->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $comments->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $comments->currentPage() == $comments->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $comments->nextPageUrl() }}">Next</a>
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
@endpush