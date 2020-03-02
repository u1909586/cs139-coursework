<?php require 'header.php';
$groupID = $_POST['groupID'];
$db = new SQLite3('todo.db');
$stmt = $db->prepare(" SELECT * FROM GroupPeople WHERE GroupID = :groupID");
$stmt->bindValue(':groupID', $groupID, SQLITE3_INTEGER);
$results = $stmt->execute();
?>
<div class="new-expense">
  <h2>Add new expense</h2>
  <form action="add_expense_group.inc.php" method="post">
    <div id="people-container">
      <input type="text" name="reference" placeholder="Reference">
      <?php
      $i = 1;
      while ($row = $results->fetchArray()) {
        $name = "{$row['Name']}";
        $id = "{$row['PersonGroupID']}";
        $email = "{$row['Email']}";
      ?>
      <h3><?php echo "$name"; ?></h3>
      <p>
          <label>Amount</label><br>
          <input name="people[<?php echo "$i";?>][amount]">
          <input type="hidden" name="people[<?php echo "$i"; $i = $i +1;?>][id]" value="<?php echo "$id"; ?>">
      </p>
    <?php } ?>
    </div>

    <p>
      <button type="submit" name="button">Create expense</button>
    </p>
  </form>
</div>
