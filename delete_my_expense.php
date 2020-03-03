<?php
$expenseID = $_POST["expenseDel"];
$db = new SQLite3('ive_got_bills.db');
$stmt = $db->exec("DELETE FROM ExpenseOwe WHERE ExpenseID = $expenseID");
$stmt = $db->exec("DELETE FROM Expenses WHERE ExpenseID = $expenseID");
//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
header("Location: index.php");
 ?>
