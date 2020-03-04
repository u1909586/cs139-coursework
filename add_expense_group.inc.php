<?php
include 'security.php';

$array = $_POST['people'];
$reference = h($_POST['reference']);
$db = new SQLite3('ive_got_bills.db');
for ($i=1; $i <= count($array) ; $i++) {
  if (is_numeric($array[$i]['amount']) == false) {
    header("Location: index.php?error=nonnumber");
  }
}
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
