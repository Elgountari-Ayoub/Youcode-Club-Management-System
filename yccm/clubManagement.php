<?php

session_start();
if (!isset($_SESSION["user"])) {
  header("location: sign-in.php");
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $logo = $_POST['logo'];
  $creation_date = $_POST['creation-date'];
  $description = $_POST['description'];

  $statement = $pdo->prepare("INSERT INTO Club (name, logo, creationDate, description)
   VALUES (:name, :logo, :creation_date, :description)");


  $statement->bindValue(':name', $name);
  $statement->bindValue(':logo', '');
  $statement->bindValue(':creation_date', $creation_date);
  $statement->bindValue(':description', $description);

  $statement->execute();
}
?>


<?php include_once("header.php") ?>
<section class="section-member-management">
  <div class="container">
    <form class="member-form" action="clubManagement.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="chooseLogo">Logo</label>
        <br>
        <input type="file" class="form-control-file" id="logo" name="logo">
      </div>
      <div class="form-group">
        <label for="name">Club name</label>
        <input type="text" class="form-control" placeholder="Reading Club" id="full-name" name="name">
      </div>
      <div class="form-group">
        <label for="creation-date">Creation-date</label>
        <input type="date" class="form-control" placeholder="Otaku" id="creation-date" name="creation-date">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
      </div>

      <!-- 
        <nav class="navbar navbar-light bg-light" style="display: flex; width:100%; gap: 2rem">
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
      </nav> 
    -->
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</section>
<?php include_once("footer.php") ?>