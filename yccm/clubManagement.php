<?php include_once("header.php") ?>
<section class="section-member-management">
  <div class="container">
    <form class="member-form">
      <div class="form-group">
        <label for="chooseLogo">Logo</label>
        <input type="file" class="form-control-file" id="logo" name="logo">
      </div>
      <div class="form-group">
        <label for="full-name">Club name</label>
        <input type="text" class="form-control" placeholder="Elgountari ayoub" id="full-name" name="full-name">
      </div>
      <div class="form-group">
        <label for="creation-date">Creation-date</label>
        <input type="date" class="form-control" placeholder="Otaku" id="creation-date" name="creation-date">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
      </div>
      <!-- <nav class="navbar navbar-light bg-light" style="display: flex; width:100%; gap: 2rem">
        <form class="form-inline" style="display: flex; width:100%; gap: 2rem;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav> -->
      <!-- 
      <nav class="form-group">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav> -->



      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</section>
<?php include_once("footer.php") ?>