@extends('layouts.admin')
@section('content')

 <div class="h-screen flex-grow-1 overflow-y-lg-auto">

<main class="py-6 bg-surface-secondary">
    <div class="container-fluid">

        <div class="card shadow border-0 mb-7 add-container">
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="title" class="form-label">Name:</label>
                        <input type="text"  readonly name="post_title" class="form-control" id="title" 
                        value="{{$comment->name}}"  required>
                    </div>

                    <div class="mb-3">
                      <label for="title" class="form-label">Email:</label>
                      <input type="text"  readonly name="post_title" class="form-control" id="title" 
                      value="{{$comment->email}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea style=" height: 370px; " class="form-control" readonly name="post_content" id="content"  rows="4" required>{{$comment->comment}}</textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
</div>


@stop
@push('css')
<style>
    .input-group {
      margin-bottom: 10px;
    }
  </style>
<link
  rel="stylesheet"
  href="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.css"
/>

@endpush

@push('js')
<script src="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.js"></script>
@endpush