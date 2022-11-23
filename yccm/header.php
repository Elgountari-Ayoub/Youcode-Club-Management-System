<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>YouCode Club</title>

  <!-- LINKS -->
  <!-- FONTAWESOME -->
  <!-- <script src="https://kit.fontawesome.com/c2f51c50b5.js" crossorigin="anonymous"></script> -->

  <!-- CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <link rel="stylesheet" href="resources/css/main.css">
  <link rel="stylesheet" href="resources/css/media.css">

</head>

<body>
  <header>
    <nav class="container">
      <a href="index.php" class="go-home">
        <img src="resources/media/images/logo-dark.svg" alt="club-logo" class="logo" />
      </a>
      <ul>
        <li class="home"><a href="index.php">Home</a></li>

        <li class="member"><a href="member.php">Members</a></li>
        <li class="club"><a href="club.php">Clubs</a></li>
      </ul>

      <?php if (!isset($_SESSION["user"])) { ?>

      <a href="sign-in.php" style="width: 7.2rem;"><img src="resources/media/icons/sign-in-icon.svg" alt="sign-in"
          class="btn sign-in" /></a>
      <?php } else { ?>
      <a href="log-out.php" style="width: 7.2rem;">LOG-OUt &rarr;</a>
      <?php } ?>
    </nav>
  </header>