<div class="row">
	<div class="two columns">
    	<?=gravatar($profile['email'], 150)?>
    </div>
    <div class="five columns">
    	<h5>Name:</h5><?= $profile['first_name']; ?> <?= $profile['last_name']; ?>
        <br/>
    	<h5>Email:</h5><?= $profile['email']; ?>
    </div>
    <div class="five columns">
    	<h5>Birthday:</h5><?= $profile['birth_date']; ?>
        <br/>
        <h5>Address:</h5>
		<?= $profile['num_address']; ?>  <?= $profile['street_address']; ?> <?= $profile['town_address']; ?>
    </div>
</div>
<div class="row">
	<div class="five columns">
    	<h5>Recent Poems:</h5>
    </div>
    <div class="seven columns">
    	<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recent Posts:</h5>
    </div>
</div>
<div class="row panel">
	<div class="six columns">
    	<?php foreach ($poems as $poem): ?>
    	<div class="row">
        	<div class="one columns">
			<b>Title: </b>
			</div>
			<div class="eleven columns">
			&nbsp;<?= $poem->title; ?>
            </div>
        </div>
        <div class="row">
        	<div class="twelve columns">
            <?= $poem->content; ?>
            </div>
        </div>
        <div class="row">
            <div class="one columns">
            <b>Votes: </b>
			</div>
			<div class="three columns">
			&nbsp;&nbsp;&nbsp;<?= $poem->votes; ?>
            </div>
            <div class="one columns">
            <b>Date: </b>
            </div>
            <div class="seven columns">
            <?= $poem->post_time; ?>
            </div>
        </div><br/><br/>
		<?php endforeach; ?>
    </div>
    <div class="six columns">
    	<?php foreach ($posts as $post): ?>
    	<div class="row">
        	<div class="one columns">
			<b>Title: </b>
			</div>
			<div class="eleven columns">
			&nbsp;<?= $post->title; ?>
            </div>
        </div>
        <div class="row">
            <div class="one columns">
            <b>Arthur: </b>
			</div>
			<div class="eleven columns">
			&nbsp;&nbsp;&nbsp;&nbsp;<?= $post->first_name; ?> <?= $post->last_name; ?>
            </div>
        </div>
        <div class="row">
        	<div class="twelve columns">
            <?= $post->content; ?>
            </div>
        </div>
        <div class="row">
        	<div class="twelve columns">
            	<b>Your comment:</b>
            </div>
        </div>
        <div class="row">
        	<div class="twelve columns">
            <?= $post->post; ?>
            </div>
        </div><br/></br/>
		<?php endforeach; ?>
    </div>
</div>