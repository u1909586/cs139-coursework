<?php require 'header.php';
$personID = $_POST["personID"];
$expenseID = $_POST["expenseID"];
$repay = $_POST["amount"];
$_SESSION['notification'] = $_SESSION['expenses'];
$db = new SQLite3('ive_got_bills.db');
//$stmt = $db->exec("UPDATE ExpenseOwe SET Paid = 1 WHERE PersonID = $personID");
$stmt = $db->prepare("SELECT Amount FROM ExpenseOwe WHERE PersonID = $personID");
$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $amount = "{$row['Amount']}";
}
$amount = $amount - $repay;
if ($amount >= 0) {
    $stmt = $db->exec("UPDATE ExpenseOwe SET Amount = $amount WHERE PersonID = $personID");
} else {?>
  <form name="return" action="open_my_expense.php?error=largevalue" method="post">
    <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script>
<?php } ?>
<form name="return" action="open_my_expense.php" method="post">
  <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
  <input type="hidden" name="login-submit" value="true">
</form>
<script type="text/javascript">
  document.return.submit();
</script>
