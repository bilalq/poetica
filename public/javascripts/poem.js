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
              console.log(response);
              var comm = '<div class="row comment-row"><div class="three columns offset-by-one"><img style="height:45px; width: 45px;" src="' + $('#menu-bar img').attr('src') + '"><p class="commenter-name">'+ $('#user-name').text() + '<br><br><em class="comment-timestamp">'+response+'</em></p></div><div class="seven columns end"><p class="comment-text">'+comment_text+'</p></div></div>';

              $('.displayed-comments').append(comm);
              $(this).val('');
              $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });

            }
          }
        });
      }

    }
  });

});
          //data: { "comment": comment_text, "poem_id": },
