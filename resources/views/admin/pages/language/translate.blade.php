@extends('layouts.admin')
@section('content')
 

 <div class="h-screen flex-grow-1 overflow-y-lg-auto">

<main class="py-6 bg-surface-secondary">
    <div class="container-fluid">

        <div class="card shadow border-0 mb-7">
            
            <div class="card-header add_cat">
                {{-- delete button right --}}
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Translate Your Language (English => {{$language->language}} ) </h5>
                    </div> 
            </div>
            </div>

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

        <div class="card shadow border-0 mb-7 add-container">
            <div class="card-body">
                <form action="{{ route('admin.languages.translateStore', [$language->id]) }}" method="POST">
                    @csrf
                
                    @foreach($translations as $key => $value)

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Translation Key</label>
                                <input type="text" name="keys[]" value="{{ $key }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Translated Value</label>
                                <input type="text" name="values[]" value="{{ $value }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm bg-surface-secondary btn-neutral">Save</button>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </form>
                
            </div>
        </div>
    </div>
</main>
</div>

@stop
@push('css')
 

@endpush

@push('js')
 
 
 
@endpush