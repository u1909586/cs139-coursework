<?php
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM GroupPeople Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $id = "{$row['PersonGroupID']}";
  ?><div class='my_expense'><?php
    echo "<h2>$reference</h2>";
    $sql = $db->prepare("SELECT * FROM GroupExpense Where PersonGroupID = :id;");
    $sql->bindValue(':id', $id);
    $results = $sql->execute();
    while ($row = $results->fetchArray()) {
      echo "<p>{$row['ReferenceExpense']} - &pound{$row['Amount']}</p>";
    }
    ?>
    <div class='buttons'>
      <form name="pay_expense" action="pay_expense_for_group.php" method="post">
        <input type='hidden' name='groupID' value="<?php echo "$groupID"; ?>">
        <button type='submit' name='expenseButton'>Pay Expenses</button>
      </form>
    </div>
</div>
    <?php
  }
echo "</div>";
 ?>
