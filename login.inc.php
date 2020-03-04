<?php
include 'security.php';

if (isset($_POST['login-submit'])){
  $email = h($_POST['email']);
  $password = h($_POST['pwd']);

  if(empty($email) || empty($password)){
    header("Location: login.php?error=emptyfields");
    exit();
  }
  else {
    $db = new SQLite3('ive_got_bills.db');
    $statement = $db->prepare('SELECT * FROM User WHERE Email = :id;');
    $statement->bindValue(':id', $email);

    $result = $statement->execute();
    while ($row = $result->fetchArray()) {
      $email_db = h("{$row['Email']}");
      $name = h("{$row['Name']}");
      $userID = "{$row['UserID']}";
    }
    if ($email_db != $email) {
      //echo $result;
      //echo $email;
      header("Location: login.php?error=nonuser");
    }
    else {
      $sql = $db->prepare('SELECT Password, Notification, Salt FROM User WHERE Email=:umail;');
      $sql->bindValue(':umail', $email);
      $result = $sql->execute();
      while ($row = $result->fetchArray()) {
        $dbpassword = "{$row['Password']}";
        $salt = "{$row['Salt']}";
        $notification = "{$row['Notification']}";
      }
      if($dbpassword == sha1($salt."--".$password)){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['userName'] = $name;
        $_SESSION['userID'] = $userID;
        $_SESSION['notification'] = $notification;
        header("Location: index.php?done=success");
      }
      else {
        header("Location: login.php?error=nonuser");
      }
    }

  }
  $db->close();
}

else {
  header("Location: login.php?error=error");
}
