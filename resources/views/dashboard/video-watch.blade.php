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
                                        <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">{{__('Video Watch Task')}}</h2>
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
                                                                    <p class="fs-18"><strong>{{__('Video Watch Task')}}</strong></p>
                                                                    <p class="fs-14">
                                                                        {{__('Watch the video below and submit the task. You must watch the full video. Skipping is not allowed.')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8">
                                                            <form class="wallet-withdrawal-form" action="{{ route('video_watch', $task->id) }}" method="POST">
                                                                @csrf

                                                                <input type="hidden" id="watch_percentage" name="watch_percentage" value="" >

                                                                <div class="account-number">
                                                                    <div class="account-number-title">
                                                                        {{ __('Watch the Full Video (Do Not Skip)') }}
                                                                    </div>
                                                                    <fieldset>
                                                                        <div class="video-container" id="player" >
                                                                            <iframe 
                                                                                class="plyr__video-embed"
                                                                                src="https://www.youtube.com/embed/{{ get_field('video_link', 'task', $task->id, '') }}?enablejsapi=1"
                                                                                allowfullscreen
                                                                                allow="autoplay"
                                                                            ></iframe>
                                                                            <div class="progress-bar-overlay"></div> <!-- Overlay to hide the progress bar -->
                                                                        </div>
                                                                    </fieldset>
                                                            
                                                                    <p class="fs-15" style="color: red; font-weight: bold;">⚠️ {{ __('Do not skip the video. You must watch the full video.') }}</p>
                                                            
                                                                    <!-- Hidden input for watch percentage -->
                                                                </div>
                                                            
                                                                <button type="submit" id="submitButton" class="tf-btn full-w" disabled>{{ __('Submit Task') }}</button>
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

                      

                        <style>
                            .video-container {
                                position: relative;
                                width: 100%;
                                height: 0;
                                padding-bottom: 56.25%; /* 16:9 aspect ratio */
                            }
                        
                            .video-container iframe {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                            }
                        
                            .progress-bar-overlay {
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                width: 100%;
                                height: 15px; /* Height of the YouTube progress bar */
                                background-color: #000; /* Match the background color of your page */
                                z-index: 10; /* Ensure it's above the iframe */
                            }
                         .ytp-progress-linear-live-buffer{
                                    display: none !important;
                                }
                                .ytp-progress-bar {
                                    display: none !important;
                                }
                         

                        </style>


                    @include('includes.user-main-footer')

                </div>
                <!-- /main-content -->
            </div>
            <!-- /main-content -->

            

    


@stop



@push('css')

<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />


<style>

    .wallet-withdrawal .wallet-withdrawal-note p{
        font-size: 14px;
        font-weight: 400;
        line-height: 19px;
        padding-bottom: 10px;
        line-height: 25.6px !important;
    }
    
    .ytp-progress-list{
        display: none !important;
    }
    
    
    .ytp-chrome-bottom{
        display: none !important;
    }
    .wallet-withdrawal .wallet-withdrawal-form .account-number {
        padding-bottom: 16px;
        position: relative;
    }
    
    </style>
    
    <style>
        .progress-bar-container {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 5px;
            margin-top: 10px;
            position: relative;
            position: absolute;
            bottom: 68px;
        }
    
        .progress-bar {
            width: 0%;
            height: 25px;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 1s;
        }
    
        #progressPercentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            font-weight: bold;
        }
    
    
        @media (max-width: 420px) {
            .progress-bar-container {
                bottom: 95px;
            }
        }
    

        .plyr__controls .plyr__controls__item.plyr__progress__container{
            display: none !important;
        }
    
    </style>



@endpush



@push('js')
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>


<script>
  const player = new Plyr('#player', {
    youtube: {
      noCookie: true,
      rel: 0,
      showinfo: 0
    },
    settings: ['captions', 'quality']
  });

  let lastTime = 0;
  let allowSeek = false;

  // সর্বশেষ সময় আপডেট রাখো
  player.on('timeupdate', () => {
    if (!player.seeking) {
      lastTime = player.currentTime;
    }
  });

  // ইউজার seek করলে (skip করলে) আটকাও
  player.on('seeking', () => {
    if (player.currentTime > lastTime + 1) {
      player.currentTime = lastTime;
    }
  });

  // Pause করেও skip করলে আটকাও
  player.on('pause', () => {
    setTimeout(() => {
      if (player.currentTime > lastTime + 1) {
        player.currentTime = lastTime;
      }
    }, 200); // একটু delay দিয়ে check করো
  });

  // Submit button enable করো ভিডিও শেষ হলে
  const submitBtn = document.getElementById('submitButton');
  player.on('ended', () => {
    submitBtn.disabled = false;
  });

  // watch percentage hidden input এ store করো
  const watchInput = document.getElementById('watch_percentage');
  player.on('timeupdate', () => {
    const currentTime = player.currentTime;
    const duration = player.duration;
    if (duration > 0) {
      const percent = (currentTime / duration) * 100;
      watchInput.value = percent.toFixed(2);
    }
  });
</script>






@endpush