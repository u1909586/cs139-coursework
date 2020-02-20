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
$stmt = $db->prepare("SELECT ExpenseID FROM Expenses");
$result = $stmt->execute();
while ($row = $result->fetchArray()) {
  $expenseID = "{$row['ExpenseID']}";
}
for ($i=1; $i <= count($array) ; $i++) {
  $stmt = $db->prepare("INSERT INTO ExpenseOwe(ExpenseID, UserID, Name, Amount, Reference, Email, Paid) Values(:expenseID, :userID, :name, :amount, :reference, :email, 0)");
  $stmt->bindValue(':expenseID', $expenseID, SQLITE3_INTEGER); // Change the expense ID to the correct expense ID;
  $stmt->bindValue(':userID', $_SESSION['userID'], SQLITE3_INTEGER);
  $stmt->bindValue(':name', $array[$i]['name'], SQLITE3_TEXT);
  $stmt->bindValue(':amount',  $array[$i]['amount'], SQLITE3_INTEGER);
  $stmt->bindValue(':reference', $_POST['reference'], SQLITE3_TEXT);
  $stmt->bindValue(':email',  $array[$i]['email'], SQLITE3_TEXT);
  $results = $stmt->execute();
  $to_email_address = $array[$i]['email'];
  $subject = $_POST['reference'];
  $message = "Please pay ";
  //mail($to_email_address, $subject, $message);
}
header("Location: index.php");
?>
