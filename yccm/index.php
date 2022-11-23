<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yc2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('select c.*, count(s.id) as "membersNUmber" from club c left JOIN student s on c.id = s.clubId 
GROUP by c.name ');
$statement->execute();
$clubs = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<?php include_once("header.php") ?>

<section class="discover-clubs">
  <div class="container">
    <?php foreach ($clubs as $i => $club) : ?>
    <div class="club">
      <div class="cover" style="background-image: url('./<?php echo $club['logo'] ?>" );">

      </div>
      <div class="details">
        <div class="details-1">
          <div class="title"><?php echo $club["name"] ?></div>
          <strong class="members-number"><?php echo $club["membersNUmber"] ?> Member</strong>
        </div>
        <div class="description"><?php echo $club["description"] ?></div>
        <div class="details-1">
          <div class="members-icons">
            <img src="resources/media/images/members-photos/person-1.webp" alt="member-photo">
            <img src="resources/media/images/members-photos/person-4.webp" alt="member-photo">
            <img src="resources/media/images/members-photos/person-2.webp" alt="member-photo">
            <img src="resources/media/images/members-photos/person-3.webp" alt="member-photo">
            <img src="resources/media/images/members-photos/person-5.webp" alt="member-photo">
            <span>+27</span>
          </div>
          <button class="btn join"><a href="#">Join</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>


  </div>
</section>

<?php include_once("footer.php") ?>