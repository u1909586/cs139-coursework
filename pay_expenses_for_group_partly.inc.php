<?php require 'header.php';
$expenseID = $_POST["sendID"];
$groupID = $_POST["groupID"];
$repay = $_POST["amount"];
$db = new SQLite3('ive_got_bills.db');
 $_SESSION['notification'] = $_SESSION['expenses'];
$stmt = $db->prepare("SELECT Amount FROM GroupExpense WHERE GExpenseID = $expenseID");

$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $amount = "{$row['Amount']}";
}
$amount = $amount - $repay;
if (is_numeric($repay) == false) {?>
  <form name="return" action="pay_expense_for_group.php?error=nonnumber" method="post">
    <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script>
  <?php }

else if ($repay < 0) {?>
    <form name="return" action="pay_expense_for_group.php?error=negative" method="post">
      <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
      <input type="hidden" name="login-submit" value="true">
    </form>
    <script type="text/javascript">
      document.return.submit();
    </script>
  <?php }

else if ($amount > 0) {
  $stmt = $db->exec("UPDATE GroupExpense SET Amount = $amount WHERE GExpenseID = $expenseID");?>
  <form name="return" action="pay_expense_for_group.php" method="post">
    <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script>
  <?php
} else if($amount == 0){
  $stmt = $db->exec("UPDATE GroupExpense SET Paid = 1 WHERE GExpenseID = $expenseID");?>
  <form name="return" action="pay_expense_for_group.php" method="post">
    <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
    document.return.submit();
  </script>
  <?php
} else {?>
  <form name="return" action="pay_expense_for_group.php?error=largevalue" method="post">
    <input type='hidden' name='groupID' value='<?php echo "$groupID"; ?>'>
    <input type="hidden" name="login-submit" value="true">
  </form>
  <script type="text/javascript">
       document.return.submit();
  </script>
<?php } ?>
