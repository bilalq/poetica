<div class="row">
	<div class="two columns">
    	<img src="http://placehold.it/150x150"/>
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
	<div class="two columns end">
    	<h5>Activities:</h5>
    </div>
</div>
<div class="row panel">
	<div class="twelve columns">
    	<pre>
        <?php var_dump($profile); ?>
        </pre>
    </div>
</div>