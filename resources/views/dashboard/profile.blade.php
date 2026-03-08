@extends('layouts.profile')
@section('content')



<!-- main-content -->
<div class="main-content-dashboard-wrap">
    @include('includes.user-left-menu')

    <!-- main-content -->
    <div class="main-content-dashboard gap62">

        <!-- page-heading -->
        <div class="tf-container">
            <div class="row">
                <div class="col-12">
                    <div class="page-heading">
                        <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('My account')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-heading -->


        <!-- my account profile -->
        <div class="my-account-profile">
            <div class="tf-container">
                <form action="{{ route('profile') }}" method="POST" accept="application/x-www-form-urlencoded" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile-infor">
                                <div class="heading-left">
                                    <h4 class="title fw-9 mb-6 wow fadeInUp" data-wow-delay="0s">
                                        {{__('Personal Information')}}
                                    </h4>
                                    <p class="sub-title fw-4 type-secondary mb-30">
                                        {{__('Change your identity information')}}
                                    </p>
                                    <button type="submit" class="tf-btn style-3 pd-0-46">{{__('Save')}}</button>
                                </div>
                                <div class="edit-infor">
                                    <div class="form-infor" id="form-infor">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Name')}}</label>
                                                        <input class="p-10-19" type="text" name="name" value="{{ Auth::user()->name }}" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Email')}}</label>
                                                        <input class="p-10-19" type="email" name="email" value="{{ Auth::user()->email }}" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Phone')}}</label>
                                                        <input class="p-10-19" type="text" name="phone" value="{{ Auth::user()->phone }}" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('NID')}}</label>
                                                        <input class="p-10-19" type="text" name="nid" value="{{ Auth::user()->nid }}">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Address')}}</label>
                                                        <input class="p-10-19" type="text" name="address" value="{{ Auth::user()->address }}">
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Date of Birth')}}</label>
                                                        <input class="p-10-19" type="date" name="dob" value="{{ Auth::user()->dob }}">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cols mb-30">
                                                    <fieldset>
                                                        <label>{{__('Profile Image')}}</label>
                                                        <input class="files p-10-19" type="file" name="profile">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="profile-security">
                                <div class="heading-left">
                                    <h4 class="title fw-9 mb-6 wow fadeInUp" data-wow-delay="0s">
                                        {{__('Security')}}
                                    </h4>
                                    <p class="sub-title fw-4 type-secondary mb-30">
                                        {{__('Last change: 12 days ago')}}
                                    </p>
                                    <button type="submit" class="tf-btn style-3 pd-0-46">{{__('Save')}}</button>
                                </div>
                                <div class="edit-password">
                                    <div id="form-security" class="form-security">
                                        <div class="cols mb-30 relative has-verified z-5">
                                            <fieldset>
                                                <label>{{__('Password *')}}</label>
                                                <input class="password p-10-19" id="pass2" type="password" placeholder="{{__('Password')}}">
                                                <span class="toggle-password first-time">
                                                    <i class="icon-view"></i>
                                                </span>
                                            </fieldset>
                                            <div class="verified-wrap">
                                                <div class="verified-item item-check">
                                                    <i class="icon-close"></i>
                                                    <p class="text">{{__('6 characters')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols relative has-verified z-5">
                                            <fieldset>
                                                <label>{{__('Confirm Password *')}}</label>
                                                <input class="password p-10-19" id="confirmPass2" type="password" placeholder="{{__('Password')}}">
                                                <span class="toggle-password second-time">
                                                    <i class="icon-view"></i>
                                                </span>
                                            </fieldset>
                                            <div class="verified-wrap type-confirm">
                                                <div class="verified-item">
                                                    <i class="icon-check-1"></i>
                                                    <div class="notice mt--8">
                                                        <p class="notice fw-550 fs-14">{{__('Two-step authentication')}}</p>
                                                        <p class="notice fw-4 fs-14">
                                                            {{__('If you activate this check, then any time you want to log in, you have to confirm yourself with email or text.')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /my account profile -->

        @include('includes.user-main-footer')

    </div>
    <!-- /main-content -->
</div>
<!-- /main-content -->



@stop


@push('css')


<style>

.files{
    outline: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 100%;
    padding: 8px 19px;
    font-size: 14px;
    font-weight: 400;
    line-height: 28px;
    background-color: var(--Bg-3);
    border: 1px solid var(--Border-2);
    border-radius: 999px;
    color: var(--Secondary);
    overflow: hidden;
    margin-bottom: 0;
}


</style>

@endpush