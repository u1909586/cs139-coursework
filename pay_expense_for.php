<?php
$personID = $_POST["personID"];

$db = new SQLite3('todo.db');
$stmt = $db->exec("UPDATE ExpenseOwe SET Paid = 1 WHERE PersonID = $personID");

//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
header("Location: index.php");
 ?>
