// نمایش شماره موبایل
$("button.contactInformation").click(function(){
  $("div.fadeIn").fadeIn();
})
$("button.contactInformation").dblclick(function(){
  $("div.fadeIn").fadeOut();
})

// comment
$("button.userComment").click(function(){
  $("div.comment-div").fadeIn();
})
$("button.cancel-comment").click(function(){
  $("div.comment-div").fadeOut();
})
