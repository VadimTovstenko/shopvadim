$(document).ready (function() {

// $("#newsticker").jCarouselLite({
//     vertical: true,
//     hoverPause: true,
//     btnPrev: "#news-prev",
//     btnNext: "#news-next",
//     visible: 3,
//     auto: 3000,
//     speed: 500
//   });

$("#style-grid").click(function(){

  $("#block-tovar-grid").show();
  $("#block-tovar-list").hide();

});

$("#style-list").click(function(){

  $("#block-tovar-grid").hide();
  $("#block-tovar-list").show();

});

$("#select-sort").click(function(){
  $("#sorting-list").slideToggle(200);

});


});
