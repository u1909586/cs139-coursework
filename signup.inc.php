<?php
if (isset($_POST['signup-submit'])) {
  //require 'dbhandling.inc.php';

  $name = $_POST['name'];
  //$username = $_POST['username'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwd-repeat'];

  if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
    header("Location: register.php?error=emptyfields&name=".$name."&email=".$email);
    exit();
  }
  /*else if (!filter_var($mail, FILTER_VALIDATE_MAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../register.php?error=invalidmailuid&name=".$name);
  }
  else if (!filter_var($mail, FILTER_VALIDATE_MAIL)) {
    header("Location: ../register.php?error=invalidmail&name=".$name."&username".$username);
    exit();
  }*/
  /*else if (!preg_match("/^[a-zA-Z0-9]*$/", )) {
    header("Location: register.php?error=invalidusername&name=".$name."&mail".$mail);
    exit();
  }*/
  elseif ($pwd !== $pwdRepeat) {
    header("Location: register.php?error=passwordchk&name=".$name."&email=".$email);
    exit();
  }
  else {
    $db = new SQLite3('todo.db');
    $sql = $db->prepare('SELECT * FROM User WHERE Email = :uname;');
    $sql->bindValue(':uname', $email, SQLITE3_TEXT);
    $result = $sql->execute();
    $usr = "0";
    while ($row = $result->fetchArray()) {
      $usr = "{$row['Email']}";
    }
    if ($usr !== "0"){
      header("Location: index.php?emailinuse");
      exit();
    }
    else {
      $salt = sha1(time());
      $encrypted_password = sha1($salt."--".$pwd);
      $sql = $db->prepare("INSERT INTO User(Name, Email, Password, Salt) Values(:name, :email, :e_pwd, :salt)");
      $sql->bindValue(':name', $name, SQLITE3_TEXT);
      $sql->bindValue(':email', $email, SQLITE3_TEXT);
      $sql->bindValue(':e_pwd', $encrypted_password, SQLITE3_TEXT);
      $sql->bindValue(':salt', $salt, SQLITE3_TEXT);
      $result = $sql->execute();
      ?>
      <form name="login" action="login.inc.php" method="post">
        <input type='hidden' name='email' value='<?php echo "$email" ?>'>
        <input type='hidden' name='pwd' value='<?php echo "$pwd" ?>'>
        <input type="hidden" name="login-submit" value="true">
      </form>
      <script type="text/javascript">
        document.login.submit();
      </script>
    <?php  exit();
    }
  }
  $db->close();
}

else{
  header("Location: register.php");
}
