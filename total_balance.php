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

$querry = $db->prepare("SELECT * FROM Groups Where UserID = :userID;");
$querry->bindValue(':userID', $userID);
$res = $querry->execute();
while ($entry = $res->fetchArray()) {
  $id = "{$entry['GroupID']}";
  $stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :id;");
  $stmt->bindValue(':id', $id);
  $result = $stmt->execute();
  while ($row = $result->fetchArray()) {
    $id = "{$row['PersonGroupID']}";
    $sql = $db->prepare("SELECT * FROM GroupExpense Where PersonGroupID = :id;");
    $sql->bindValue(':id', $id);
    $results = $sql->execute();
    while ($amount = $results->fetchArray()) {
      $paid = "{$amount['Paid']}";
      $answer = "{$amount['Amount']}";
      if ($paid == 0){
        $owed = $owed + $answer;
      }
    }
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

$stmt = $db->prepare("SELECT * FROM GroupPeople Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
while ($row = $result->fetchArray()) {
  $id = "{$row['PersonGroupID']}";
  $sql = $db->prepare("SELECT * FROM GroupExpense Where PersonGroupID = :id;");
  $sql->bindValue(':id', $id);
  $results = $sql->execute();
  while ($row = $results->fetchArray()) {
    $paid = "{$row['Paid']}";
    $answer = "{$row['Amount']}";
    if ($paid == 0){
      $owe = $owe + $answer;
    }
  }
}

echo "<h1 style='color:red;'>You owe - &pound$owe</h1>";
