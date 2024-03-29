<div class="row">
  <div class="ten columns offset-by-one end panel">

    <!-- TITLE -->
    <div class="row">
      <div class="twelve columns">
      <h3 class="full-title"><?=$poem['title']?></h3>
      </div>
    </div>

    <div class="row">
      <div class="twelve columns">
      <h3 class="poem-category"><em>Type of Poem: <?=$poem['category']?></em></h3>
      </div>
    </div>

    <!-- AUTHOR -->
    <div class="row">
      <div class="twelve columns centered">
        <div class="author row">
          <div class="columns mobile-one">
            <p><?= gravatar($poem['email'], 45) ?></p>
          </div>
          <div class="mobile-two credit-block columns end">
            <p>by <?=$poem['first_name']?> <?=$poem['last_name']?> <br><?=$poem['post_time']?></p>
          </div>
        </div>
      </div>
    </div>


    <!-- CONTENT -->
    <div class="row">
      <div class="six columns end">
<pre class="poem-full">
<?=$poem['content']?>
</pre>
      </div>
    </div>


  <!-- COMMENTS -->
  <div class="row full-comments">
    <div class="twelve columns comments-box">
      <div class="displayed-comments">
        <h5>Comments:</h5>
        <?php foreach ($comments as $comment): ?>
          <div class="row comment-row">
            <div class="three columns offset-by-one">
              <?= gravatar($comment['email'], 45) ?>
              <p class="commenter-name">
                <?=$comment['first_name']?> <?=$comment['last_name']?>:
                <br><br>
                <em class="comment-timestamp"><?=$comment['post_time']?></em>
              </p>
            </div>
            <div class="seven columns end">
            <p class="comment-text"><?=$comment['content']?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <form id="comment_submit">
        <textarea id="new_comment" name="content" type="text" placeholder="Comment on this poem"></textarea>
        <input style="display: none;" name="poem_id" value="<?=$poem['poem_id']?>">
        <input style="display: none;" name="user_id" value="<?=$this->session->userdata('user_id')?>">
      </form>
    </div>
  </div>

  </div> <!-- END FIRST PANEL -->
</div>
