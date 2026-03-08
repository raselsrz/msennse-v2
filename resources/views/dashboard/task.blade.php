@extends('layouts.profile')
@section('content')

<!-- main-content -->
<div class="main-content-dashboard-wrap gap80">


    @include('includes.user-left-menu')


    <!-- main-content -->
    <div class="main-content-dashboard">



        <!-- table-statistical -->
        <div class="tf-container">
            <div class="row p-4">
                @if($tasks->count() > 0)
                    <div class="col-12">
                        <div class="heading-dashboard mb-30 wow fadeInUp" data-wow-delay="0s">
                            <h4>{{__('Complete the tasks and earn money')}}</h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-lottery-results mb-40">
                            <div class="title">
                                <div>{{__('Name')}}</div>
                                <div>{{__('Action')}}</div>
                            </div>
        
                            @foreach($tasks as $task)
                                <div class="item-table">
                                    <div class="tasks">
                                        <div class="task_price">
                                            <span>{{__('Earn Upto')}} ${{ $task->price }}</span>
                                        </div>
                                        <a href="
                                        @if($task->type == 'text_typing')
                                        {{ route('text_typing', $task->id) }}
                                        @elseif($task->type == 'image_upload')
                                        {{ route('image_upload', $task->id) }}
                                        @elseif($task->type == 'video_watch')
                                        {{ route('video_watch', $task->id) }}
                                        @elseif($task->type == 'math_quiz')
                                        {{ route('math_quiz', $task->id) }}
                                        @endif
                                        
                                        
                                        ">{{ $task->task_name }}</a>
                                    </div>
                                    <div>
                                        @if($task->type == 'text_typing')
                                            <a href="{{ route('text_typing', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'image_upload')
                                            <a href="{{ route('image_upload', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'video_watch')
                                            <a href="{{ route('video_watch', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @elseif($task->type == 'math_quiz')
                                            <a href="{{ route('math_quiz', $task->id) }}" class="tf-btn tf-btn-primary">
                                                {{__('Start Earning')}}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
        
                        @if($tasks->count() > 10)
                            <ul class="wg-pagination justify-start">
                                @if ($tasks->onFirstPage())
                                    <li class="disabled"><span><i class="icon-back"></i></span></li>
                                @else
                                    <li><a href="{{ $tasks->previousPageUrl() }}"><i class="icon-back"></i></a></li>
                                @endif
        
                                @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                                    <li class="{{ $tasks->currentPage() == $page ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
        
                                @if ($tasks->hasMorePages())
                                    <li><a href="{{ $tasks->nextPageUrl() }}"><i class="icon-next"></i></a></li>
                                @else
                                    <li class="disabled"><span><i class="icon-next"></i></span></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                @else
                    <div class="congratulations item-table">
                        <div class="tasks text-center">
                            <h4>🎉 {{__('Congratulations! All your tasks for today are complete. You will receive new tasks in 24 hours.')}}</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- /table-statistical -->






        @include('includes.user-main-footer')

    </div>
    <!-- /main-content -->
</div>
<!-- /main-content -->



@stop



@push('css')


<style>

.task_price {
    position: absolute;
    top: -35px;
    /* right: 0; */
    background: linear-gradient(to left, rgb(254, 140, 69), rgb(202, 40, 38));
    color: #fff !important;
    padding: 4px 6px;
    font-size: 12px;
    border-radius: 0 0 0 10px;
    font-weight: 600;
    z-index: 1;
}

.tasks{
    position: relative;
}

/* .table-lottery-results .item-table a{
    color: #fff !important;
} */

.congratulations{
    background: linear-gradient(274.33deg, #fe8c45 2.74%, #ca2826 103%);
    width: 500px;
    margin: auto;
    height: 400px;
    display: flex
;
    align-items: center;
    border-radius: 7px;
    /* color: #fff !important;*/
}



</style>


@endpush