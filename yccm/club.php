<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM Student");
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($students);
// echo '</pre>';

?>










<?php include_once("header.php") ?>
<section class="section-club">
  <div class="container">
    <a href="clubManagement.php" target="_blank"><button class="btn btn-primary">Add Club</button></a>
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


        <tr>
          <form class="club-row" action="">
            <th scope="row">1</th>
            <td class="logo"><img src="resources/media/images/club-cover/club-2.jpg" alt=""></td>
            <td class="title">Otaku</td>
            <td class="creationDate">2022/11/17</td>
            <td class="description"
              title="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius explicabo aliquam saepe illum perferendis dolor repudiandae voluptates error. Voluptate ut at quasquisquam maiores laborum neque soluta a atque fuga.">
              Lorem ipsum dolor
              sit, amet consectetur adipisicing elit. Eius explicabo aliquam saepe
              illum perferendis
              dolor repudiandae voluptates error. Voluptate ut at quas quisquam maiores laborum neque soluta a atque
              fuga.
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
            <td class="action"><button class="btn btn-primary">Edit</button> <button
                class="btn btn-danger">Delete</button></td>
          </form>
        </tr>
      </tbody>
    </table>
  </div>
</section>
<?php include_once("footer.php") ?>