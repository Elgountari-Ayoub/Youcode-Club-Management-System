<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location: sign-in.php");
}
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$statement = $pdo->prepare("SELECT * FROM Club");
$statement->execute();
$clubs = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM Student");
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC);

$member = null;




if (isset($_GET["edit"])) {
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $statement = $pdo->prepare("SELECT * FROM Student WHERE id = :id");

    $statement->bindValue(":id", $id);
    $statement->execute();
    $member = $statement->fetch(PDO::FETCH_ASSOC);
    var_dump($member);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $photo = $_FILES['photo'];
  $name = $_POST['full-name'];
  $birthday = $_POST['birthday'];
  $selected_class = $_POST['selected_class'];

  $selected_club =  $_POST['selected_club'] == "" ? null : $_POST['selected_club'];
  $role = $_POST['role'];

  $statement = $pdo->prepare("INSERT INTO Student 
  (photo, name, class, birthday,	clubId,	role	)
   VALUES (:photo, :name, :class, :birthday,	:clubId,	:role)");
  $photoPath = "download/" . $photo["name"];
  move_uploaded_file($photo["tmp_name"], $photoPath);

  $statement->bindValue(':photo', $photoPath);
  $statement->bindValue(':name', $name);
  $statement->bindValue(':birthday', $birthday);
  $statement->bindValue(':class', $selected_class);
  $statement->bindValue(':clubId', $selected_club);
  $statement->bindValue(':role', $role);
  $statement->execute();
  header("Location: member.php");
}


// $pdo->prepare("INSERT INTO Club (name, creationDate, description) 
// VALUES ('The 7 AM Club', '2022-11-19', 'You wake up an hour before your spouse and your kids and use that distraction-free 
// time to focus on your personal well-being, with a mix of exercise, meditation and reading or learning.');");


?>

<?php include_once("header.php") ?>
<section class="section-member-management">
  <div class="container">
    <form class="member-form" action="memberManagement.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="Photo">Photo</label>
        <br>
        <input type="file" class="form-control-file" id="Photo" name="photo" required>
      </div>
      <div class="form-group">
        <label for="full-name">Full name</label>
        <input type="text" value="<?php echo $member == null ? "" : $member["name"] ?>" class="form-control"
          placeholder="Elgountari ayoub" id="full-name" name="full-name" required>
      </div>

      <div class="form-group">
        <label for="class">Class</label>
        <select required class="form-control" id="class" name="selected_class">
          <option value="">Choice a class</option>
          <option value="Ada Lovelace">Ada Lovelace</option>
          <option value="Alan Turing">Alan Turing</option>
          <option value="Margaret Hamilton">Margaret Hamilton</option>
          <option value="Robert Novy">Robert Novy</option>
          <option value="Brendan Eich">Brendan Eich</option>
          <option value="James Gosling">James Gosling</option>
        </select>
      </div>
      <!-- /////////////////////// -->
      <div class="form-group">
        <label for="birthday">Birthday</label>
        <input required type="date" class="form-control" placeholder="2002-6-28" id="birthday" name="birthday">
      </div>

      <!-- //////////////////////// -->


      <div class="form-group">
        <label for="club">Club</label>
        <select class="form-control" id="class" name="selected_club">
          <option value="">None</option>
          <?php foreach ($clubs as $i => $club) : ?>
          <option value='<?php echo $club["id"] ?>'
            <?php echo (($member) != null && ($member["id"] == $club["id"])) ? "selected" : "" ?>>
            <?php echo $club["name"] ?> </option>
          <?php endforeach; ?>

        </select>
      </div>

      <!-- /////////////////////// -->
      <div class="role">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
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