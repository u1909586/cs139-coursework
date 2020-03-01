<main>
  <h1>Hello</h1>
  <h2>Down bellow you will see these sections - </h2>
  <ul>
    <h1>Add new expense</h1>
    <form class="" action="add_expense.php" method="post">
      <button type="submit" name="add-expense">Add Expense</button>
    </form>
    <ul>
      <ul>
        <li>in %</li>
      </ul>
      <li>Once all done, submit, and everyone will recieve an email and website notification</li>
    </ul>
    <h1>Your created expenses</h1>
    <?php require 'my_expense.php'; ?>
    <ul>
      <li>Send out another email if it is urgent!</li>
    </ul>
    <h1>Settle expenses</h1>
    <form class="" action="pay_expense.php" method="post">
      <button type="submit" name="pay-expense">Pay Expenses</button>
    </form>
    <ul>
      <li>See what expenses you have to repay</li>
      <li>repay the expenses you want, once this is done your balance will change</li>
      <li>also the head of the expense will get an email of the payment</li>
    </ul>
    <li>Total balance</li>
    <ul>
      <li>track how much money you owe or people owe you - in total or split</li>
    </ul>
  </ul>
</main>
