




<div class="integration-fixed integration-fixed__bottom-right">
    <style>
    .telegram-container {
        position: relative;
    }

    .telegram-button {
        width: 50px;
        height: 50px;
        bottom: 40px;
        right: 40px;
        background-color: transparent !important;
        color: #FFF !important;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
        transform: scale(0.9)
    }

    .telegram-button::after {
        content: '';
        position: absolute;
        width: 70%;
        height: 70%;
        background-color: #fff !important;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        z-index: -1;
    }

    .telegram-button svg {
        fill: #24A1DE;
        width: 50px;
    }

    .telegram-button:hover {
        transform: scale(1);
    }


    .integration-fixed__bottom-right {
    bottom: 0;
    right: 0;
}

.integration-fixed {
    position: fixed;
    z-index: 10000000;
    display: flex
;
    flex-direction: column;
    justify-content: center;
    padding: 24px;
    row-gap: 12px;
}
</style>
<div class="telegram-container">
    <a href="{{get_option('telegram', '')}}" target="_blank" class="telegram-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
            <path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"></path>
        </svg>
    </a>
</div>    <style>
    .whatsapp-button {
        width: 50px;
        height: 50px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF !important;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
        transform: scale(0.9)
    }

    .whatsapp-button svg {
        fill: #fff;
    }

    .whatsapp-button:hover {
        transform: scale(1);
        background-color: #1fcc5f;
    }
</style>
<div class="whatsapp-container">
    <a href="https://api.whatsapp.com/send?phone={{get_option('phone', '')}}" target="_blank" class="whatsapp-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="26">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
        </svg>
    </a>
</div></div>



<!-- /main-content -->
</div>
<!-- /layout-wrap -->
</div>
<!-- /wrapper -->
<!-- prograss -->
<div class="progress-wrap" style=" display: none; " >
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
        style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
    </path>
</svg>
</div>






<!-- /prograss -->
<!-- Javascript -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/lazysize.min.js') }}"></script>
<script src="{{ asset('js/textanimation.js') }}"></script>
<script src="{{ asset('js/count-down.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>