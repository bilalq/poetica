<div class="row">
  <div class="twelve columns">
    <form method="POST" action="/poem/submit">

      <input type="text" name="title" id="title" placeholder="Poem Title">

      <textarea name="content" id="content" rows="30" placeholder="Compose your poem here"></textarea>

      <label for="category">Poem Category: </label>
      <select class="normal-width" name="category" id="category">
        <option value="Verse">Verse</option>
        <option value="Free Verse">Free Verse</option>
        <option value="Blank Verse">Blank Verse</option>
        <option value="Haiku">Haiku</option>
        <option value="Misc">Misc</option>
      </select>

      <input type="submit" class="button">

    </form>
  </div>
</div>
