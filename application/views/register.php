<div class="row panel">
  <div class="six columns offset-by-three end">
    <h1>Register</h1>
    <form method="POST" action="/user/register">
      <input name="first_name" id="first_name" type="text" placeholder="First Name">
      <input name="last_name" id="last_name" type="text" placeholder="Last Name">
      <input name="email" id="email" type="text" placeholder="Email address">
      <input name="password" id="password" type="password" placeholder="Password">
      <!-- Need birthdate -->

      <label for="gender">Gender:</label>
      <select name="gender" id="gender">
        <option value="0">Prefer not to say</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>

      <br><br>

      <label>Address:</label>
      <div class="row">
        <div class="three columns">
          <input class="fill-width" name="num_address" id="num_address" placeholder="House #">
        </div>
        <div class="nine columns">
          <input class="fill-width" name="street_address" id="street_address" placeholder="Street Address">
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <input class="fill-width" name="town_address" id="town_address" placeholder="City">
        </div>
        <div class="three columns">
          <select class="fill-width" name="state_address" id="state_address">
            <option value="">State</option>
            <option value="AL">AL</option>
          </select>
        </div>
        <div class="three columns">
          <select class="fill-width" name="country_address" id="country_address">
            <option value="">Country</option>
            <option value="">USA</option>
          </select>
        </div>
      </div>

      <br>
      <input type="submit" class="radius button">
    </form>
  </div>
</div>

