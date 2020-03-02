<?php
$userID = $_SESSION['userID'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM Groups Where UserID = :userID;");
$stmt->bindValue(':userID', $userID, SQLITE3_INTEGER);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $reference = "{$row['Reference']}";
  $groupID = "{$row['GroupID']}";
  ?><div class='my_expense'><?php
    echo "<h2>$reference</h2>";
    $stmt = $db->prepare("SELECT * FROM GroupPeople Where GroupID = :groupID;");
    $stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER);
    $result_exp = $stmt->execute();
    while ($row = $result_exp->fetchArray()) {
      $people = "{$row['Name']}";

      echo "<p>$people </p>";
    }
    ?>
    <div class='buttons'>
      <form name="open_group" action="add_expense_group.php" method="post">
        <input type='hidden' name='expenseID' value='<?php echo "$groupID"; ?>'>
        <button type='submit' name='expenseButton'>Add Expense</button>
      </form>
      <form name="delete_group" action="delete_group.php" method="post">
        <input type='hidden' name='groupID' value="<?php echo "$groupID"; ?>">
        <button type='submit' name='delButton' style="background-color:red;">Delete Group</button>
      </form>
    </div>
    </div>
    <?php
}
echo "</div>";
 ?>
