$(function(){
    var status;
    $(".loginCont #password").blur(function(){
        if($(this).val().length<6){
            $(".msg").fadeIn();
            status = false;
        } else{
            $(".msg").fadeOut();
            $(".loginCont .submit").unbind('click');
            status = true;
        }
    })
    $('#loginform').submit(function(e){
        if(status == false){
            e.preventDefault();
            $('.loginCont #password').focus();
        }
    })
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(".DashboardBox .EditBox input").blur(function(){
        if($(this).val().length > 0){
            $(this).next("span").fadeOut("slow");
        } else {
            $(this).next("span").fadeIn("slow");

        }
    })
})
