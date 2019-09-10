// ファーストビューの移動アイコン
$(".first-down-icon").click(function(){
  $("html,body").animate({
    scrollTop : $("#about").offset().top
  });
});

// スライドバー
$(document).ready(function(){
  $('.sidenav').sidenav();
});

// ページ内リンクのスクロール
$('a[href^="#"]').click(function() {
  var speed = 400;
  var href= $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top;
  $('body,html').animate({scrollTop:position}, speed, 'swing');
  return false;
});