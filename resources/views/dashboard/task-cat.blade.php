@extends('layouts.profile')
@section('content')

@php
// 4 categories array
$categories = [
    [
        'name' => 'Text Typing',
        'type' => 'text_typing',
        'image' => 'images/cat-img/blog.jpeg',
    ],
    [
        'name' => 'Captcha Typing',
        'type' => 'math_quiz',
        'image' => 'images/cat-img/math_quiz.jpg',
    ],
    [
        'name' => 'Photography',
        'type' => 'image_upload',
        'image' => 'images/cat-img/img.jpg',
    ],
    [
        'name' => 'Video Watching',
        'type' => 'video_watch',
        'image' => "images/cat-img/youtube.jpg",
    ],
];
@endphp


            <!-- main-content -->
            <div class="main-content-dashboard-wrap">

                @include('includes.user-left-menu')

                <!-- /section-menu-left-mobile -->
                <!-- main-content -->
                <div class="main-content-dashboard gap62">

                   <!-- page-heading -->
<div class="tf-container">
    <div class="row">
        <div class="col-12">
            <div class="page-heading">
                <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Select Your Task Category')}}</h2>
                <p class="mb-5">{{__('Choose a task category that suits you best. The tasks you receive will be based on your selection.')}}</p>


            </div>
        </div>
    </div>
</div>
<!-- /page-heading -->

<!-- my account contest -->
<div class="my-account-contest">
    <div class="widget-tabs">
        <div class="tf-container">
            <div class="widget-content-tab">
                <div class="widget-content-inner active">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-4 mt-5">
                                <div class="wg-game style-5">
                                    <form id="subscribe-form-{{ $category['type'] }}" action="{{ route('task_category') }}" method="POST" class="subscribe-form">
                                        @csrf
                                        <input type="hidden" name="type" value="{{ $category['type'] }}">
                                        <div class="wg-game-image">
                                            <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="lazyload">
                                        </div>
                                        <div class="content">
                                            <div class="heading">
                                                <h4 class="title text-center fw-9 mb-0">{{__($category['name']) }}</h4>
                                                <button type="button" class="tf-btn mt-5 w-100 confirm-purchase" data-id="{{ $category['type'] }}" data-price="">
                                                    <span>{{__('Subscribe')}}</span>
                                                    <i class="icon-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /my account contest -->

<script>
    // Handle the subscribe button click
    document.querySelectorAll('.confirm-purchase').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            
            // Show SweetAlert confirmation
            Swal.fire({
                title: "{{__('Are you sure?')}}",
                text: "{{__('Do you want to subscribe to this category?')}}",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('Yes, subscribe!')}}",
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                    Swal.fire({
                        title: "{{__('Subscribed!')}}",
                        text: "{{__('You have successfully subscribed to this category.')}}",
                        icon: 'success'
                    });
                }
            });
        });
    });
</script>


                    @include('includes.user-main-footer')

                </div>
                <!-- /main-content -->
            </div>
            <!-- /main-content -->





@stop