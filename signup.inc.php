<?php
include 'security.php';
if (isset($_POST['signup-submit'])) {

  $name = h($_POST['name']);
  $email = h($_POST['email']);
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwd-repeat'];

  $uppercase = preg_match('@[A-Z]@', $pwd);
  $lowercase = preg_match('@[a-z]@', $pwd);
  $number    = preg_match('@[0-9]@', $pwd);
  $specialChars = preg_match('@[^\w]@', $pwd);


  if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
    header("Location: register.php?error=emptyfields");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: register.php?error=invalidemail");

  } else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
    header("Location: register.php?error=badpswd");
  }

  elseif ($pwd !== $pwdRepeat) {
    header("Location: register.php?error=passwordchk");
    exit();
  }
  else {
    $db = new SQLite3('ive_got_bills.db');
    $sql = $db->prepare('SELECT * FROM User WHERE Email = :uname;');
    $sql->bindValue(':uname', h($email), SQLITE3_TEXT);
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
      $encrypted_password = sha1($salt."--".h($pwd));
      $sql = $db->prepare("INSERT INTO User(Name, Email, Password, Notification, Salt) Values(:name, :email, :e_pwd, 0, :salt)");
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
