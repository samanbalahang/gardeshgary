@extends('mainMgn.layouts.master')

@section("extracss")



@endsection

<!--Main Navigation-->

@section("main")
<div class="col-12 col-md-7 p-0 bg-gray">
    <main class="tab-content">
        <div class="tab-content" id="myTabContent0">
             @include('mainMgn.extras.pageSettings')
            <section id="mainForm">
                <section class="formTitle">
                    <h1>
                        مدیریت صفحه اصلی
                    </h1>
                </section>


                @php
                if(isset($firstPageData)){
                $bannerId = $firstPageData->banner_id;
                }
                @endphp
                <form action="{{route('first-page.store')}}" method="post" enctype="multipart/form-data" id="bannerForm">
                    @csrf
                    <div class="md-form mb-5 ">
                        <section id="banner">
                            <h2>بنر تبلیغاتی بالای سایت</h2>
                            <select name="hasAdBanner" id="hasBanner" class="mb-3">
                                <option value="" disabled selected>بنر تبلیغاتی</option>
                                <option value="1">دارد</option>
                                <option value="0">ندارد</option>
                            </select>
                            <select name="banner_id" id="banner_id">
                                <option value="" selected disabled>انتخاب بنر بالای سایت</option>
                                @foreach ( $banners as $banner)
                                @php
                                $media = App\Models\Media::find($banner->id);
                                $src =$media->image_path;

                                @endphp

                                <option style="background: url({{$src}});" value="{{$banner->id}}" data-image="{{url('/')}}/{{$src}}">
                                    <img src="{{url('/')}}/{{$src}}" alt="{{$banner->banner_name}}" class="w-75">
                                </option>
                                @endforeach

                            </select>
                            <a href="" id="create_banner" class="btn btn-warning m-3">
                                ساخت بنر
                            </a>
                        </section>
                    </div>
                    <hr class="hr">
                    <section class="firstPart">
                        <h2>بخش اول سایت</h2>
                        <div class="md-form mb-5 rtl">
                            <input type="text" id="firstPartTitle" name="firstPartTitle" class="form-control">
                            <label for="firstPartTitle" class="label">عنوان بخش اول هدینگ</label>
                        </div>
                        <select name="firstPartCat" id="firstPartCat" class="mb-3">
                            <option value="" disabled selected>دسته بندی مد نطر برای نمایش در بخش اول</option>
                            <option value="0">تصادفی بین همه تبلیغ ها</option>
                            <option value="1">ندارد</option>
                        </select>
                        <div class="md-form mb-5 rtl">
                            <input type="number" id="numberOfCat" value="12" name="numberOfCat" class="form-control" max="12" min="8">
                            <label for="numberOfCat" class="label">حداکثر تعداد تبلیغ این بخش</label>
                        </div>
                    </section>
                    <div class="m-auto text-center">
                        <input type="submit" value="ثبت اطلاعات" class="btn btn-warning">
                    </div>
                </form>
            </section>
        </div>
    </main>
    @include("mainMgn.firstPage.createBannerModal")

</div>
@include("mainMgn.layouts.leftside")
@endsection

@section("extrajs")
<script src="{{url('/')}}/mainMgn/assets/js/select2.min.js"></script>
<script src="{{url('/')}}/mainMgn/assets/js/form.js"></script>

<script>
    $(function() {


        $("#banner_id").select2({
            templateResult: formatState,
            templateSelection: formatState
        });

        function formatState(opt) {
            if (!opt.id) {
                return opt.text.toUpperCase();
            }

            var optimage = $(opt.element).attr('data-image');
            console.log(optimage)
            if (!optimage) {
                return opt.text.toUpperCase();
            } else {
                var $opt = $(
                    '<span><img src="' + optimage + '" width="60%" /> ' + opt.text.toUpperCase() + '</span>'
                );
                return $opt;
            }
        };

        $("#create_banner").on("click", function(e) {
            alert("hi");
            $("#createBanner").addClass("show");
            e.preventDefault();
        });
        $(".close-modal").on("click", function() {
            $(this).parents('section').removeClass("show");
        });


        // اسکریپت های مدال ساخت بنر 


        $("#selectImgs").on("click", function(e) {
            alert("A");
            $("#selectImgModal").toggleClass("show");
            e.preventDefault();
        });
        $(".modal-image").on("click", function(e) {
            $("#selectedPreview").children().remove();
            $(".modal").toggleClass("show");
            var photoId = $(this).attr("photoId");
            var src = $(this).attr("src");
            var photoidInput = document.createElement("input");
            photoidInput.setAttribute("type", "hidden");
            photoidInput.setAttribute("name", "media_id");
            photoidInput.setAttribute("value", photoId);
            var img = document.createElement("img");
            img.setAttribute("src", src);
            $("#bannerForm").append(photoidInput);
            $("#selectedPreview").append(img);
        });
        $("#seemoreMedia").on("click", function() {
            let moreimageForm = document.getElementById('moreimageForm');
            let theFormData = new FormData(moreimageForm);
            var action = $("#moreimageForm").attr("action");
            // formData.append('username', 'Chris');
            $.ajax({
                url: action,
                data: theFormData,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(e) {
                    var data = e;
                    if (data.length == 0) {
                        alert("عکس بیشتری وجود ندارد");
                    }

                }
            });
            var valuesTime = $("#moreimageForm #offset").attr("value");
            valuesTime = parseInt(valuesTime) + 1;
            $("#offset").attr("value", valuesTime);
        });
    });
</script>
@endsection