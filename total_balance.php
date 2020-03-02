<?php
$userID = $_SESSION['userID'];
$db = new SQLite3('todo.db');
// Owed calculations
$stmt = $db->prepare("SELECT * FROM ExpenseOwe Where UserID = :userID;");
$stmt->bindValue(':userID', $userID);
$result = $stmt->execute();
$owed = 0;
while ($row = $result->fetchArray()) {
  $paid = "{$row['Paid']}";
  $amount = "{$row['Amount']}";
  if ($paid == 0){
    $owed = $owed + $amount;
  }
}
echo "<h1> You are Owed - &pound$owed</h1>";


// Owe calculations
$stmt = $db->prepare("SELECT * FROM ExpenseOwe Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
$owe = 0;
while ($row = $result->fetchArray()) {
  $paid = "{$row['Paid']}";
  $amount = "{$row['Amount']}";
  if ($paid == 0){
    $owe = $owe + $amount;
  }
}
echo "<h1 style='color:red;'>You owe - &pound$owe</h1>";
