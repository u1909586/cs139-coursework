<?php
$userID = $_SESSION['userID'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM Expenses Where UserID = :userID;");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $name = "{$row['Name']}";
  $expenseID = "{$row['ExpenseID']}";
  ?><div class='my_expense' onclick='location.href="open_my_expense.php";'><?php
    echo "<h2>$name</h2>";
    $stmt = $db->prepare("SELECT * FROM ExpenseOwe Where ExpenseID = :userID;");
    $stmt->bindValue(':userID', $expenseID, SQLITE3_INTEGER);
    $result_exp = $stmt->execute();
    while ($row = $result_exp->fetchArray()) {
      $people = "{$row['Name']}";
      $amount = "{$row['Amount']}";
      $paid = "{$row['Paid']}";
      if ($paid == 0){
        $paid = "Unpaid";
      }
      else {
        $paid = "Paid";
      }
      echo "<p>$people &pound$amount - $paid</p>";
    }
    echo "</div>";
}
echo "</div>";
 ?>
