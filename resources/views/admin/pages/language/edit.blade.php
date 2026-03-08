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
                        <h5 class="mb-0"> {{$name}}</h5>
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
                <form action="{{route('admin.languages.update', [
                    'id' => $language->id
                ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Language Name</label>
                        <input type="text" name="language" class="form-control" id="title" required value="{{ $language->language }}">
                    </div>

                    {{-- iso_code --}}
                    <div class="mb-3">
                        <label for="iso_code" class="form-label">ISO Code</label>
                        <input type="text" name="iso_code" class="form-control" id="iso_code" required value="{{ $language->iso_code }}">
                    </div>



                    
                    <button type="submit" class="btn btn-sm bg-surface-secondary btn-neutral" >Add <?php echo $name;?></button>
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