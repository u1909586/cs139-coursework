<?php
$db = new SQLite3('todo.db');
$stmt = $db->prepare("SELECT * FROM GroupPeople Where Email = :email;");
$stmt->bindValue(':email', $_SESSION['email']);
$result = $stmt->execute();
echo "<div class='my_made_exp'>";
while ($row = $result->fetchArray()) {
  $reference = "{$row['Reference']}";
  ?><div class='my_expense'><?php
    echo "<h2>$reference</h2>";

    ?>

</div>
    <?php
  }
echo "</div>";
 ?>
