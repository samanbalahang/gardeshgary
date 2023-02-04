$(window).on("load",function () {

    $("#loader").remove();
    $(".select-2").select2({
        placeholder: "تایپ کنید",
        tags: true,
        width: '100%',
        tokenSeparators: [',', ' '],
       
    });
   
});
