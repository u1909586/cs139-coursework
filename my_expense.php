<?php
//include 'security.php';

$userID = $_SESSION['userID'];
$db = new SQLite3('ive_got_bills.db');
$stmt = $db->prepare("SELECT * FROM Expenses Where UserID = :userID;");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $name = h("{$row['Name']}");
  $expenseID = "{$row['ExpenseID']}";
  ?><div class='my_expense'><?php
    echo "<h2>$name</h2>";
    $stmt = $db->prepare("SELECT * FROM ExpenseOwe Where ExpenseID = :userID;");
    $stmt->bindValue(':userID', $expenseID, SQLITE3_INTEGER);
    $result_exp = $stmt->execute();
    while ($row = $result_exp->fetchArray()) {
      $people = h("{$row['Name']}");
      $amount = "{$row['Amount']}";
      $paid = "{$row['Paid']}";
      $expenseID = "{$row['ExpenseID']}";
      if ($paid == 0){
        $paid = "Unpaid";
      }
      else {
        $paid = "Paid";
      }
      echo "<p>$people &pound$amount - $paid</p>";
    }
    ?>
    <div class='buttons'>
      <form name="open_expense" action="open_my_expense.php" method="post">
        <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
        <button type='submit' name='expenseButton'>Open Expense</button>
      </form>
      <form name="delete_expense" action="delete_my_expense.php" method="post">
        <input type='hidden' name='expenseDel' value="<?php echo "$expenseID"; ?>">
        <button type='submit' name='expenseButton' style="background-color:red;">Delete Expense</button>
      </form>
</div>
</div>
    <?php
}
echo "</div>";
 ?>
