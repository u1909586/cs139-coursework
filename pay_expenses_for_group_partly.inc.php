<?php
$expenseID = $_POST["sendID"];
$groupID = $_POST["groupID"];
$repay = $_POST["amount"];
$db = new SQLite3('todo.db');
 $_SESSION['notification'] = $_SESSION['expenses'];
$stmt = $db->prepare("SELECT Amount FROM GroupExpense WHERE GExpenseID = $expenseID");
//$stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :groupID AND Email = :email;");

$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $amount = "{$row['Amount']}";
}
$amount = $amount - $repay;
$stmt = $db->exec("UPDATE GroupExpense SET Amount = $amount WHERE GExpenseID = $expenseID");

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
