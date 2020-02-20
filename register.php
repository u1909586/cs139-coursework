<?php require 'header.php'; ?>
    <div class="register-form">
      <h1>Signup</h1>
        <form action="signup.inc.php" method="post">
          <input type="text" name="name" placeholder="Name">
          <!--<input type="text" name="username" placeholder="Username">-->
          <input type="text" name="email" placeholder="E-mail">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwd-repeat" placeholder="Confirm Password">
          <button type="submit" name="signup-submit">Signup</button>
        </form>
    </div>

<?php #require 'footer.php'; ?>
