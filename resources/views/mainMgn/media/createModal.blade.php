<section class="modal image-list-modal">
        <div class="w-75 centerd">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close close-modal"></button>
                </div>
                <div class="container bg-white">
                    <div class="row flex-wrap" id="imageModalWraper">
                        @if (isset($firstMedias) && !$firstMedias->isEmpty())               
                        @foreach ($firstMedias as $media)
                        <div class="col border image-modal-each-container">
                            <img src="{{url('/')}}/{{$media->image_path}}" alt="{{$media->photo_alt}}" class="modal-image" photoId="{{$media->id}}">

                        </div>
                        @endforeach
                        @else
                        <div class="col border image-modal-each-container">
                            <p>
                                عکسی برای بارگذاری یافت نشد.
                                <br>
                                این مدال را بسته و از دکمه بارگذاری عکس برای انتخاب عکس استفاده کنید!
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="seemoreMedia">مشاهده عکس های بیشتر</button>
                    <form id="moreimageForm" action="{{route('bannerMorMedia')}}">
                        @csrf
                        <input type="hidden" value="2" id="offset">
                        <input type="submit" style="display: none;">
                    </form>
                </div>
            </div>
        </div>
</section>
<script>
    $(".close-modal").on("click", function(e) {
        $(".modal.image-list-modal").toggleClass("show");

    });

    $("#selectImg").on("click", function(e) {
        console.log("sa");
        $(".modal.image-list-modal").toggleClass("show");
        e.preventDefault();
    });

    $(".modal-image").on("click", function(e) {
        $("#selectedPreview").children().remove();
        $(".image-list-modal").toggleClass("show");
        var photoId = $(this).attr("photoId");
        var src = $(this).attr("src");
        var photoidInput = document.createElement("input");
        photoidInput.setAttribute("type", "hidden");
        photoidInput.setAttribute("name", "media_id");
        photoidInput.setAttribute("value", photoId);
        var img = document.createElement("img");
        img.setAttribute("src", src);
        img.setAttribute("class", "max-w-100");
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
                var datas = e;
                var data;
                var base = "<?php echo url("/");?>";
                console.log(datas);
                if (datas.length == 0) {
                    alert("عکس بیشتری وجود ندارد");
                }else{
                    for(var y =0 ; datas.length>y; y++ ){
                        data= datas[y];
                        var div = document.createElement("div");
                        div.setAttribute("class","col border image-modal-each-container");
                        var images = document.createElement("img");
                        images.setAttribute("src",base + "/" +data.image_path);
                        div.appendChild(images); 
                        $("#imageModalWraper").append(div);
                        console.log(data.image_path);

                    }
                }

            }
        });
        var valuesTime = $("#moreimageForm #offset").attr("value");
        valuesTime = parseInt(valuesTime) + 1;
        $("#offset").attr("value", valuesTime);
    });
</script>