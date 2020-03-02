<?php
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM GroupPeople Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $reference = "{$row['Reference']}";
  $groupID
  ?><div class='my_expense'><?php
    echo "<h2>$reference</h2>";

    ?>
    <div class='buttons'>
      <form name="pay_expense" action="delete_my_group.php" method="post">
        <input type='hidden' name='expenseDel' value="<?php echo "$groupID"; ?>">
        <button type='submit' name='expenseButton' style="background-color:red;">Pay Expenses</button>
      </form>
    </div>
</div>
    <?php
  }
echo "</div>";
 ?>
