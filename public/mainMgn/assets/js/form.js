$(function(){
    $(".md-form").focusin("click",function(){
        var theinput =  $(this).find("input").val();
        if(theinput == ""){
           $(this).find("input~label").addClass("active");
        }
       
    });
   $("input").focusout(function(){
        var theinput =  $(this).val();
        if(theinput == ""){
            $(this).siblings("label").toggleClass("active");
        }
    });
//   alert("A");

});