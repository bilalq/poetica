
	<!-- Filter-->
	<h3>Options:</h3>
	<div class="row">
		<div class="two columns">
			<form>
				<label>Search By Author</label>
				<input type="text" placeholder="Name"/>
			</form>
		</div>
		<div class="two columns">
			<form>
				<label>Search By Title</label>
				<input type="text" placeholder="Title"/>
			</form>
		</div>
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
			<form class="custom">
			<label for="customDropdown">Select Age</label>
                <select style="display:none;" id="customDropdown">
                  <option>Select</option>
                  <option>Most Recent</option>
                  <option>Oldest</option>
                </select>
            </form>
		</div>
		<div class="two columns">
			<form class="custom">
			<label for="customDropdown">Select ABC Order</label>
                <select style="display:none;" id="customDropdown">
                  <option>No Order</option>
                  <option>A-Z</option>
                  <option>Z-A</option>
                </select>
            </form>
		</div>
		<div class="row">
		<div class="two columns">
			<input type="submit" class="round button" value="Submit"/> 
		</div>
	</div>	
	</div>


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
	         	<dd><a href="#">Ghazal</a></dd>
	          	<dd><a href="#">Diamante</a></dd>
	          	<dd><a href="#">Ballad</a></dd>
	        </dl>
	        
	      </div>
	    </div>
	    <!-- End of Sidebar -->

	    <!-- Main Feed -->
	    <div class="nine columns">
	      
	      <!-- Feed Entry -->
	      <div style="overflow:scroll" class="row">

	      	<div class="seven columns">
		      <?php foreach($poems as $poem): ?>

			      <div class="row">
			      	<div class="three columns">
			      		<h3><?=$poem->author?></h3>
			      		<h3><?=$poem->title?></h3>
			      		<p><strong><?=$poem->Votes?></strong></p>
			      	</div>
			      	<div style="overflow:scroll" class="nine columns">
			      		<p><?=$poem->content?></p>
			      	</div>
			      </div>
			      <hr>
			</div>

			<div style="overflow:scroll" class="five columns">
			      		<?php foreach($poem->comments as $comment): ?>
			      		<div class="row">
			      			<div class="four columns">
			      				<h5><?=$comment->name?></h5>
			      				<p><?=$comment->post_time?></p>
			      			</div>
			      			<div style="overflow:scroll" class="eight columns">
			      				<p><?=$comment->content?></p>
			      			</div>
			      		</div>
			      		<hr>
			      		<?php endforeach; ?>
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
 