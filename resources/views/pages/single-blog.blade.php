@extends('layouts.default')
@section('content')

<!-- page-title -->
<div class="page-title">
    <div class="tf-tsparticles">
        <div id="tsparticles1" data-color="#fff" data-line="#fff"></div>
    </div>
    <div class="tf-container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <h1 class="title">{{ __('Blog detail') }}</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li><i class="icon-next"></i></li>
                        <li>{{ __('Blog detail') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

<div class="main-content page-blog-single">
    <!-- section main page blog single -->
    <section class="s-page-blog-single tf-spacing-1">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-main">
                        <h2 class="main-title wow fadeInUp" data-wow-delay="0s">
                            {{ __($blog->post_title) }}
                        </h2>
                        <div class="entry-meta">
                            <div class="entry-comment">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.75 6.5C5.75 6.56631 5.72366 6.62989 5.67678 6.67678C5.62989 6.72366 5.5663 6.75 5.5 6.75C5.4337 6.75 5.3701 6.72366 5.32322 6.67678C5.27634 6.62989 5.25 6.56631 5.25 6.5C5.25 6.4337 5.27634 6.37011 5.32322 6.32322C5.3701 6.27634 5.4337 6.25 5.5 6.25C5.5663 6.25 5.62989 6.27634 5.67678 6.32322C5.72366 6.37011 5.75 6.4337 5.75 6.5ZM5.75 6.5H5.5M8.25 6.5C8.25 6.56631 8.22366 6.62989 8.17678 6.67678C8.12989 6.72366 8.0663 6.75 8 6.75C7.9337 6.75 7.87011 6.72366 7.82322 6.67678C7.77634 6.62989 7.75 6.56631 7.75 6.5C7.75 6.4337 7.77634 6.37011 7.82322 6.32322C7.87011 6.27634 7.9337 6.25 8 6.25C8.0663 6.25 8.12989 6.27634 8.17678 6.32322C8.22366 6.37011 8.25 6.4337 8.25 6.5ZM8.25 6.5H8M10.75 6.5C10.75 6.56631 10.7237 6.62989 10.6768 6.67678C10.6299 6.72366 10.5663 6.75 10.5 6.75C10.4337 6.75 10.3701 6.72366 10.3232 6.67678C10.2763 6.62989 10.25 6.56631 10.25 6.5C10.25 6.4337 10.2763 6.37011 10.3232 6.32322C10.3701 6.27634 10.4337 6.25 10.5 6.25C10.5663 6.25 10.6299 6.27634 10.6768 6.32322C10.7237 6.37011 10.75 6.4337 10.75 6.5ZM10.75 6.5H10.5M1.5 8.50667C1.5 9.57333 2.24867 10.5027 3.30467 10.658C4.02933 10.7647 4.76133 10.8467 5.5 10.904V14L8.28933 11.2113C8.42744 11.0738 8.61312 10.9945 8.808 10.99C10.1091 10.958 11.407 10.8471 12.6947 10.658C13.7513 10.5027 14.5 9.574 14.5 8.506V4.494C14.5 3.426 13.7513 2.49733 12.6953 2.342C11.1406 2.11381 9.57135 1.99951 8 2C6.40533 2 4.83733 2.11667 3.30467 2.342C2.24867 2.49733 1.5 3.42667 1.5 4.494V8.506V8.50667Z" stroke="#7791BA" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>{{ __($comments->count() . ' Comments') }}</span>
                            </div>
                            <div class="entry-date">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 2V3.5M11.5 2V3.5M2 12.5V5C2 4.60218 2.15804 4.22064 2.43934 3.93934C2.72064 3.65804 3.10218 3.5 3.5 3.5H12.5C12.8978 3.5 13.2794 3.65804 13.5607 3.93934C13.842 4.22064 14 4.60218 14 5V12.5M2 12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5M2 12.5V7.5C2 7.10218 2.15804 6.72064 2.43934 6.43934C2.72064 6.15804 3.10218 6 3.5 6H12.5C12.8978 6 13.2794 6.15804 13.5607 6.43934C13.842 6.72064 14 7.10218 14 7.5V12.5" stroke="#7791BA" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>{{ __($blog->created_at->format('M d, Y')) }}</span>
                            </div>
                        </div>
                        <div class="entry-image">
                            <div class="image">
                                <img src="{{ get_field('thumbnail', 'blog', $blog->id, '') }}" alt="">
                            </div>
                        </div>
                        <p class="decs">
                            {!! __($blog->post_content) !!}
                        </p>
                        
                        <div class="mt-5 bottom">
                            <div class="social wow fadeInUp" data-wow-delay="0.1s">
                                <span class="">{{ __('Share this post:') }}</span>
                                <ul class="list">
                                    @php
                                        $postUrl = urlencode(url()->current()); // Get current post URL
                                        $postTitle = urlencode($blog->post_title);
                                    @endphp
                                    
                                    <!-- Facebook Share -->
                                    <li class="item">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" target="_blank">
                                            <i class="icon-facebook"></i>
                                        </a>
                                    </li>
                                
                                    <!-- Twitter Share -->
                                    <li class="item">
                                        <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ $postTitle }}" target="_blank">
                                            <i class="icon-twitter"></i>
                                        </a>
                                    </li>
                                
                                    <!-- LinkedIn Share -->
                                    <li class="item">
                                        <a href="https://www.linkedin.com/shareArticle?url={{ $postUrl }}&title={{ $postTitle }}" target="_blank">
                                            <i class="icon-linkedin2"></i>
                                        </a>
                                    </li>
                                
                                    <!-- Instagram (Note: Instagram doesn't support direct URL sharing) -->
                                    <li class="item">
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="icon-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Copy to Clipboard Script -->
                        <script>
                            function copyToClipboard(text) {
                                navigator.clipboard.writeText(text).then(() => {
                                    alert("{{ __('Link copied to clipboard!') }}");
                                }).catch(err => {
                                    console.error('{{ __('Could not copy text: ') }}', err);
                                });
                            }
                        </script>
                        
                        @if($comments->count() > 0)
                        <div class="comment-wrap">
                            <p class="title fs-24">{{ __('Comment') }} ({{ __($comments->count()) }})</p>
                            
                            @foreach ($comments as $comment)
                            <div class="comment-item wow fadeInUp" data-wow-delay="0s">
                                <div class="image">
                                    <img src="images/author/author-3.png" alt="">
                                </div>
                                <div class="content">
                                    <div class="entry-name-date">
                                        <a href="#" class="name">
                                            {{ __($comment->name) }}
                                        </a>
                                        <br>
                                        <p class="my-4 date-up">
                                            {{ __($comment->created_at->format('M d, Y')) }} {{ __('at') }} {{ __($comment->created_at->format('h:i A')) }}
                                        </p>
                                    </div>
                                    <p class="text-comment">
                                        {{ __($comment->comment) }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="add-comment-wrap">
                            <p class="title">
                                {{ __('Leave a comment') }}
                            </p>
                            <p class="sub-title">
                                {{ __('Your email address will not be published. Required fields are marked *') }}
                            </p>
                            <form class="form-add-comment" action="{{ route('commentStore') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                <div class="cols">
                                    <fieldset class="tf-field">
                                        <label for="field1">{{ __('Your name *') }}</label>
                                        <input class="tf-input" type="text" id="field1" placeholder="{{ __('Your name') }}" required name="name" value="{{ old('name') }}">
                                    </fieldset> 
                                    <fieldset>
                                        <label for="field4">{{ __('Email address') }}</label>
                                        <input type="email" id="field4" placeholder="{{ __('Your email') }}" required name="email" value="{{ old('email') }}">
                                    </fieldset>
                                </div>
                                <fieldset>
                                    <label for="field3">{{ __('Your Comment') }}</label>
                                    <textarea id="field3" placeholder="{{ __('Your message') }}" required name="comment">{{ old('comment') }}</textarea>
                                </fieldset>
                                <div class="btn-send-comment">
                                    <button type="submit" class="tf-btn">{{ __('Send comment') }} <i class="icon-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section main page blog single -->
</div>
<!-- /main-content -->


@stop