<section class="modal image-list-modal">
        <div class="w-75 centerd">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close close-modal"></button>
                </div>
                <div class="container bg-white">
                    <div class="row flex-wrap">
                        @foreach ($firstMedias as $media)
                        <div class="col">
                            <img src="{{url('/')}}/{{$media->image_path}}" alt="{{$media->photo_alt}}" class="modal-image" photoId="{{$media->id}}">

                        </div>
                        @endforeach
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
        $(".modal").toggleClass("show");
        var photoId = $(this).attr("photoId");
        var src = $(this).attr("src");
        var photoidInput = document.createElement("input");
        photoidInput.setAttribute("type", "hidden");
        photoidInput.setAttribute("name", "media_id");
        photoidInput.setAttribute("value", photoId);
        var img = document.createElement("img");
        img.setAttribute("src", src);
        img.setAttribute("class", "w-100");
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
                }else{

                }

            }
        });
        var valuesTime = $("#moreimageForm #offset").attr("value");
        valuesTime = parseInt(valuesTime) + 1;
        $("#offset").attr("value", valuesTime);
    });
</script>