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
                                    <h2 class="fw-9 wow fadeInUp" data-wow-delay="0s">Images Upload</h2>
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
                                                                <p class="fs-18"><strong>{{__('Image Upload Task')}}</strong></p>
                                                                <p class="fs-14">
                                                                    {{__('Please upload a photography image that you have taken yourself. The image should be in .jpg, .jpeg, .png format. The image should be clear and of high quality. The image should not be blurry or pixelated. The image should not contain any watermarks or logos. The image should not contain any text or captions. The image should not contain any offensive or inappropriate content.')}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <form class="wallet-withdrawal-form" action="{{ route('image_upload', $task->id) }}" method="POST" accept="image/*" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="account-number">
                                                                <div class="account-number-title">
                                                                    <p>{{__('Upload Image')}}</p>
                                                                    <p class="fs-14">{{__('Image should be in .jpg, .jpeg, .png format')}}</p>
                                                                </div>


                                                                <div class="edit-avatar">
                                                                    <div class="image" id="imageContainer">
                                                                        <img id="previewAvt" src="{{ asset('uploads/demo.png') }}" alt="Avatar">
                                                                    </div>

                                                                    <div class="d-flex justify-content-center mt-3">
                                                                        <input type="file" id="fileInput" name="image" accept="image/*">
                                                                    </div>

                                                                </div>


                                                                <p class="fs-15" style="color: red; font-weight: bold;">⚠️ {{__('Please note that you will not be able to edit your article once you submit it. Please make sure that your article is correct before submitting it.')}}</p>
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


                    <!-- section-dowload-app -->

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

.edit-avatar {
    position: relative;
    width: 100%;
    max-width: 200px;
    margin: 0 auto;
    margin-bottom: 20px;
    text-align: center;
}

.edit-avatar .image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 10px;
    border: 1px solid #e5e5e5;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f8f8;
}

.edit-avatar .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    transition: 0.3s ease-in-out;
}

.edit-avatar .image:hover {
    opacity: 0.8;
}

.ic-edit, .ic-del {
    background: #fff;
    border: none;
    cursor: pointer;
    padding: 5px;
    border-radius: 50%;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    position: absolute;
    top: 5px;
}

.ic-edit {
    right: 35px;
}

.ic-del {
    right: 5px;
}

.ic-edit i, .ic-del i {
    font-size: 16px;
    color: #666;
}

#fileInput{

    background: #f8f8f8;
    border: 1px solid #e5e5e5;
    border-radius: 10px;
    padding: 10px;
    width: 100%;
    

}

</style>



@endpush



@push('js')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("fileInput");
        const previewAvt = document.getElementById("previewAvt");
        const imageContainer = document.getElementById("imageContainer");
        const deleteImage = document.getElementById("deleteImage");

        // Click on image or edit button to open file input
        imageContainer.addEventListener("click", function () {
            fileInput.click();
        });

        document.getElementById("chooseImageChange").addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation(); // Stop the event from bubbling up to the imageContainer
            fileInput.click();
        });

        // Preview uploaded image
        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewAvt.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove the selected image
        deleteImage.addEventListener("click", function () {
            previewAvt.src = "./images/section/member-3.jpg"; // Reset to default image
            fileInput.value = ""; // Clear the input
        });
    });
</script>


@endpush