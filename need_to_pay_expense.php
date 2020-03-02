<?php
$userID = $_SESSION['userID'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM ExpenseOwe Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $reference = "{$row['Reference']}";
  $name = "{$row['Name']}";
  $expenseID = "{$row['ExpenseID']}";
  $paid = "{$row['Paid']}";
  if ($paid == 0){

  ?><div class='my_expense'><?php
    echo "<h2>$reference</h2>";
      if ($paid == 0){
        $paid = "Unpaid";
      }
      else {
        $paid = "Paid";
      }
      echo "<p>$name &pound$amount - $paid</p>";

    ?>
    <div class='buttons'>
      <form name="open_expense" action="open_my_expense.php" method="post">
        <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
        <button type='submit' name='expenseButton'>Open Expense</button>
      </form>
</div>
</div>
    <?php
  }}
echo "</div>";
 ?>
