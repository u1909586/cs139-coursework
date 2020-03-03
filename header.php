<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wise Split</title>
  </head>
  <body>
    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img border="0" src="css/bitmap.png" alt="Wise Spliter" height="50px" style="padding-right: 5px;">
        </a>

        <ul>
          <li> <a href="index.php">Home</a></li>
          <li> <a href="about.php">About us</a></li>
          <li> <a href="index.php">Contact</a></li>
        </ul>
        <?php if (isset($_SESSION['userID'])) { ?>
          <div class="header-login">
            <?php require 'notification.php'; ?>
            <form action="logout.inc.php" method="post">
              <button type="submit" name="logout-submit">Logout</button>
            </form>
          </div>
        <?php } else { ?>
          <div class="header-login">
            <a href="login.php">Log in</a>
            <a href="register.php">Signup</a>
          </div>
        <?php } ?>

        </div>
      </nav>
    </header>
