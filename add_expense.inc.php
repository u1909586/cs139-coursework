<?php require 'header.php';
$refernce = $_POST['reference'];
$userID = $_SESSION['userID'];
$date = date("Y/m/d");
$array = $_POST['people'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("INSERT INTO Expenses(UserID, Name, DateCreated) Values(:userID, :name, :date_now)");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$stmt->bindValue(':name', $refernce, SQLITE3_TEXT);
$stmt->bindValue(':date_now', $date, SQLITE3_TEXT);
$results = $stmt->execute();
for ($i=1; $i <= count($array) ; $i++) {
  $stmt = $db->prepare("INSERT INTO ExpenseOwe(ExpenseID, UserID, Name, Amount, Reference, Email, Paid) Values(:expenseID, :userID, :name, :amount, :reference, :email, FALSE)");
  $stmt->bindValue(':expenseID', 0, SQLITE3_INTEGER);
  $stmt->bindValue(':userID', $_SESSION['userID'], SQLITE3_INTEGER);
  $stmt->bindValue(':name', $array[$i]['name'], SQLITE3_TEXT);
  $stmt->bindValue(':amount',  $array[$i]['amount'], SQLITE3_INTEGER);
  $stmt->bindValue(':reference', $_POST['reference'], SQLITE3_TEXT);
  $stmt->bindValue(':email',  $array[$i]['email'], SQLITE3_TEXT);
  $results = $stmt->execute();
}
header("Location: index.php");
?>
