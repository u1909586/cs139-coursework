<?php require 'header.php'; ?>
  <main>
    <h1>Main Page</h1>
    <?php
      if (isset($_SESSION['userID'])) {
        echo "Hi you are logged in";
      }
      else {
        echo '<h1>hi your logged out</h1>';
      } ?>
  </main>
<?php require 'footer.php'; ?>
