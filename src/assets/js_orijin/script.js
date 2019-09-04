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