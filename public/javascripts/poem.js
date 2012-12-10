$(document).ready(function() {
  $("#new_comment").keydown(function(e){
    if (e.keyCode == 13 && !e.shiftKey)
      {
        e.preventDefault();
        //Do ajax call here
      }
  });
});
