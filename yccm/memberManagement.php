<?php include_once("header.php") ?>
<section class="section-member-management">
  <div class="container">
    <form class="member-form">
      <div class="form-group">
        <label for="full-name">Full name</label>
        <input type="text" class="form-control" placeholder="Elgountari ayoub" id="full-name" name="full-name">
      </div>

      <div class="form-group">
        <label for="class">Class</label>
        <select class="form-control" id="class">
          <option>Ada Lovelace</option>
          <option>Alan Turing</option>
          <option>Margaret Hamilton</option>
          <option>Robert Novy</option>
          <option>Brendan Eich</option>
          <option>James Gosling</option>
        </select>
      </div>
      <!-- /////////////////////// -->
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" placeholder="20" id="age" name="age" min="18">
      </div>

      <!-- //////////////////////// -->

      <div class="form-group">
        <label for="club">Club</label>
        <select class="form-control" id="class">
          <option>Hardbound Friends</option>
          <option>Disco Divas</option>
          <option>Scenic Watchers</option>
          <option>Chow Club</option>
          <option>Sugar Chasers</option>
        </select>
      </div>

      <!-- /////////////////////// -->
      <div class="role">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="admin" value="admin" checked>
          <label class="form-check-label" for="admin">
            Admin
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="member" value="member">
          <label class="form-check-label" for="memeber">
            Member
          </label>
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</section>
<?php include_once("footer.php") ?>