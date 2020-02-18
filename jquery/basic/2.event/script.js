$(document).ready(function() {
  $("#click").click(function() {
    alert("saya sedang beljara jquery");
  });
  $("#dbclick").dbclick(function() {
    $(this).css("background-color", "yellow");
  });
  $(".mouse").mouseleave(function() {
    $(this).css("background-color", "red");
  });
  $(".mouse").mouseenter(function() {
    $(this).css("background-color", "blue");
  });
  $("#keydown").keydown(function() {
    $("#pesan_keydown").text($(this).val());
  });
});
