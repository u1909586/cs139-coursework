<?php require 'header.php'; ?>
  <main>
    <h1>Main Page</h1>
    <?php
      if (isset($_SESSION['userID'])) {
        require 'logged_in.php';
      }
      else {
        require 'logged_out.php';
      } ?>
  </main>
<?php #require 'footer.php'; ?>
