$(document).ready(function() {

  /* Inserting new comments */
  $("#new_comment").keydown(function(e){
    if (e.keyCode == 13 && !e.shiftKey) {
      e.preventDefault();
      var comment_text = $(this).val();

      if(comment_text) {
        $.ajax({
          type: 'POST',
          url: '/poem/comment',
          data: $('form#comment_submit').serialize(),
          success: function(response) {
            if ( ! response) {
              alert('Failed to insert comment');
            }
            else {
              alert('Writing comment succeeded');
              console.log(response);
            }
          }
        });
      }

    }
  });

});
          //data: { "comment": comment_text, "poem_id": },
