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
            <div class="notifications">
                <?php require 'notification.php'; ?>
            </div>
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

<script src="jquery-3.4.1.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">

$(document).ready(function() {
  $(location).attr('href');

  var pathname = $(location).attr('href');
  if (pathname.includes("error=nonuser") == true) {
    alert("Sorry, There was no account found with the given details, please try again or register.")
  } else if (pathname.includes("error=emptyfields") == true){
    alert("You have left some fields empty, please fill them in and try again.")
  } else if (pathname.includes("error=error") == true){
    alert("Error")
  } else if (pathname.includes("error=badpswd") == true){
    alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")
  } else if (pathname.includes("error=invalidemail") == true){
    alert("You have entered an invalid Email address.")
  } else if (pathname.includes("error=passwordchk") == true){
    alert("Repeated password doesn't match original password.")
  } else if (pathname.includes("emailinuse") == true){
    alert("Email already in use. Please log-in.")
  } else if (pathname.includes("error=largevalue") == true){
    alert("The value you are trying to pay is too large for the selected expense")
  }
});
    var timeout = setInterval(reloadChat, 5000);
    function reloadChat () {

         $('.notifications').load('.notifications');
    }

    </script>
