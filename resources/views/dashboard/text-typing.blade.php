@extends('layouts.profile')
@section('content')


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
                                    <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('My Account')}}</h2>
                                    @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                                            <span class="alert-text">{{Session::get('success')}}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                                            <span class="alert-text">{{Session::get('error')}}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <span class="alert-icon"><i class="bi bi-x-circle"></i></span>
                                                <span class="alert-text">{{$error}}</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endforeach
                                    @endif
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
                                            <div class="wallet-withdrawal">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="wallet-withdrawal-note">
                                                            <i class="icon-infor-1"></i>
                                                            <div class="text">
                                                                <p class="fs-18"><strong>{{__('Text Typing Task')}}</strong></p>
                                                                <p class="fs-14">
                                                                    {{__('Please type a **60-word blog article** manually. Copy-pasting is strictly prohibited. This task is designed to test your typing skills, accuracy, and content creation ability. Ensure your article is well-structured and relevant to the topic. **Tip:** Plan your content before you start typing to avoid errors.')}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <form class="wallet-withdrawal-form" action="{{ route('text_typing', $task->id) }}" method="POST">
                                                            @csrf
                                                            <div class="account-number">
                                                                <div class="account-number-title">
                                                                    {{__('Type Here a 60-Word Blog Article (Don\'t Paste Text)')}}
                                                                </div>
                                                                <fieldset>
                                                                    <textarea class="content-input p-21-19" name="text" 
                                                                            placeholder="{{__('Start typing your article here...')}}" 
                                                                            id="blog-article" 
                                                                            style="height: 250px;" 
                                                                            onpaste="return false;" 
                                                                            ondrop="return false;" 
                                                                            oncopy="return false;" 
                                                                            oncut="return false;"
                                                                            minlength="60"
                                                                            required>{{ old('text') }}</textarea>
                                                                </fieldset>
                                                                <p class="fs-15" style="color: red; font-weight: bold;">⚠️ {{__('Pasting is not allowed. Please type manually.')}}</p>
                                                            </div>
                                                            <button type="submit" class="tf-btn full-w">{{__('Submit Article')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /my account contest -->


                    @include('includes.user-main-footer')

                </div>
                <!-- /main-content -->
            </div>
            <!-- /main-content -->





@stop



@push('css')

<style>

.wallet-withdrawal .wallet-withdrawal-note p{
    font-size: 14px;
    font-weight: 400;
    line-height: 19px;
    padding-bottom: 10px;
    line-height: 25.6px !important;
}
</style>



@endpush