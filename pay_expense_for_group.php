<?php require 'header.php';
$groupID = $_POST["groupID"];?>
    <div class="new-expense">

<?php
 $_SESSION['notification'] = $_SESSION['expenses'];
$db = new SQLite3('ive_got_bills.db');
$stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :groupID AND Email = :email;");
$stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER);
$stmt->bindValue(':email', $_SESSION['email'], SQLITE3_TEXT);
$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $id = "{$row['PersonGroupID']}";
  $statement = $db->prepare("SELECT * FROM GroupExpense Where PersonGroupID = :ID;");
  $statement->bindValue(':ID', $id, SQLITE3_INTEGER);
  $result = $statement->execute();
  while ($rows = $result->fetchArray()) {
    $paid = "{$rows['Paid']}";
    $amount = "{$rows['Amount']}";
    $reference = "{$rows['ReferenceExpense']}";
    $sendID = "{$rows['GExpenseID']}";
  if ($paid == 0){
    $paid = "Unpaid";
    echo "<p>$reference &pound$amount - $paid</p>";
?>
    <form name='pay_expense' action='pay_expenses_for_group_partly.inc.php' method='post'>
      <input type='hidden' name='sendID' value='<?php echo "$sendID";?>'>
      <input type='hidden' name='groupID' value='<?php echo"$groupID";?>'>
      <input type='input' name='amount'>
      <button type='submit' name='button' style='background-color:green;margin-top: 10px;'>Pay</button>
    </form>
    <form name='pay_expense' action='pay_expense_for_group.inc.php' method='post'>
      <input type='hidden' name='sendID' value='<?php echo "$sendID";?>'>
      <input type='hidden' name='groupID' value='<?php echo "$groupID";?>'>
      <button type='submit' name='button' style='background-color:green;margin-top: 10px;'>Pay all</button>
    </form>
    <?php
  }
  else {
    echo "<p>$reference - Paid</p>";
  }
  //echo "<p>$people &pound$amount - $paid</p>";
  //Add if else statement to buttons to only delete if person is marked as paid

}}?>
</div>
