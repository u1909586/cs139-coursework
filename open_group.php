<?php
require 'header.php';
include 'security.php';

$userID = $_SESSION['userID'];
$db = new SQLite3('ive_got_bills.db');
$stmt = $db->prepare("SELECT * FROM Groups Where UserID = :userID AND GroupID = :groupID;");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$stmt->bindValue(':groupID', $_POST['groupID'], SQLITE3_INTEGER);
$result = $stmt->execute();
echo "<div class='new-expense'>";
while ($row = $result->fetchArray()) {
  $reference = h("{$row['Reference']}");
  $groupID = "{$row['GroupID']}";
    echo "<h2>$reference</h2>";
    $stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :groupID;");
    $stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER);
    $result_exp = $stmt->execute();
    while ($row = $result_exp->fetchArray()) {
      $people = h("{$row['Name']}");
      $personGroup = "{$row['PersonGroupID']}";
      $sql = $db->prepare("SELECT * FROM GroupExpense Where PersonGroupID = :groupID;");
      $sql->bindValue(':groupID', $personGroup, SQLITE3_INTEGER);
      $results = $sql->execute();
      while ($rows = $results->fetchArray()) {
        $reference_exp = h("{$rows['ReferenceExpense']}");
        $amount = "{$rows['Amount']}";
        $paid = "{$rows['Paid']}";
        if ($paid == 0) {
          echo "<p>$people - $reference_exp - &pound$amount - Unpaid</p>";
        } else {
          echo "<p>$people - $reference_exp - Paid</p>";
        }
      }
    }
}
echo "</div>";
 ?>
