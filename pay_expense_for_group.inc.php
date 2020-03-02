<?php
$expenseID = $_POST["sendID"];
$groupID = $_POST["groupID"];
$db = new SQLite3('todo.db');
$stmt = $db->exec("UPDATE GroupExpense SET Paid = 1 WHERE GExpenseID = $expenseID");

//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
?>
<form name="return" action="pay_expense_for_group.php" method="post">
  <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
  <input type="hidden" name="login-submit" value="true">
</form>
<script type="text/javascript">
  document.return.submit();
</script>
