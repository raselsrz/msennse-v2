@extends('layouts.admin')
@section('content')
 

 <div class="h-screen flex-grow-1 overflow-y-lg-auto">

<main class="py-6 bg-surface-secondary">
    <div class="container-fluid">

        <div class="card shadow border-0 mb-7">
            
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Edit {{$name}}</h5>
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
                <form action="{{route('admin.users.update', [
                    'id' => $user->id
                ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="title" value="{{$user->name}}">
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                    </div>

                    {{--     'name', 'username', 'email', 'phone', 'password', 'verification_code', 
    'is_verified', 'wallet_balance', 'total_earned', 'total_withdrawn', 
    'current_plan_id', 'plan_expires_at', 'referrer_id', 'referral_count', 
    'referral_earnings', 'status', 'two_factor_secret', 'two_factor_recovery_codes',
    'email_verified_at', 'profile_image', 'dob', 'address', 'nid', 'task_cat' --}}

                    {{-- Phone --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
                    </div>

                    {{-- Date of Birth --}}
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" name="dob" class="form-control" id="dob" value="{{$user->dob}}">
                    </div>

                    {{-- NID --}}
                    <div class="mb-3">
                        <label for="nid" class="form-label">NID:</label>
                        <input type="text" name="nid" class="form-control" id="nid" value="{{$user->nid}}">
                    </div>

                    {{--  @if($task->type == 'text_typing')
                                            <a href="{{ route('text_typing', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'image_upload')
                                            <a href="{{ route('image_upload', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'video_watch')
                                            <a href="{{ route('video_watch', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'math_quiz')
                                            <a href="{{ route('math_quiz', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @endif --}}

                    {{-- Task Category selection --}}
                    <div class="mb-3">
                        <label for="task_cat" class="form-label">Task Category:</label>
                        <select name="task_cat" id="task_cat" class="form-select">
                            <option disabled>Select Task Category</option>
                            <option value="text_typing" @if($user->task_cat == 'text_typing') selected @endif>Text Typing</option>
                            <option value="image_upload" @if($user->task_cat == 'image_upload') selected @endif>Image Upload</option>
                            <option value="video_watch" @if($user->task_cat == 'video_watch') selected @endif>Video Watch</option>
                            <option value="math_quiz" @if($user->task_cat == 'math_quiz') selected @endif>Math Quiz</option>
                        </select>
                    </div>

                    {{-- Profile Image --}}
                    <div class="mb-3">
                        <label for="profile_image" class="form-label
                        ">Profile Image:</label>
                        <input type="file" name="profile_image" class="form-control" id="profile_image">
                    </div>
                        
                        {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select">
                            <option value="active" @if($user->status == 'active') selected @endif>Active</option>
                            <option value="inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>

                    {{-- wallet_balance --}}
                    <div class="mb-3">
                        <label for="wallet_balance" class="form-label">Wallet Balance:</label>
                        <input type="text" name="wallet_balance" class="form-control" id="wallet_balance" value="{{$user->wallet_balance}}">
                    </div>

                    {{-- total_withdrawn --}}
                    <div class="mb-3">
                        <label for="total_withdrawn" class="form-label
                        ">Total Withdrawn:</label>
                        <input type="text" name="total_withdrawn" class="form-control" id="total_withdrawn" value="{{$user->total_withdrawn}}">
                    </div>
                        

                    {{-- password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: (Keep empty for not change)</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>


                    {{-- admin or user role set --}}
                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <select name="role" id="role" class="form-select">
                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                        </select>
                    </div>
                    

                
                       

                    <button type="submit" class="btn btn-sm bg-surface-secondary btn-neutral" >Update <?php echo $name;?></button>
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