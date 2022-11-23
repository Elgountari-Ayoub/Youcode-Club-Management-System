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

?>

<?php include_once("header.php") ?>
<section class="section-club">
  <div class="container">
    <a href="clubManagement.php?add"><button class="btn btn-primary">Add Club</button></a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Logo</th>
          <th scope="col">Name</th>
          <th scope="col">Creation Date</th>
          <th scope="col">Description</th>
          <th scope="col">Members</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>


        <?php foreach ($clubs as $i => $club) : ?>
        <tr>
          <!-- <form class="club-row" action=""> -->
          <th scope="row"><?php echo $i + 1 ?></th>

          <td class="logo"><img src="<?= $club["logo"] ?>" alt=""></td>
          <td class="title"><?php echo $club["name"] ?></td>
          <td class="creationDate"><?php echo $club["creationDate"] ?></td>
          <td class="description" title="<?php echo $club['description'] ?>">
            <?php echo $club["description"] ?>
          </td>
          <td class="members">
            <div class="members-icons">
              <img src="resources/media/images/members-photos/person-1.webp" alt="member-photo"
                class="club--member-photo">
              <img src="resources/media/images/members-photos/person-4.webp" alt="member-photo"
                class="club--member-photo">

            </div>
            <span class="more-members"><a href="member.php">+27</a></span>
          </td>
          <td class="action">

            <a href="clubManagement.php?edit&id=<?= $club["id"] ?>">
              <button class="btn btn-primary">Edit</button>
            </a>

            <a href="clubManagement.php?delete&id=<?= $club["id"] ?>">
              <button class="btn btn-danger">Delete</button>
            </a>

          </td>
          <!-- <td class="action"><button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button></td> -->
          <!-- </form> -->
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<?php include_once("footer.php") ?>