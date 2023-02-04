@extends('mainMgn.layouts.master')

@section("extracss")



@endsection

<!--Main Navigation-->

@section("main")      
<div class="col-12 col-md-7 p-0 bg-gray">
        <main class="tab-content" id="A" style="margin-top: 58px">
            <div class="tab-content" id="myTabContent0">
                @include("mainMgn.extras.pageSettings")
                <section id="mainForm">
                    <section class="formTitle">
                        <h1>
                            ساخت مدیا
                        </h1>
                    </section>
                    <form action="{{route('media.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="md-form mb-5 ">
                            <input type="text" id="photo_name" name="photo_name" class="form-control">
                            <label for="photo_name" class="label">عنوان عکس</label>
                        </div>
                        <div class="md-form mb-5  rtl">
                            <input type="text" id="photo_alt" name="photo_alt" class="form-control">
                            <label for="photo_alt" class="label">متن جایگذین</label>
                        </div>
                        <div class="md-form mb-5  rtl">
                            <input type="text" id="photo_descript" name="photo_descript" class="form-control">
                            <label for="photo_descript" class="label">توضیحات </label>
                        </div>
                        <!-- <div class="md-form mb-5  rtl">
                            <input type="text" name="image_path" id="image_path" class="form-control">
                            <label for="image_path" class="label">آدرس عکس </label>
                        </div> -->
                        @include("mainMgn.extras.inputPreviw")
                            
                                          
                    
                        
                                <div class="m-auto text-center">
                                        <input type="submit" value="ثبت اطلاعات" class="btn btn-warning">
                                </div>
                    </form>
                    <p class="mt-5">
                        افزودن گروهی عکس برای گالری
                    </p>    
                    <p>
                        عکس های خود را به داخل کادر زیر بکشید.
                    </p>
                    <form method="post" action="{{route('dropMedia')}}"  class="" enctype="multipart/form-data" id="multymedia">
                        @csrf
                    <div class="dz-default dz-message"><span>فایل های خود را به این ناحیه درگ کنید</span></div>
                    </form>
                </section>
            </div>
        </main>
    </div>
    @include("mainMgn.layouts.leftside")
@endsection

@section("extrajs")
<script src="{{url('/')}}/mainMgn/assets/js/form.js"></script>
<script src="{{url('/')}}/mainMgn/assets/js/dropzone.min.js"></script>
<script>
$(function(){
    $("[data-mdb-target]").on("click",function(){
        var theId=$(this).attr("data-mdb-target");
        $(""+theId+"").toggleClass("show");
    });
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


@endsection