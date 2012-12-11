
	<!-- Filter-->
	<h3>Options:</h3>
	<div class="row">
		<div class="two columns">
			<form action="/search/users" method="post">
				<label>Search By Name</label>
				<input type="text" name="name" placeholder="Name"/>
		</div>
		<div class="two columns">
				<label>Search By Edu</label>
				<input type="text" name="edu" placeholder="School"/>
		</div>
		<div class="two columns">
				<label>Search By Work</label>
				<input type="text" name="work" placeholder="Company"/>
		</div>
		<div class="two columns">
				<label for="customDropdown1">Search By Gender</label>
				<select id="customDropdown1" name="gender">
                  <option value="">Select</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
		</div>
		<div class="two columns">
				<label>Search By Birth</label>
				<input type="text" name="age" placeholder="ex: yyyy-mm-dd"/>
		</div>
		<div class="two columns">
				<label>Search By Country</label>
				<input type="text" name="country" placeholder="Country"/>
		</div>
	</div>
	<div class="row">
		<div class="two columns">
				<label for="customDropdown2">Select Popularity</label>
                <select id="customDropdown2" name="popularity">
                  <option value="">Select</option>
                  <option value="followers">By Followers</option>
                  <option value="votes">By Votes</option>
                </select>
		</div>
		<div class="two columns">
				<label>List Followers</label>
				<input type="checkbox" name="followers"/>
		</div>
		<div class="two columns">
				<label for="customDropdown">Writing</label>
                <select id="customDropdown" name="writing">
                  <option value="">Select</option>
                  <option value="poems">Most Poems</option>
                  <option value="comments">Most Comments</option>
                </select>
		</div>
		<div class="two columns">
			<input type="submit" class="round button" value="Submit"/>
            </form> 
		</div>
	</div>	
	<!-- End of Filter -->

	<hr>
	<div class="row">    

	
	    
	    <!-- Main Feed -->
	    <div style="overflow:scroll" class="twelve columns">
	      
	      <!-- Feed Entry -->
          <?php
		  	if (!empty($people)) {
			  $this->User_model->help_parse($people, 1);
			}
			if (!empty($followers)) {
          	  $this->User_model->help_parse($followers, 2); 
			}
		  ?>
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
 