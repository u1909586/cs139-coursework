 <?php require 'header.php';
 $expenseID = $_POST["expenseID"];?>
     <div class="new-expense">

 <?php
 $_SESSION['notification'] = $_SESSION['expenses'];

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
     ?>
     <form name='pay_expense' action='pay_expense_for_partly.inc.php' method='post'>
       <input type='hidden' name='personID' value='$personID'>
       <input type='hidden' name='expenseID' value='$expenseID'>
       <input type='input' name='amount'>
       <button type='submit' name='button' style='background-color:green;margin-top: 10px;'>Pay</button>
     </form>
     <form name='pay_expense' action='pay_expense_for.php' method='post'>
       <input type='hidden' name='personID' value='$personID'>
       <input type='hidden' name='expenseID' value='$expenseID'>
       <button type='submit' name='button' style='background-color:green;margin-top: 10px;'>Pay all</button>
     </form>
     <?php
   }
   else {
     echo "<p>$people - Paid</p>";
   }
   //echo "<p>$people &pound$amount - $paid</p>";
   //Add if else statement to buttons to only delete if person is marked as paid

}?>
</div>
