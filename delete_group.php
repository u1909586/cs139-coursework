<?php
$groupID = $_POST["groupID"];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :groupID;");
$stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER);
$result_exp = $stmt->execute();
while ($row = $result_exp->fetchArray()) {
  $personGroup = "{$row['PersonGroupID']}";
  $stmt = $db->exec("DELETE FROM GroupExpense WHERE PersonGroupID = $personGroup");
}
$stmt = $db->exec("DELETE FROM GroupPeople WHERE GroupID = $groupID");
$stmt = $db->exec("DELETE FROM Groups WHERE GroupID = $groupID");
//$stmt->bindValue(':expense', $expenseID);
//$stmt->execute();
//echo "<h1>$expenseID</h1>";
header("Location: index.php");
 ?>
