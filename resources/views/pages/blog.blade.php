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
                    <h1 class="title">{{ __('Blog list') }}</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li><i class="icon-next"></i></li>
                        <li>{{ __('Blog list') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page-title -->

<!-- main-content -->
<div class="main-content">
    <!-- section-blog-lis -->
    <section class="section-blog-list tf-spacing-1 ">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="wrap-blog-list">

                        @foreach($news as $blog)
                        <div class="article-blog-item hover-img wow fadeInUp">
                            <div class="image-wrap">
                                <img class="lazyload" data-src="{{get_field('thumbnail','blog', $blog->id, '')}}"
                                    src="{{get_field('thumbnail','blog', $blog->id, '')}}"
                                    alt="{{$blog->post_title}}">
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    <a href="{{ route('blogDetail', $blog->post_slug) }}">
                                        {{ $blog->post_title }}
                                    </a>
                                    
                                </h4>
                                <ul class="meta">
                                    <li>{{ $blog->created_at->format('M d, Y') }}</li>
                                </ul>
                                <p>
                                    {!! Str::limit($blog->post_content, 200) !!}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    @if ($news->hasPages())
                        <ul class="wg-pagination">
                            {{-- Previous Page Link --}}
                            @if ($news->onFirstPage())
                                <li class="disabled"><span><i class="icon-back"></i></span></li>
                            @else
                                <li><a href="{{ $news->previousPageUrl() }}"><i class="icon-back"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                @if ($page == $news->currentPage())
                                    <li class="active"><a href="#">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($news->hasMorePages())
                                <li><a href="{{ $news->nextPageUrl() }}"><i class="icon-next"></i></a></li>
                            @else
                                <li class="disabled"><span><i class="icon-next"></i></span></li>
                            @endif
                        </ul>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="tf-sidebar">
                        <div class="sidebar-category">
                            <h4 class="heading">
                                {{ __('Categories') }}
                            </h4>
                            <ul class="category-list">
                                <li class="item">
                                @foreach (get_categories() as $category)
                                    <a href="{{ route('blogCategory', $category->slug) }}">{{ $category->name }}</a>
                                @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!-- /section-blog-lis -->
</div>
<!-- /main-content -->


@stop