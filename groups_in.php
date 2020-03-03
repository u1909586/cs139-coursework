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
    $flag = 0;
    while ($row = $results->fetchArray()) {
      if ($row['Paid'] == 0) {
        echo "<p>{$row['ReferenceExpense']} - &pound{$row['Amount']}</p>";
        $flag = 1;
      }
      else {
        echo "<p>{$row['ReferenceExpense']} - Paid</p>";
      }
      //echo "<p>{$row['ReferenceExpense']} - &pound{$row['Amount']}</p>";
      //$flag = 1;
    }
    ?>
    <?php if ($flag == 1): ?>
      <div class='buttons'>
        <form name="pay_expense" action="pay_expense_for_group.php" method="post">
          <input type='hidden' name='groupID' value="<?php echo "$groupID"; ?>">
          <button type='submit' name='expenseButton'>Pay Expenses</button>
        </form>
      </div>
    <?php endif; ?>
</div>
    <?php
  }
echo "</div>";
 ?>
