<?php
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT Notification FROM User Where UserID = :userID;");
$stmt->bindValue(':userID', $_SESSION['userID'], SQLITE3_INTEGER);
$result_exp = $stmt->execute();
$notification = $_SESSION['notification'];


// Owe calculations
$stmt = $db->prepare("SELECT * FROM ExpenseOwe Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
$expenses = 0;
while ($row = $result->fetchArray()) {
  $paid = "{$row['Paid']}";
  if ($paid == 0){
    $expenses = $expenses + 1;
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
    if ($paid == 0){
      $expenses = $expenses + 1;
    }
  }
}

$_SESSION['expenses'] = $expenses;

if ($expenses == $notification) {
  echo "<p>No notifications</p>";
} else {
  echo "<p>Check Expenses, new items</p>";
}
