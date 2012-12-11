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
			<label for="customDropdown">Select Popularity</label>
                <select id="customDropdown" name="Popularity">
                  <option>Select</option>
                  <option>Most Popular</option>
                  <option>Least Popular</option>
                </select>
		</div>
		<div class="two columns">
			<label for="customDropdown">Select Age</label>
                <select id="customDropdown" name="Age">
                  <option>Select</option>
                  <option>Most Recent</option>
                  <option>Oldest</option>
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
</form>

	<hr>
	<div class="row">    

	<!-- End of Filter -->
	    
	    <!-- Nav Sidebar -->
	    <div class="three columns">
	      <div class="panel">
	        <img src="/public/images/bookandpen.jpg" />
	        <h5><a href="#">Poem Categories</a></h5>
	        
	        <dl class="vertical tabs">
	        	<dd><a href="#">All</a></dd>
	          	<dd><a href="#">Free Verse</a></dd>
	          	<dd><a href="#">Blank Verse</a></dd>
	          	<dd><a href="#">Haiku</a></dd>
	          	<dd><a href="#">Verse</a></dd>
	          	<dd><a href="#">Misc</a></dd>
	        </dl>
	        
	      </div>
	    </div>
	    <!-- End of Sidebar -->

	    <!-- Main Feed -->
	    <div class="nine columns">
	      
	      <!-- Feed Entry -->
	      <div style="overflow:scroll overflow-x:hidden" class="row">

	      	<?php foreach($poems as $poem): ?>
	      	<div class="seven columns">
		          <div class="row">
			      	<div class="six columns">
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
			      	<div style="overflow:scroll overflow-x:hidden" class="nine columns">
			      		<p><strong>Body:</strong><br>
			      		 <?= $poem->content; ?></p>
			      	</div>
			      </div>
			      <hr>
			</div>
			<div style="overflow:scroll overflow-x:hidden" class="five columns">
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
 