<?php
$personID = $_POST["personID"];
$expenseID = $_POST["expenseID"];
$db = new SQLite3('ive_got_bills.db');
 $_SESSION['notification'] = $_SESSION['expenses'];
$stmt = $db->exec("UPDATE ExpenseOwe SET Paid = 1 WHERE PersonID = $personID");

//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";

if ($_POST["mode"] == 1) {
  ?>
  <form name="return" action="open_my_expense_personal.php" method="post">
    <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script><?php
} else {
  ?>
  <form name="return" action="open_my_expense.php" method="post">
    <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script><?php
}
