$(document).ready(function(  ) {
    /*    $("#home").click(function() {
     //alert ($(".slideshow").css("right"));
     if ($(".profile").css("right") == "auto" || $(".slideshow").css("right") == $(".slideshow").css("right")) {
     $(".slideshow").animate({right: "0"}, 600, function() {
     });
     $(".tabswip").show();
     $(".profile").animate({left: "100%"}, 600, function() {
     });
     }
     });
     $("#profile").click(function() {
     if ($(".slideshow").css("right") == "auto" || $(".slideshow").css("right") == "0px") {
     $(".profile").animate({left: "0%"}, 600, function() {
     });
     $(".tabswip").hide();
     $(".slideshow").animate({right: "100%"}, 600, function() {
     });
     
     }
     });*/
    $('.slidedown').click(function() {
        var bodyheight = $(window).height();
        $('html,body').animate({'scrollTop': bodyheight + 'px'});
    });


    $(".bar ul li").bind("mouseenter", function() {
        $(this).children("ul").css("top", "30").slideDown("slow");
    });
});