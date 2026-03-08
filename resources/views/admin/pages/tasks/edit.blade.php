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
            
            <div class="col text-end">
                            <a href="{{route('admin.tasks.add')}}" class="btn btn-sm btn-primary">Add New</a>
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
                <form action="{{route('admin.tasks.update', [
                    'id' => $task->id
                ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="title" required value="{{$task->task_name}}">
                    </div>


                    {{-- description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required>{{$task->description}}</textarea>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" name="price" class="form-control" id="price" required value="{{$task->price}}">
                    </div>

                    {{-- category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select name="plan_id" class="form-select" id="category" required>
                            <option value="">Select Category</option>
                            @foreach ($plans as $plan)
                            <option value="{{$plan->id}}" <?php if($task->plan_id == $plan->id) echo 'selected';?>>{{$plan->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- status; --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" class="form-select" id="status" required>
                            <option value="">Select Status</option>
                            <option value="active" <?php if($task->status == 'active') echo 'selected';?>>Active</option>
                            <option value="inactive" <?php if($task->status == 'inactive') echo 'selected';?>>Inactive</option>
                        </select>
                    </div>

                    {{-- task type --}}

                    <div class="mb-3">
                        <label for="task_type" class="form-label">Task Type:</label>
                        <select name="type" class="form-select" id="task_type" required>
                            <option value="">Select Task Type</option>
                            <option value="image_upload" <?php if($task->type == 'image_upload') echo 'selected';?>>Image Upload</option>
                            <option value="text_typing" <?php if($task->type == 'text_typing') echo 'selected';?>>Text Typing</option>
                            <option value="video_watch" <?php if($task->type == 'video_watch') echo 'selected';?>>Video Watch</option>
                            <option value="math_quiz" <?php if($task->type == 'math_quiz') echo 'selected';?>>Math Quiz</option>
                        </select>
                    </div>
                    
                    {{-- Video Link (Initially Hidden) --}}
                    <div class="mb-3" id="video_link_container" style="display: none;">
                        <label for="video_link" class="form-label">Video Link:</label>
                        <input type="text" name="video_link" class="form-control" id="video_link" value="{{ get_field('video_link','task', $task->id, '') }}">
                    </div>
                    
                    {{-- JavaScript to Show/Hide Video Link Field --}}
                    <script>
                        // Show/hide video link input field based on selected task type
                        document.getElementById('task_type').addEventListener('change', function() {
                            let videoLinkContainer = document.getElementById('video_link_container');
                    
                            if (this.value === 'video_watch') {
                                videoLinkContainer.style.display = 'block';
                            } else {
                                videoLinkContainer.style.display = 'none';
                            }
                        });
                    
                        // Check if the selected task type is 'video_watch' on page load and show the video link input if needed
                        window.onload = function() {
                            let taskType = document.getElementById('task_type').value;
                            let videoLinkContainer = document.getElementById('video_link_container');
                    
                            if (taskType === 'video_watch') {
                                videoLinkContainer.style.display = 'block';
                            }
                        };
                    </script>
                    

                    
                    <button type="submit" class="btn btn-sm bg-surface-secondary btn-neutral">Update <?php echo $name;?></button>
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