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
                            <a href="{{route('admin.languages.add')}}" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div> 
                     
                </div>
                
                <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">ISO Code</th>
                                        <th scope="col">Add Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($languages)==0)
                                    <tr>
                                        <td colspan="5" class="text-center">No languages Found</td>
                                    </tr>
                                    @endif
                                    @foreach($languages as $language)
                                    <tr> 
                                        <td>
                                            {{$language->language}}
                                        </td>

                                        <td>
                                            {{$language->iso_code}}
                                        </td>


                                        <td>
                                            {{$language->created_at->format('d M Y')}}
                                        </td>

                                        <td>
                                            {{-- translate --}}
                                            <a href="{{route('admin.languages.translate',['id'=>$language->id])}}" class="btn btn-sm btn-neutral"><i class="bi bi-translate"></i></a>
                                            {{-- edit --}}

                                            <a href="{{route('admin.languages.edit',['id'=>$language->id])}}" class="btn btn-sm btn-neutral"><i class="bi bi-pencil"></i></a>
                                            <a href="{{route('admin.languages.delete',['id'=>$language->id])}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                              

                                    
                                </tbody>
                            </table>

                </div>

                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}


                    
                    <span class="text-muted text-sm">
                        {{ $languages->firstItem()}}-{{ $languages->lastItem() }} of {{ $languages->total() }} results
                     </span>
                     @if($languages->total()>0)
                        <span class="text-muted text-sm">page {{$languages->currentPage()}} of {{$languages->lastPage()}}</span>
                     @endif
                     @if ($languages->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item {{ $languages->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $languages->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $languages->lastPage(); $i++)
                                    <li class="page-item {{ $languages->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $languages->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $languages->currentPage() == $languages->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $languages->nextPageUrl() }}">Next</a>
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