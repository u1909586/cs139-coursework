<?php
if (isset($_POST['login-submit'])){
  $email = $_POST['email'];
  $password = $_POST['pwd'];

  if(empty($email) || empty($password)){
    header("Location: index.php?error=emptyfields");
    exit();
  }
  else {
    $db = new SQLite3('todo.db');
    $statement = $db->prepare('SELECT * FROM User WHERE Email = :id;');
    $statement->bindValue(':id', $email);

    $result = $statement->execute();
    while ($row = $result->fetchArray()) {
      $email_db = "{$row['Email']}";
      $name = "{$row['Name']}";
      $userID = "{$row['UserID']}";
    }
    if ($email_db != $email) {
      //echo $result;
      //echo $email;
      header("Location: index.php?error=nonuser");
    }
    else {
      $sql = $db->prepare('SELECT Password, Salt FROM User WHERE Email=:umail;');
      $sql->bindValue(':umail', $email);
      $result = $sql->execute();
      while ($row = $result->fetchArray()) {
        $dbpassword = "{$row['Password']}";
        $salt = "{$row['Salt']}";
      }
      if($dbpassword == sha1($salt."--".$password)){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['userName'] = $name;
        $_SESSION['userID'] = $userID;
        header("Location: index.php?done=success");
      }
      else {
        header("Location: index.php?error=wrongpassword");
      }
    }

  }
  $db->close();
}

else {
  header("Location: index.php?error");
}
