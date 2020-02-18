$(document).ready(function() {
  //selector tag
  $("h1").css("color", "blue");
  $("p").css("color", "red");

  //selector class
  $(".h1").css("background-color", "blue");
  $(".p").css("color", "salmon");

  //selector id
  $("#h1").css("background-color", "blue");
  $("#p").css("color", "salmon");
  //selector all
  $("*").css("background-color", "red");
});
