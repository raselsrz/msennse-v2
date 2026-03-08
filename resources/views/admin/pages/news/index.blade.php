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
                            <a href="{{route('admin.news.add')}}" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div> 
                     
                </div>
                
                <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Added</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Views</th>
                                        <th scope="col">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($news)==0)
                                    <tr>
                                        <td colspan="5" class="text-center">No Blog Found</td>
                                    </tr>
                                    @endif
                                    @foreach($news as $blog)
                                    <tr> 
                                        <td>
                                            {{$blog->post_title}}
                                        </td>
                                        <td>
                                            {{date('d M Y',strtotime($blog->created_at))}}
                                        </td>
                                        <td>
                                            {{$blog->post_status}}
                                        </td>
                                         
                                        <td>
                                            {{intval(get_field('views','blog', $blog->id, 0))}}
                                        </td>
                                        <td class="">
                                        <a href="/blog/{{$blog->post_slug}}" class="btn btn-sm btn-neutral" target="_blank"><i class="bi bi-eye"></i></a>
                                            <a href="{{route('admin.news.edit',['id'=>$blog->id])}}" class="btn btn-sm btn-neutral"><i class="bi bi-pencil"></i></a>
                                            <a href="{{route('admin.news.delete',['id'=>$blog->id])}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-sm btn-neutral"> <i class="bi bi-trash"></i></a>
                                             
                                        </td>
                                    </tr>
                                    @endforeach
                              

                                    
                                </tbody>
                            </table>

                </div>
               

                <div class="card-footer border-0 py-5">
                    {{-- pagination --}}


                    
                    <span class="text-muted text-sm">
                        {{ $news->firstItem()}}-{{ $news->lastItem() }} of {{ $news->total() }} results
                     </span>
                     @if($news->total()>0)
                        <span class="text-muted text-sm">page {{$news->currentPage()}} of {{$news->lastPage()}}</span>
                     @endif
                     @if ($news->total() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <!-- Previous Button -->
                                <li class="page-item {{ $news->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <!-- Page Numbers -->
                                @for ($i = 1; $i <= $news->lastPage(); $i++)
                                    <li class="page-item {{ $news->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next Button -->
                                <li class="page-item {{ $news->currentPage() == $news->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $news->nextPageUrl() }}">Next</a>
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