
	<!-- Filter-->
	<h3>Options:</h3>
	<div class="row">
		<div class="two columns">
			<form>
				<label>Search By Name</label>
				<input type="text" placeholder="Name"/>
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Edu</label>
				<input type="text" placeholder="School">
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Work</label>
				<input type="text" placeholder="Company"/>
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Age</label>
				<input type="text" placeholder="Age"/>
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Gender</label>
				<input type="text" placeholder="Gender"/>
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Country</label>
				<input type="text" placeholder="Country"/>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="two columns">
			<form class="custom">
			<label for="customDropdown">Select Popularity</label>
                <select style="display:none;" id="customDropdown">
                  <option>Select</option>
                  <option>Most Popular</option>
                  <option>Least Popular</option>
                </select>
            </form>
		</div>
		<div class="two columns">
			<form>
				<label>Find Fans</label>
				<input type="text" placeholder="Enter Writer's Name"/>
			</form>
		</div>
		<div class="two columns">
			<form class="custom">
				<label for="customDropdown">Writing</label>
                <select style="display:none;" id="customDropdown">
                  <option>Select</option>
                  <option>Most Poems</option>
                  <option>Most Comments</option>
                </select>
			</form>
		</div>
		<div class="two columns">
			<input type="submit" class="round button" value="Submit"/> 
		</div>
	</div>	
	<!-- End of Filter -->

	<hr>
	<div class="row">    

	
	    
	    <!-- Main Feed -->
	    <div style="overflow:scroll" class="nine columns">
	      
	      <!-- Feed Entry -->
	     	<?php foreach($people as $person): ?>

	     	<div class="row">
	     		<h3><?=person->name?><h3>
	     		<div class="three columns">
	     			<p>Gender: <?=person->gender?><p>
	     		</div>
	     		<div class="three columns">
	     			<p>Birth date: <?=person->birth?><p>
	     		</div>
	     		<div class="three columns">
	     			<p>Email: <?=person->email?><p>
	     		</div>
	     		<div class="three columns">
	     			<p>Adress: <?=person->num_adress?>
	     				<?=person->street_adress?>
	     				<?=person->town_adress?>
	     				<?=person->state_adress?>
	     				<?=person->country_adress?>
	     			<p>
	     		</div>
	     	</div>
	     	<hr>
	     <?php endforeach; ?>
		  <!-- End Feed Entry -->    
	    </div>
	</div>
	    
	  
	  <!-- Footer -->  
	  <footer class="row">
	    <div class="twelve columns">
	      <hr />
	      <div class="row">
	        <div class="six columns">
	          <p>&copy; Rutgers-CS-336</p>
	        </div>
	      </div>
	    </div> 
	  </footer>
 