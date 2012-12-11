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
        <p class="author">
          <?= gravatar($poem['email'], 45) ?>
          by <?=$poem['first_name']?> <?=$poem['last_name']?>
        </p>
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
      <h5>Comments:</h5>
      <?php for ($i = 0; $i < 10; $i++) { ?>
        <div class="row comment-row">
          <div class="three columns offset-by-one">
            <?= gravatar('bilalquadri92@gmail.com', 45) ?>
            <p class="commenter-name">
              Bilal Quadri:
              <br><br>
              <em class="comment-timestamp">10PM Jan 3, 2012</em>
            </p>
          </div>
          <div class="seven columns end">
            <p class="comment-text">I love this poem. Word is bond, yo. Like, Cool Runnings means peace be the journey.</p>
          </div>
        </div>
      <?php } ?>
      <form>
        <textarea id="new_comment" type="text" placeholder="Comment on this poem"></textarea>
      </form>
    </div>
  </div>

  </div> <!-- END FIRST PANEL -->
</div>
