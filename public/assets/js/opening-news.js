function openNews() {
  document.getElementById("openedNews").style.width = "110%";
}

function closeNews() {
  document.getElementById("openedNews").style.width = "0%";
}


$(document).ready(function () {

  /*opening news*/
  $("#recipeCarousel .img-opacity").click(function () {

    var news_id = $(this).attr("news-id");
    var route = $(this).attr("data-href");


    $(".logo").animate({
      transition: "top 4.4s ease-in-out",
      top: "-100px"
    });

    $(".live").css("visibility", "hidden");
    openNews();
    setTimeout(function () {
      window.location.href = route;
    }, 1500);

    $(".close-gallery")
      .removeClass("d-none")
      .addClass(" animate faster fadeInDown");
 
  });

  
});
