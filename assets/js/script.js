$(".down-circle").click(function(){
    $("html,body").animate({
        scrollTop : $("#skills").offset().top
    });
});