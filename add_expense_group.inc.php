<?php
$array = $_POST['people'];
$reference = $_POST['reference'];
$db = new SQLite3('todo.db');
for ($i=1; $i <= count($array); $i++) {
  //echo $array[$i]['amount'];
  //echo $array[$i]['id'];
  $stmt = $db->prepare("INSERT INTO GroupExpense(PersonGroupID, ReferenceExpense, Amount) Values(:userID, :reference, :amount)");
  $stmt->bindValue(':userID', $array[$i]['id'], SQLITE3_INTEGER);
  $stmt->bindValue(':reference', $reference, SQLITE3_TEXT);
  $stmt->bindValue(':amount', $array[$i]['amount'], SQLITE3_INTEGER);
  $results = $stmt->execute();
}

header("Location: index.php");
