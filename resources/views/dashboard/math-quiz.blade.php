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
                                    <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Captcha Typing')}}</h2>
                                    @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-icon"><i class="bi bi-check-circle"></i></span>
                                        <span class="alert-text
                                        ">{{Session::get('success')}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-icon
                                        "><i class="bi bi-x-circle"></i></span>
                                        <span class="alert-text
                                        ">{{Session::get('error')}}</span>
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
                                                                <p class="fs-18"><strong>{{__('Captcha Typing Task')}}</strong></p>
                                                                <p class="fs-14">{{__('If you get one answer wrong here, you will not get any money and one of your tasks will be lost.')}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <form class="wallet-withdrawal-form" action="{{ route('math_quiz', $task->id) }}" method="POST">
                                                            @csrf
                                                            <div class="account-number">
                                                                <div class="account-number-title">
                                                                    {{__('Solve This:')}} <strong>{{ session('captcha_question') }}</strong>
                                                                </div>
                                                                <input type="number" name="answer" required placeholder="{{__('Enter answer here')}}" autocomplete="off" onpaste="return false;">
                                                                <p class="fs-15" style="color: red; font-weight: bold;">⚠️ {{__('Pasting is not allowed. Please type manually.')}}</p>
                                                            </div>
                                                            <button type="submit" class="tf-btn full-w">{{__('Submit Answer')}}</button>
                                                        </form>
                                                    </div>
                                                    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const answerInput = document.querySelector('input[name="user_answer"]');
        if (answerInput) {
            answerInput.addEventListener('paste', function (e) {
                e.preventDefault();
                alert("⚠️ {{ __('Answer, don\'t make a mistake.') }}");
            });
        }
    });
</script>

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