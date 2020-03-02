<?php require 'header.php';
$refernce = $_POST['reference'];
$userID = $_SESSION['userID'];
$array = $_POST['people'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("INSERT INTO Groups(UserID, Reference) Values(:userID, :reference)");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$stmt->bindValue(':reference', $refernce, SQLITE3_TEXT);
$results = $stmt->execute();
$stmt = $db->prepare("SELECT GroupID FROM Groups");
$result = $stmt->execute();

while ($row = $result->fetchArray()) {
  $groupID = "{$row['GroupID']}";
}

for ($i=1; $i <= count($array) ; $i++) {
  $stmt = $db->prepare("INSERT INTO GroupPeople(GroupID, Name, Email, Reference) Values(:groupID, :name, :email, :reference)");
  $stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER); // Change the expense ID to the correct expense ID;
  $stmt->bindValue(':name', $array[$i]['name'], SQLITE3_TEXT);
  $stmt->bindValue(':email', $array[$i]['email'], SQLITE3_TEXT);
  $stmt->bindValue(':reference',  $_POST['reference'], SQLITE3_TEXT);
  $results = $stmt->execute();
}
header("Location: index.php");
?>
