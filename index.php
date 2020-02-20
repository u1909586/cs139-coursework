<?php require 'header.php'; ?>
  <main>
    <?php
      if (isset($_SESSION['userID'])) {
        require 'logged_in.php';
      }
      else {
        require 'logged_out.php';
      } ?>
  </main>
<?php #require 'footer.php'; ?>
