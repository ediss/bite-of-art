function openNews() {
  document.getElementById("openedNews").style.width = "110%";
}

function closeNews() {
  document.getElementById("openedNews").style.width = "0%";
}


$(document).ready(function () {

  /*opening news*/
  $(".img-opacity").click(function () {

    var news_id = $(this).attr("news-id");


    $(".logo").animate({
      transition: "top 4.4s ease-in-out",
      top: "-100px"
    });

    $(".live").css("visibility", "hidden");
    openNews();
    setTimeout(function () {
      window.location.href = "/news/"+news_id;
    }, 1500);

    $(".close-gallery")
      .removeClass("d-none")
      .addClass(" animation-duration2 fadeInDown");
 
  });

  
});
