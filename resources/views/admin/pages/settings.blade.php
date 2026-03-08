@extends('layouts.admin')
@section('content')

<style>
    .input-group {
        margin-bottom: 10px;
    }
</style>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">

    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">

            <div class="card shadow border-0 mb-7">

                <div class="card-header add_cat">
                    <h5 class="mb-0">Settings</h5>

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
                    <form action="{{
    route('admin.settingsProccess')
                }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="sitename" class="form-label">Sitename</label>
                                <input type="text" name="sitename" value="{{get_option('sitename', '')}}"
                                    class="form-control" id="siteTitle">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="siteTitle" class="form-label">siteTitle</label>
                                <input type="text" name="siteTitle" value="{{get_option('siteTitle', '')}}"
                                    class="form-control" id="sitename">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address"
                                    value="<?php echo htmlspecialchars(get_option('address', ''));?>"
                                    class="form-control" id="address">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="keywords" class="form-label">Keywords</label>
                                <input type="text" name="keywords"
                                    value="<?php echo htmlspecialchars(get_option('keywords', ''));?>"
                                    class="form-control" id="keywords">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="logo" class="form-label">Logo URL</label>
                                <input type="url" name="logo" class="form-control" id="logo"
                                    value="{{get_option('logo', '')}}">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="hero_img" class="form-label">Home Img URL</label>
                                <input type="url" name="hero_img" class="form-control" id="hero_img"
                                    value="{{get_option('hero_img', '')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="favicon" class="form-label">Favicon URL</label>
                                <input type="url" name="favicon" class="form-control" id="favicon"
                                    value="{{get_option('favicon', '')}}">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="email" class="form-label">Site Email</label>
                                <input type="email" name="email"
                                    value="<?php echo htmlspecialchars(get_option('email', ''));?>" class="form-control"
                                    id="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="phone" class="form-label">Site Phone</label>
                                <input type="text" name="phone"
                                    value="<?php echo htmlspecialchars(get_option('phone', ''));?>" class="form-control"
                                    id="phone">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" name="facebook"
                                    value="<?php echo htmlspecialchars(get_option('facebook', ''));?>"
                                    class="form-control" id="facebook">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="text" name="linkedin"
                                    value="<?php echo htmlspecialchars(get_option('linkedin', ''));?>"
                                    class="form-control" id="linkedin">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" name="instagram"
                                    value="<?php echo htmlspecialchars(get_option('instagram', ''));?>"
                                    class="form-control" id="instagram">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="tiktok" class="form-label">Tiktok</label>
                                <input type="text" name="tiktok"
                                    value="<?php echo htmlspecialchars(get_option('tiktok', ''));?>"
                                    class="form-control" id="tiktok">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input type="text" name="whatsapp"
                                    value="<?php echo htmlspecialchars(get_option('whatsapp', ''));?>"
                                    class="form-control" id="whatsapp">
                            </div>

                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input type="text" name="youtube"
                                    value="<?php echo htmlspecialchars(get_option('youtube', ''));?>"
                                    class="form-control" id="youtube">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="telegram" class="form-label">Telegram</label>
                                <input type="text" name="telegram"
                                    value="<?php echo htmlspecialchars(get_option('telegram', ''));?>"
                                    class="form-control" id="telegram">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="bkash_number" class="form-label">Bkash Number</label>
                                <input type="text" name="bkash_number"
                                    value="<?php echo htmlspecialchars(get_option('bkash_number', ''));?>"
                                    class="form-control" id="bkash_number">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="nagad_number" class="form-label">Nagad Number</label>
                                <input type="text" name="nagad_number"
                                    value="<?php echo htmlspecialchars(get_option('nagad_number', ''));?>"
                                    class="form-control" id="nagad_number">
                            </div>
                        </div>

                        <div class="row">

                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">TRC20 Address</label>
                                <input type="text" name="trc20address"
                                    value="<?php echo htmlspecialchars(get_option('trc20address', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>


                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">TRC20 Scaner Imag</label>
                                <input type="text" name="trc20_scaner"
                                    value="<?php echo htmlspecialchars(get_option('trc20_scaner', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>
                        </div>


                        <div class="row">

                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">BEP20 Address</label>
                                <input type="text" name="bep20address"
                                    value="<?php echo htmlspecialchars(get_option('bep20address', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>


                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">BEP20 Scaner Imag</label>
                                <input type="text" name="bep20_scaner"
                                    value="<?php echo htmlspecialchars(get_option('bep20_scaner', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>
                        </div>


                        <div class="row">

                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">ERC20 Address</label>
                                <input type="text" name="erc20address"
                                    value="<?php echo htmlspecialchars(get_option('erc20address', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>


                            <div class="mb-3 col-6">
                                <label for="binance_id" class="form-label">ERC20 Scaner Imag</label>
                                <input type="text" name="erc20_scaner"
                                    value="<?php echo htmlspecialchars(get_option('erc20_scaner', ''));?>"
                                    class="form-control" id="binance_id">
                            </div>
                        </div>



                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="binance_address" class="form-label">Binance Address</label>
                                <input type="text" name="binance_address"
                                    value="<?php echo htmlspecialchars(get_option('binance_address', ''));?>"
                                    class="form-control" id="binance_address">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="binance_scaner" class="form-label">Binance Image</label>
                                <input type="text" name="binance_scaner"
                                    value="<?php echo htmlspecialchars(get_option('binance_scaner', ''));?>"
                                    class="form-control" id="binance_scaner">
                            </div>
                        </div>


                    <div class="row">
                         <div class="mb-3 col-6">
                            <label for="currency_rate" class="form-label">Currency Rate BD</label>
                            <input type="text" name="currency_rate"
                                value="<?php echo htmlspecialchars(get_option('currency_rate', ''));?>"
                                class="form-control" id="currency_rate">
                        </div>


                           <div class="mb-3 col-6">
                            <label for="currency_rate" class="form-label">Currency Rate India</label>
                            <input type="text" name="currency_rate_india"
                                value="<?php echo htmlspecialchars(get_option('currency_rate_india', ''));?>"
                                class="form-control" id="currency_rate">
                        </div>
                    </div>

                    <div class="row">
                    <div class="mb-3 col-6">
                            <label for="currency_rate" class="form-label">Currency Rate Nepal</label>
                            <input type="text" name="currency_rate_nepal"
                                value="<?php echo htmlspecialchars(get_option('currency_rate_nepal', ''));?>"
                                class="form-control" id="currency_rate">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="currency_rate" class="form-label">Refer Commission</label>
                            <input type="text" name="refer_commission"
                                value="<?php echo htmlspecialchars(get_option('refer_commission', ''));?>"
                                class="form-control" id="currency_rate">
                        </div>
                    </div>

                     <div class="mb-3 col-6">
                            <label for="currency_rate" class="form-label">Minimum Withdraw</label>
                            <input type="text" name="withdraw_minimum"
                                value="<?php echo htmlspecialchars(get_option('withdraw_minimum', ''));?>"
                                class="form-control" id="currency_rate">
                        </div>



                        <div class="mb-3">
                            <label for="telegram" class="form-label">Header Codes</label>
                            <textarea name="header_codes" class="form-control"
                                id="header_codes"><?php echo htmlspecialchars(get_option('header_codes', ''));?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="footer_codes" class="form-label">Footer Codes</label>
                            <textarea name="footer_codes" class="form-control"
                                id="footer_codes"><?php echo htmlspecialchars(get_option('footer_codes', ''));?></textarea>
                        </div>



                        <button type="submit" class="btn btn-sm bg-surface-secondary btn-neutral"
                            >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>


@stop
@push('js')
    <link rel="stylesheet" href="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.css" />
    <script src="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.js"></script>
    <script>

        var editor = Jodit.make('#content');
        var editor = Jodit.make('#footer_description');

        jQuery(document).ready(function ($) {
            $('select').select2();
        }); 
    </script>
@endpush