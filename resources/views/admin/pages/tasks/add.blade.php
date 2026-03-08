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
                <form action="{{route('admin.tasks.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="title" required>
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" name="price" class="form-control" id="price" required>
                    </div>

                    {{-- category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select name="plan_id" class="form-select" id="category" required>
                            <option value="">Select Category</option>
                            @foreach ($plans as $plan)
                            <option value="{{$plan->id}}">{{$plan->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Task Type --}}
                    <div class="mb-3">
                        <label for="task_type" class="form-label">Task Type:</label>
                        <select name="type" class="form-select" id="task_type" required>
                            <option value="">Select Task Type</option>
                            <option value="image_upload">Image Upload</option>
                            <option value="text_typing">Text Typing</option>
                            <option value="video_watch">Video Watch</option>
                            <option value="math_quiz">Math Quiz</option>
                        </select>
                    </div>

                    {{-- Video Link (Initially Hidden) --}}
                    <div class="mb-3" id="video_link_container" style="display: none;">
                        <label for="video_link" class="form-label">Video Link:</label>
                        <input type="text" name="video_link" class="form-control" id="video_link">
                    </div>

                    {{-- JavaScript to Show/Hide Video Link Field --}}
                    <script>
                        document.getElementById('task_type').addEventListener('change', function() {
                            let videoLinkContainer = document.getElementById('video_link_container');

                            if (this.value === 'video_watch') {
                                videoLinkContainer.style.display = 'block';
                            } else {
                                videoLinkContainer.style.display = 'none';
                            }
                        });
                    </script>



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