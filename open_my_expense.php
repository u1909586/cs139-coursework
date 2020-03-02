 <?php require 'header.php';
 $expenseID = $_POST["expenseID"];?>
     <div class="new-expense">

 <?php
 $db = new SQLite3('todo.db');
 $stmt = $db->prepare("SELECT * FROM ExpenseOwe Where ExpenseID = :expID;");
 $stmt->bindValue(':expID', $expenseID, SQLITE3_INTEGER);
 $result_exp = $stmt->execute();
 while ($row = $result_exp->fetchArray()) {
   $people = "{$row['Name']}";
   $amount = "{$row['Amount']}";
   $paid = "{$row['Paid']}";
   $personID = "{$row['PersonID']}";
   if ($paid == 0){
     $paid = "Unpaid";
     echo "<p>$people &pound$amount - $paid</p>";
     echo "<form name='pay_expense' action='pay_expense_for.php' method='post'>
       <input type='hidden' name='personID' value='$personID'>
       <input type='hidden' name='expenseID' value='$expenseID'>
       <button type='submit' name='button' style='background-color:green;'>Pay</button>
     </form>";
   }
   else {
     $paid = "Paid";
     echo "<p>$people &pound$amount - $paid</p>";
   }
   //echo "<p>$people &pound$amount - $paid</p>";
   //Add if else statement to buttons to only delete if person is marked as paid

}?>
</div>
