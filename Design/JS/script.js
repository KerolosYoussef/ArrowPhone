$(function(){
    var currLoc = $(location).attr('href'); 
    if(currLoc=="http://127.0.0.1/Hospital%20Mangement%20System/Contact.php"){
        $(".collapse #home").removeClass("active");
        $(".collapse #contact").addClass("active");
    }
    $(".contact input, .contact textarea").blur(function(){
        if($(this).val().length > 0){
            $(this).next("span").fadeOut("slow");
        } else {
            $(this).next("span").fadeIn("slow");

        }
    })
})