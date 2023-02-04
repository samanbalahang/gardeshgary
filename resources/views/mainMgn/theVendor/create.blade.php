@extends('mainMgn.layouts.master')

@section("extracss")
<meta name="csrf-token" content="{{ csrf_token() }}" />



@endsection



@section("main")
<div class="col-12 col-md-7 p-0 bg-gray">
    <main class="tab-content" id="A" style="margin-top: 58px">
        <div class="tab-content" id="myTabContent0">
           @include("mainMgn.extras.pageSettings")
            <section id="mainForm">
                <section class="formTitle">
                    <h1>
                        ساخت تبلیغ
                    </h1>
                </section>
                <form action="{{route('vendors.update',['1'])}}" method="post" enctype="multipart/form-data" id="bannerForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="gallery_id" name="gallery_id" class="form-control en">
                    <input type="hidden" id="id" name="id" class="form-control" value="">
                    <input type="hidden" id="vendor_comment" name="vendor_comment" class="form-control" value="">
                    <input type="hidden" id="vendor_generalCat" name="vendor_generalCat" class="form-control" value="1">
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
                        <textarea id="vendor_shortdesc" class="smallnote" name="vendor_shortdesc"></textarea>
                       
                    </div>

                    <div class="md-form mb-5  rtl">
                        <p for="vendore_text" class="label">متن تبلیغ</p>
                        <textarea id="vendore_text" class="summernote" name="vendore_text"></textarea>                       
                    </div>
                    
                    <div class="md-form mb-5  rtl">
                        <a href="#" class="btn btn-primary" id="selectImg">انتخاب تصویر</a>
                    </div>
                    <div id="selectedPreview">
                    </div>
                    <p>
                        افزودن عکس
                    </p>
                    @include("mainMgn.extras.inputPreviw")
                    <!-- <p>
                        <input type="button" id="loadFileXml" value="بارگذاری عکس" onclick="document.getElementById('fileupload').click();" class="btn btn-primary" />
                        <input type="file" style="display:none;" name="indeximg" value="افزودن عکس شاخص" accept="image/*" id="fileupload" /> -->
                        <!-- <input type="file" name="indeximg" value="افزودن عکس شاخص"
                                accept="image/*" id="fileupload"/> -->
                    <!-- </p>
                    <div id="preview">
                    </div> -->
                    <div id="selectedPreview"></div>
                    <div class="m-auto text-center">
                        <input type="submit" value="ثبت اطلاعات" class="btn btn-warning" id="submit">
                    </div>
                </form>

            </section>
        </div>
        <button></button>
    </main>
</div>
@include("mainMgn.layouts.leftSideMedia")
@include("mainMgn.media.createModal")

@endsection

@section("extrajs")
<script src="{{url('/')}}/mainMgn/assets/js/form.js"></script>
<script src="{{url('/')}}/mainMgn/assets/js/summernote.min.js"></script>
<script src="{{url('/')}}/mainMgn/assets/js/summernote-ext-elfinder.js"></script>
<script src="{{url('/')}}/mainMgn/assets/js/dropzone.min.js"></script>
<script>
$(function(){
    // با بسته شدن سلکت تگ ها تگ ها را در لیست درج میکند
    $("#tag_name").on("select2:close",function (e) {
        if($("#id").val()!=""){
        var id =  $("#id").val();   
        var tag_name = $("#tag_name").val();
        tag_name.forEach(function(e){
            createAelements(e);       
           
        });
        }else{
            Swal.fire(
                'آدرس تبلیغ خالی است',
                'لطفا آدرس و عنوان تبلیغ را قبل از تعیین برچسب پر کنید!',
                'error'
            ).then((result) => {
                 $("#tag_name").val(null).trigger('change');
            })
        }
        checkremovetag();
    });
    function createAelements(e){
        // is this first tag 
        var child = $("#tagList").children().length;
        var notin = 0;
    
        if(child == 0){
            var div = document.createElement("div");
            div.setAttribute("class","rtl text-start")
            var atag = document.createElement("a");
            atag.setAttribute("href","#");
            atag.setAttribute("class","px-1");
            var textnode = document.createTextNode(e);
            atag.appendChild(textnode);
            div.appendChild(atag);
            $("#tagList").append(div);
        }else{
            $('#tagList div').children().each(function(){
                if($(this).text() == e){
                    notin = 1;
                }
            });
            if(notin == 0){
                var atag = document.createElement("a");
                    var brtag =document.createElement("br");
                    atag.setAttribute("href","#");
                    atag.setAttribute("class","px-1");
                    var textnode = document.createTextNode(e);
                    atag.appendChild(textnode);
                    $('#tagList').children("div").append(atag);
                    $('#tagList').children("div").append(brtag);
                }
            
        }
        
    }

    function checkremovetag(){
        //#tag_name IS for leftSideMedia add tag
       var tag_name =  $("#tag_name").val();
        $('#tagList div').children("a").each(function(){
            var init = 0;
            var aTagText = $(this).text();   
            tag_name.forEach(function(e){
              if(aTagText == e){    
                init = 1;
              }     
            });
            if(init == 0){
                $(this).remove();

            }
        });



        // حذف تگ های اضافه شکست خط
        $('#tagList div').children().each(function(){
            // alert(this.tagName);
            if(this.tagName == "BR"){
                // alert(this.tagName);
                if($(this).siblings().prop("tagName")){
                    if($(this).siblings().prop("tagName") == "br"){
                        $(this).remove();
                    }
                }
            }
        });
    }

    // با تایید تگ ها رخ میدهد
    $("#tagApprove").on("click",function(e){
        let tag_names = [];
        var id = $("#id").val();
        $('#tagList div').children("a").each(function(){
            tag_names.push($(this).text());


        });
        var vendor_uri = "vendor_uri";
        // alert(tag_names);
        $.ajax({
                url: "<?=route('tags.ajax');?>",
                type: "POST",
                data: {
                    tag_names: tag_names,
                    vendor_id : id,
                },
                success: function(url){
                    if(url != ""){
                        $("#id").val(url);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'ثبت شد',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            });
        e.preventDefault();
    });

// انتخاب دسته بندی جدید
    $("#cat_name").on("select2:close",function (e) {
        if($("#id").val()!=""){
        var id =  $("#id").val();   
        var cat_name = $("#cat_name").val();
        cat_name.forEach(function(e){
            createCatAelements(e);       
           
        });
        }else{
            Swal.fire(
                'آدرس تبلیغ خالی است',
                'لطفا آدرس و عنوان تبلیغ را قبل از تعیین برچسب پر کنید!',
                'error'
            ).then((result) => {
                 $("#cat_name").val(null).trigger('change');
            })
        }
        checkremovecat();
    });
    // ساخت لیست دسته بندی ها
    function createCatAelements(e){
        // is this first cat 
        var child = $("#catList").children().length;
        var notin = 0;
    
        if(child == 0){
            var div = document.createElement("div");
            div.setAttribute("class","rtl text-start")
            var acat = document.createElement("a");
            acat.setAttribute("href","#");
            acat.setAttribute("class","px-1");
            var textnode = document.createTextNode(e);
            acat.appendChild(textnode);
            div.appendChild(acat);
            $("#catList").append(div);
        }else{
            $('#catList div').children().each(function(){
                if($(this).text() == e){
                    notin = 1;
                }
            });
            if(notin == 0){
                var acat = document.createElement("a");
                    var brtag =document.createElement("br");
                    acat.setAttribute("href","#");
                    acat.setAttribute("class","px-1");
                    var textnode = document.createTextNode(e);
                    acat.appendChild(textnode);
                    $('#catList').children("div").append(acat);
                    $('#catList').children("div").append(brtag);
                }
            
        }
        
    }
//  چک و حذف دسته بندی های تکراری
    function checkremovecat(){
        //cat_name IS for leftSideMedia add tag
       var cat_name =  $("#cat_name").val();
        $('#tagList div').children("a").each(function(){
            var init = 0;
            var aTagText = $(this).text();   
            cat_name.forEach(function(e){
              if(aTagText == e){    
                init = 1;
              }     
            });
            if(init == 0){
                $(this).remove();

            }
        });
        // حذف تگ های اضافه شکست خط
        $('#catList div').children().each(function(){
            // alert(this.tagName);
            if(this.tagName == "BR"){
                // alert(this.tagName);
                if($(this).siblings().prop("tagName")){
                    if($(this).siblings().prop("tagName") == "br"){
                        $(this).remove();
                    }
                }
            }
        });
    }

    $("#catApprove").on("click",function(e){
        let cat_names = [];
        var id = $("#id").val();
        $('#tagList div').children("a").each(function(){
            cat_names.push($(this).text());


        });
        var vendor_uri = "vendor_uri";
        // alert(tag_names);
        $.ajax({
                url: "<?=route('vendor.cat.ajax');?>",
                type: "POST",
                data: {
                    cat_names: cat_names,
                    vendor_id : id,
                },
                success: function(url){
                    if(url != ""){
                        $("#id").val(url);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'ثبت شد',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            });
        e.preventDefault();
    });

    // افزودن امکان کامنت گذاری در متن
    $("#comment").on("click",function(){
        if ($(this).prop('checked')==true){ 
            if($("#vendor_comment").val()!="1"){
                $("#vendor_comment").val(1); 
            }
        }
    });
    $("#generalCat").on("click",function(){
        if ($(this).prop('checked')==true){ 
            if($("#vendor_generalCat").val()!="1"){
                $("#vendor_generalCat").val(1); 
            }
        }
    });
    // با رفتن به فیلد های بعدی رخ میدهد برای ذخیره اطلاعات
    $("#vendor_name").focusout(function(){
       if($("#id").val() ==""){ 
        if($(this).val()!=""){
            if($("#vendor_uri").val()==""){
                var theval = $("#vendor_name").val();
                theval = theval.replace(/ /g, "-");
                $("#vendor_uri").val(theval);  
            }
            var vendor_name = $("#vendor_name").val();
            var vendor_uri = $("#vendor_uri").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?=route('vendors.store');?>",
                type: "POST",
                data: {
                    vendor_name: vendor_name,
                    vendor_uri:  vendor_uri,
                },
                success: function(url){
                    if(url != ""){
                        $("#id").val(url);
                    }
                }
            });
       }
       }
    });

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
            $("#gallery_id").val(response);    
        //   console.log("file:");
        //   console.log(file);
        //   console.log("------------");  
        //   console.log("response:");
        //   console.log(response);
          console.log("success!");
        });
        }
    });
    $('.smallnote').summernote({
        height: 200,
        callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);                 
               }  
            },
        fontNames: ['iransance','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','tahoma'],
        fontname:'iransance',
        fontNamesIgnoreCheck: ['iransance','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','tahoma'],
        addDefaultFonts: false,
        followingToolbar: false,
        dialogsInBody: true,
    });

    $('.summernote').summernote({
            height: 800,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);                 
               }  
            },
            // toolbar: [
            // ['style', ['style']],
            // ['font', ['bold', 'underline', 'clear']],
            // ['fontname', ['fontname']],
            // ['color', ['color']],
            // ['para', ['ul', 'ol', 'paragraph']],
            // ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            // ['view', ['fullscreen', 'codeview', 'help']],
            // ],
           fontNames: ['iransance','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','tahoma'],
           fontname:'iransance',
           fontNamesIgnoreCheck: ['iransance','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New','tahoma'],
           addDefaultFonts: false,
           
           followingToolbar: false,
           dialogsInBody: true,
            
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
        
    // function check_wp()
	// {
	// 	if (document.documentElement.outerHTML.match(/<(img|link|script) [^>]+wp-content/i)){
	// 		return 'is_wp';
	// 	} else {
	// 		return 'is_nowp';
	// 	}
    // }
	// this.extension_check_wp = check_wp;

    
    //  // var summernote = document.getElementById("summernote");
    //  $('.summernote').summernote({
    //     height: 800,
    //     callbacks: {
    //         onImageUpload: function(files, editor, welEditable) {
    //             sendFile(files[0], editor, welEditable);                 
    //        }  
    //     }               
    // });

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
