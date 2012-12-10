<div class="row">
  <div class="ten columns offset-by-one end panel">

    <!-- TITLE -->
    <div class="row">
      <div class="twelve columns">
        <h3 class="full-title">The Realm of Suffering</h3>
      </div>
    </div>

    <!-- AUTHOR -->
    <div class="row">
      <div class="twelve columns centered">
        <p class="author">
          <?= gravatar('bilalquadri92@gmail.com', 45) ?>
          by Bilal Quadri
        </p>
      </div>
    </div>


    <!-- CONTENT -->
    <div class="row">
      <div class="six columns end">
<pre class="poem-full">
After trudging through thick mist and marsh,
I found myself lost in Grief,
And discovered a world, cruel and harsh,
Where Agony reigned chief.

Alone at first, I was therein,
Until Rage came and stood by my side.
He gave me strength to his akin,
And was there for me, when I cried.

As my tears began to fall,
They gathered around me a sea of Despair.
I drowned in regrets, large and small,
And not a soul in the world seemed to care.

In these struggles, I was never again alone,
For Misery always kept me company.
I gazed at Sorrow upon his throne,
And Darkness was all that I could see.
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
            <p class="commenter-name">Bilal Quadri:</p>
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
