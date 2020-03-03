<?php
$personID = $_POST["personID"];
$expenseID = $_POST["expenseID"];
$repay = $_POST["amount"];
$db = new SQLite3('todo.db');
//$stmt = $db->exec("UPDATE ExpenseOwe SET Paid = 1 WHERE PersonID = $personID");
$stmt = $db->prepare("SELECT Amount FROM ExpenseOwe WHERE PersonID = $personID");
$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $amount = "{$row['Amount']}";
}
$amount = $amount - $repay;
$stmt = $db->exec("UPDATE ExpenseOwe SET Amount = $amount WHERE PersonID = $personID");

//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
?>
<form name="return" action="open_my_expense.php" method="post">
  <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
  <input type="hidden" name="login-submit" value="true">
</form>
<script type="text/javascript">
  document.return.submit();
</script>
