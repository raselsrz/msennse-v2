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
                <form action="{{route('admin.plans.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="title" required value="{{old('name')}}">
                    </div>

                    {{-- post_slug --}}

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" required value="{{old('price')}}">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Total Price</label>
                        <input type="number" name="total_price" class="form-control" id="price" required value="">
                    </div>

                    <div class="mb-3">
                        <label for="expiry" class="form-label">Duration Days</label>
                        <input type="number" name="duration_days" class="form-control" id="expiry" required value="{{old('duration_days')}}">
                    </div>

                    {{-- daily work--}}
                    <div class="mb-3">
                        <label for="daily_work" class="form-label">Daily Work</label>
                        <input type="number" name="daily_work" class="form-control" id="daily_work" required value="{{ old('daily_work') }}">
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