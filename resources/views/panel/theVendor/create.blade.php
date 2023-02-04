@extends('panel.layouts.master')

@section("extracss")

<link rel="stylesheet" href="{{url('/')}}/dashboard/css/summernote.min.css">


@endsection



@section("main")
<div class="col-12 col-md-10 p-0 bg-gray">
    <main class="tab-content" id="A" style="margin-top: 58px">
        <div class="tab-content" id="myTabContent0">
            <header>
                <div class="help-container">
                    <!-- Collapsed content -->
                    <div class="collapse mt-3 bg-black border-thin border-gold p-3" id="collapseExample">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                        sapiente ea proident.
                    </div>
                    <!-- Buttons trigger collapse -->
                    <a class="btn btn-black has-arrow-up" data-mdb-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        تنضیمات صفحه
                        <i class="fas fa-angle-up"></i>
                    </a>
                    <button class="btn btn-black has-arrow-up" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        راهنما
                        <i class="fas fa-angle-up"></i>
                    </button>
                </div>
            </header>
            <section id="mainForm">
                <section class="formTitle">
                    <h1>
                        ساخت تبلیغ
                    </h1>
                </section>
                <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data" id="bannerForm">
                    @csrf
                    <div class="md-form mb-5 ">
                        <input type="text" id="vendor_uri" name="vendor_uri" class="form-control en">
                        <label for="vendor_uri" class="label en">آدرس تبلیغ</label>
                    </div>
                    <div class="md-form mb-5  rtl">
                        <input type="text" id="vendor_name" name="vendor_name" class="form-control">
                        <label for="vendor_name" class="label">عنوان تبلیغ</label>
                    </div>

                    <div class="md-form mb-5  rtl">
                         <p for="vendor_shortdesc" class="label">خلاصه تبلیغ</p>
                        <textarea id="vendor_shortdesc" class="summernote" name="vendor_shortdesc"></textarea>
                       
                    </div>

                    <div class="md-form mb-5  rtl">
                        <p for="vendore_text" class="label">متن تبلیغ</p>
                        <div id="vendore_text" class="summernote" name="vendore_text">Hello Summernote</div>
                       
                    </div>
                    
                    <div class="md-form mb-5  rtl">
                        <a href="#" class="btn btn-yellow" id="selectImg">انتخاب تصویر</a>
                    </div>
                    <div id="selectedPreview">
                    </div>
                    <p>
                        افزودن عکس
                    </p>
                    <p>
                        <input type="button" id="loadFileXml" value="بارگذاری عکس" onclick="document.getElementById('fileupload').click();" class="btn btn-yellow" />
                        <input type="file" style="display:none;" name="indeximg" value="افزودن عکس شاخص" accept="image/*" id="fileupload" />
                        <!-- <input type="file" name="indeximg" value="افزودن عکس شاخص"
                                accept="image/*" id="fileupload"/> -->
                    </p>
                    <div id="preview">
                    </div>

                    <div class="m-auto text-center">
                        <input type="submit" value="ثبت اطلاعات" class="btn btn-warning">
                    </div>
                </form>

            </section>
        </div>
        <button></button>
    </main>
</div>
@include("panel.layouts.leftSideMedia")

@endsection

@section("extrajs")
<script src="{{url('/')}}/dashboard/js/summernote.min.js"></script>
<script src="{{url('/')}}/dashboard/js/summernote-ext-elfinder.js"></script>
<script>
$(function(){
    function check_wp()
	{
		if (document.documentElement.outerHTML.match(/<(img|link|script) [^>]+wp-content/i)){
			return 'is_wp';
		} else {
			return 'is_nowp';
		}
    }
	this.extension_check_wp = check_wp;

    
     // var summernote = document.getElementById("summernote");
     $('.summernote').summernote({
        height: 800,
        callbacks: {
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);                 
           }  
        }               
    });

    function sendFile(file, editor, welEditable) {
        // var csrf_token = $('meta[name="csrf-token"]').attr('content');
        // $.ajaxPrefilter(function(options, originalOptions, jqXHR){
        //     if (options.type.toLowerCase() === "post") {
        //         // initialize `data` to empty string if it does not exist
        //         options.data = options.data || "";

        //         // add leading ampersand if `data` is non-empty
        //         options.data += options.data?"&":"";

        //         // add _token entry
        //         options.data += "_token=" + encodeURIComponent(csrf_token);
        //     }
        // });
        data = new FormData();
        data.append("file", file);
        data.append("_token", "{{ csrf_token() }}");
        $.ajax({
        data: data,
        type: "POST",
        url: "<?=route('dropMedia');?>",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            console.log(url);
            var imgNode =document.createElement('img');
            var src= URL.createObjectURL(file);
            console.log(src);
            imgNode.setAttribute("src",src);
            $(summernote).summernote('insertNode', imgNode);
        }
        });
    }
   
});
</script>
@include("panel.media.createModal")
@endsection