<?php include_once("header.php") ?>
<section class="section-member">
  <div class="container">

    <a href="memberManagement.php" target="_blank"><button class="btn btn-primary">Add Member</button></a>
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
        <tr>
          <form action="">
            <th scope="row">1</th>
            <th class="logo"><img src="resources/media/images/members-photos/person-1.webp" alt=""></th>
            <td>Ayoub</td>
            <td>Otto</td>
            <td>24</td>
            <td>Otaku</td>
            <td>Admin</td>
            <td class="action"><button class="btn btn-primary">Edit</button> <button
                class="btn btn-danger">Delete</button></td>
          </form>
        </tr>

      </tbody>
    </table>
  </div>
</section>
<?php include_once("footer.php") ?>