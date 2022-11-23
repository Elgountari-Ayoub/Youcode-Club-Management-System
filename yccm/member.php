<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location: sign-in.php");
}
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM Student");
// $statement = $pdo->prepare("SELECT s.*, c.name as 'clubName' FROM student s, club c WHERE s.clubId = c.id");
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC);

// $statement = $pdo->prepare("SELECT c.name FROM student s, club c WHERE s.clubId = c.id");
// $statement->execute();
// $clubName = $statement->fetch();
?>


<?php include_once("header.php") ?>
<section class="section-member">
  <div class="container">

    <a href="memberManagement.php?add"><button class="btn btn-primary">Add Member</button></a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">photo</th>
          <th scope="col">Full Name</th>
          <th scope="col">Class</th>
          <th scope="col">Age</th>
          <th scope="col">Club</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $i => $student) : ?>
        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          <th class="logo"><img src="<?= $student["photo"] ?>" alt=""></th>

          <td><?php echo $student["name"] ?></td>
          <td><?php echo $student["class"] ?></td>
          <td><?php $birthy = strtotime($student["birthday"]);
                $birthy = date('Y', $birthy);
                $age = date('Y') - $birthy;
                echo $age; ?></td>
          <td><?php
                $clubId = $student["clubId"];
                $haseClub = false;
                if ($clubId != null) {
                  $haseClub = true;
                  $statement = $pdo->prepare('SELECT * FROM club where id = :clubId');
                  $statement->bindValue(':clubId', $clubId);
                  $statement->execute();
                  $club =  $statement->fetchAll(PDO::FETCH_ASSOC);
                  $clubName = $club[0]["name"];
                  echo  $clubName;
                } else {
                  echo "<pre style='font-size:2rem ; text-align:start'>>:</pre>";
                };
                ?></td>

          <td><?php
                echo $haseClub ? $student["role"] : "<pre style='font-size:2rem ; text-align:start'>>:</pre>";;
                // $haseClub == true ??  echo $student["role"]
                ?></td>

          <td class="action">
            <a href="memberManagement.php?edit&id=<?= $student["id"] ?>">
              <button class="btn btn-primary">Edit</button>
            </a>

            <a href="memberManagement.php?delete&id=<?= $student["id"] ?>">
              <button class="btn btn-danger">Delete</button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</section>
<?php include_once("footer.php") ?>