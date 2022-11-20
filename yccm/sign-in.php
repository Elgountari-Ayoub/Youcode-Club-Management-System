<?php include_once("header.php") ?>
<section class="section-sign">
  <div class="container">
    <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">sign in</h1>
      <div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      </div>
      <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
</section>
<?php include_once("footer.php") ?>