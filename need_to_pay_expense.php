<?php
//include 'security.php';

$userID = $_SESSION['userID'];
$db = new SQLite3('ive_got_bills.db');
$stmt = $db->prepare("SELECT * FROM ExpenseOwe Where Email = :email;");
$stmt->bindValue(':email', h($_SESSION['email']));
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $reference = h("{$row['Reference']}");
  $name = h("{$row['Name']}");
  $expenseID = "{$row['ExpenseID']}";
  $paid = "{$row['Paid']}";
  $amount = "{$row['Amount']}";
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
      <form name="open_expense" action="open_my_expense_personal.php" method="post">
        <input type='hidden' name='expenseID' value='<?php echo "$expenseID"; ?>'>
        <button type='submit' name='expenseButton'>Open Expense</button>
      </form>
</div>
</div>
    <?php
  }}
echo "</div>";
 ?>
