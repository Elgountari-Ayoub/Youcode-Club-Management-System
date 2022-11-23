<?php

session_start();
if (!isset($_SESSION["user"])) {
  header("location: sign-in.php");
}

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$club = null;

if (isset($_GET["edit"])) {
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // echo "$id";
    $statement = $pdo->prepare("SELECT * FROM Club WHERE id = :id");

    $statement->bindValue(":id", $id);
    $statement->execute();
    $club = $statement->fetch(PDO::FETCH_ASSOC);
    // var_dump($club);
    // echo "EDITO";
  }
} else if (isset($_GET["delete"])) {
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $statement = $pdo->prepare("DELETE FROM Club WHERE id = :id");

    $statement->bindValue(":id", $id);
    $statement->execute();
    // echo "DELETO";
  }
  header("location: club.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $logo = $_FILES['logo'];
  $creation_date = $_POST['creation-date'];
  $description = $_POST['description'];
  var_dump($_POST);
  if (isset($_POST["clubId"])) {
    $statement = $pdo->prepare("UPDATE club set name = :name, logo = :logo, creationDate = :creation_date , description = :description where id = :id
    ");

    $statement->bindValue(':id', $_POST["clubId"]);
  } else {
    $statement = $pdo->prepare("INSERT INTO Club (name, logo, creationDate, description)
    VALUES (:name, :logo, :creation_date, :description)");
  }
  $logoPath = "download/" . $logo["name"];
  move_uploaded_file($logo["tmp_name"], $logoPath);
  $statement->bindValue(':name', $name);
  $statement->bindValue(':logo', $logoPath);
  $statement->bindValue(':creation_date', $creation_date);
  $statement->bindValue(':description', $description);

  $statement->execute();
  header("Location: club.php");
}
?>




<?php include_once("header.php") ?>
<section class="section-member-management">
  <div class="container">
    <form class="member-form" action="clubManagement.php" method="POST" enctype="multipart/form-data">
      <?php
      if ($club) { ?>
      <input type="text" value=" <?php echo $club["id"] ?>" hidden name="clubId">
      <?php } ?>
      <div class="form-group">
        <label for="chooseLogo">Logo</label>
        <br>
        <input requireds type="file" class="form-control-file" id="logo" name="logo">
      </div>
      <div class="form-group">
        <label for="full-name">Club name</label>
        <input value="<?php echo $club == null ? "" : $club["name"] ?>" type="text" class="form-control"
          placeholder="Reading Club" id="full-name" name="name">
      </div>
      <div class="form-group">
        <label for="creation-date">Creation-date</label>
        <input value="<?php if ($club) {
                        echo date('Y-m-d', strtotime($club["creationDate"]));
                      } ?>" required type="date" class="form-control" placeholder="2002-6-28" id="creation-date"
          name="creation-date">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5"
          class="form-control"><?php echo $club == null ? "" : $club["description"] ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</section>
<?php include_once("footer.php") ?>