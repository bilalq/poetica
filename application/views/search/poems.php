	<!-- Filter-->
<form action="/search/poems" method="GET">
	<h3>Options:</h3>
	<div class="row">
		<div class="two columns">
				<label>Search By Author</label>
				<input type="text" placeholder="Name" name="Author"/>
		</div>
		<div class="two columns">
				<label>Search By Title</label>
				<input type="text" placeholder="Title" name="Title"/>
		</div>
		<div class="two columns">
			<label for="customDropdown">Get Most Popularity</label>
                <select id="customDropdown" name="Popularity">
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option value="">No</option>
                </select>
		</div>
		<div class="two columns">
			<label for="customDropdown">Sort by Oldest</label>
                <select id="customDropdown" name="Age">
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option value="">No</option>
                </select>
		</div>
		<div class="two columns">
			<label for="customDropdown">Select ABC Order</label>
                <select id="customDropdown" name="ABC">
                  <option>No Order</option>
                  <option>A-Z</option>
                  <option>Z-A</option>
                </select>
		</div>
		<div class="row">
			<div class="two columns">
				<input type="submit" class="round button" value="Submit" name="Submit"/> 
			</div>
		</div>	
	</div>
	<div class="row">
		<label for="customDropdown">Select Category</label>
                <select id="customDropdown" name="Category">
                  <option value="">All</option>
                  <option value="Free Verse">Free verse</option>
                  <option value="Blank Verse">Blank Verse</option>
                  <option value="Haiku">Haiku</option>
                  <option value="Verse">Verse</option>
                  <option value="Misc">Misc</option>
                </select>
	</div>

	  <div class="three columns">
	      <div class="panel">
	        <img src="/public/images/bookandpen.jpg" />
	        <h5><a href="#">Poem Categories</a></h5>
	        
	        <dl class="vertical tabs">
	        	<dd><a value='All'>All</a></dd>
	          	<dd><a value="Free Verse">Free Verse</a></dd>
	          	<dd><a value="Blank Verse">Blank Verse</a></dd>
	          	<dd><a value="Haiku">Haiku</a></dd>
	          	<dd><a value="Verse">Verse</a></dd>
	          	<dd><a values="Misc">Misc</a></dd>
	        </dl>
	        
	      </div>
	    </div>
</form>

	<hr>
	<div class="row">    

	<!-- End of Filter -->
	    
	    <!-- Nav Sidebar -->
	  
	    <!-- End of Sidebar -->

	    <!-- Main Feed -->
	    <div class="nine columns">
	      
	      <!-- Feed Entry -->
	      <?php foreach($poems as $poem): ?>

	      <div class="row">
	      	<h3><strong>Poem:</strong></h3>
	      	<div class="twelve columns">
		          <div class="row">
			      	<div class="six columns">
			      		<?=gravatar($poem->email, 45);?>
			      		<h4>Author: 
			      			<?= $poem->first_name; ?>
			      			<?= $poem->last_name; ?>
			      		</h4>
			      	</div>
			      	<div class="six columns">
			      		<h4>Title: <?= $poem->title; ?></h4>
			      	</div>
			      </div>
			      <div class="row">
			      	<div class="three columns">
			      		<p><strong>Votes: <?= $poem->votes; ?></strong></p>
			      	</div>
			      	<div class="nine columns">
			      		<p><strong>Body:</strong><br>
			      		 <?= $poem->content; ?></p>
			      	</div>
			      </div>
			      <hr>
			</div>
		</div>
		<div class="row">
			<div class="two colums">
				<h3><strong>Comments:</strong></h3>
			</div>
			<div class="ten columns">
				<?php for($i = 0; $i < count($poem->comments); $i++) {?>
			      		<div class="row">
			      			<div style="overflow:scroll" class="twelve columns">
			      				<h5><?= $poem->comments[$i]['comment_name1']; ?> 
			      					<?= $poem->comments[$i]['comment_name2']; ?>
			      				</h5>

			      				<p>Comment:
			      					<?= $poem->comments[$i]['comment']; ?></p>
			      				<p><?= $poem->comments[$i]['post']; ?></p>
			      			</div>
			      			<div  class="eight columns">

			      			</div>
			      		</div>
			      		<hr>
			     <?php } ?>
		    </div>
		<?php endforeach; ?>
		</div>

		  <!-- End Feed Entry -->
	      <hr>
	      
	      
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
 