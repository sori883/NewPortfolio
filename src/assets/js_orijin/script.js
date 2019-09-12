// aos
// https://github.com/michalsnik/aos/tree/master

AOS.init();

// ファーストビューの移動アイコン

$(".first-down-icon").click(function(){
  $("html,body").animate({
    scrollTop : $("#about").offset().top
  });
});

// ページ内リンクのスクロール

$('a[href^="#"]').click(function(){
  var speed = 500;
  var href= $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top;
  $("html, body").animate({scrollTop:position}, speed, "swing");
  return false;
});

// スライドバー

$(document).ready(function(){
  $('.sidenav').sidenav();
});

