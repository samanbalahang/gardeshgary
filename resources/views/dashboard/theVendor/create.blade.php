@extends('dashboard.layout.master')

@section("extracss")

<link rel="stylesheet" href="{{url('/')}}/dashboard/css/summernote.min.css">


@endsection



@section("main")
<div class="col-68 col-md-68 p-0 bg-gray">
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
                         <p for="vendor_name" class="label">خلاصه تبلیغ</p>
                        <textarea id="summernote" class="summernote" name="vendor_shortdesc"></textarea>
                       
                    </div>

                    <div class="md-form mb-5  rtl">
                        <p for="vendor_name" class="label">متن تبلیغ</p>
                        <div id="summernote" class="summernote">Hello Summernote</div>
                       
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
@include("dashboard.layout.leftSideMedia")

@endsection

@section("extrajs")
<script src="{{url('/')}}/dashboard/js/summernote.min.js"></script>
<script src="{{url('/')}}/dashboard/js/summernote-ext-elfinder.js"></script>
<script>
$(function(){
    Dropzone.autoDiscover = false;
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
    // drop zone
    
    $("#multymedia").dropzone({
        url: "<?=route('dropMedia');?>",
        // The configuration we've talked about above
        autoProcessQueue: true,
        // array or not uploadMultiple : true is array
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,

        // The setting up of the dropzone
        init: function(e) {
        console.log("d");
        var myDropzone = this;

        // First change the button to actually tell Dropzone to process the queue.
        // this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
        //     // Make sure that the form isn't actually being sent.
        //     myDropzone.processQueue();
        //     e.preventDefault();
        //     e.stopPropagation();
        // });

        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
        // of the sending event because uploadMultiple is set to true.
        this.on("sendingmultiple", function() {
            console.log("a");
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.
        });
        this.on("successmultiple", function(files, response) {

            console.log("b");
            // Gets triggered when the files have successfully been sent.
            // Redirect user or notify of success.
        });
        this.on("errormultiple", function(files, response) {
            console.log("c");
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
        });
        this.on('success', function(file, response) {
        console.log("success!");
        });

        }
    });
   
});
</script>
@include("dashboard.media.createModal")
@endsection