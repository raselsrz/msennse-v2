@extends('layouts.default')
@section('content')




<div class="main-content">
    <section class="section-cta tf-spacing-1">
        <div class="sections tf-container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="section-cta-inner">
                        <div class="cta-middle text-center">
                            <p class="money text-color-clip fs-30 text-center">
                                {{ __('404 Not Found') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('css')


<style>

.sections{
    padding: 100px 10px !important;

}

.section-cta-inner{
    padding: 40px 16px 40px !important;
}

.section-cta .section-cta-inner {
    padding: 60px 43px 27px 40px;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex
;
    justify-content: space-between;
    background-color: var(--Bg-2);
    position: relative;
    border-radius: 16px;
    justify-content: center !important;
}

</style>

@endpush