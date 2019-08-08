'use strict';

var $ = require('jQuery');

$(".down-circle").click(function(){
    $("html,body").animate({
        scrollTop : $("#skills").offset().top
    });
});