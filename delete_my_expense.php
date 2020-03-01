<?php
$expenseID = $_POST["expenseDel"];
$db = new SQLite3('todo.db');
$stmt = $db->exec("DELETE FROM Expenses WHERE ExpenseID = $expenseID");
//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
header("Location: index.php");
 ?>
