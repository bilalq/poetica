<dl class="tabs pill">
  <dd class="<?=$tab1?>"><a href="/home/feed">Global Feed</a></dd>
  <dd class="<?=$tab2?>"><a href="/home">My Poems</a></dd>
  <dd class="<?=$tab3?>"><a href="/home/friends">Poems of the Followed</a></dd>
</dl>

<?php foreach ($poems as $poem): ?>
<div class="entry panel row">
  <!-- POEM HALF -->
  <div class="six columns offset-by-three end">
    <!-- Title -->
    <div class="row">
      <div class="twelve columns centered">
      <h3><a href="/poem/<?=$poem->poem_id?>"><?=$poem->title?></a></h3>
      </div>
    </div>

    <!-- Author -->
    <div class="row">
      <div class="twelve columns centered">
        <p class="author">
          <?= gravatar($poem->email, 45) ?>
          by <?=$poem->first_name?> <?=$poem->last_name?><br>
          <?=$poem->post_time?><br>
        </p>
      </div>
    </div>

    <!-- Content -->
    <div class="row">
      <div class="twelve columns centered">
        <pre class="poem">
<?=$poem->content?>
        </pre>
      </div>
    </div>

  </div>
</div>
<?php endforeach; ?>
