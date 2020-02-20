<main>
  <h1>Hello</h1>
  <h2>Down bellow you will see these sections - </h2>
  <ul>
    <li>Add expense</li>
    <form class="" action="add_expense.php" method="post">
      <button type="submit" name="add-expense">Add Expense</button>
    </form>
    <ul>
      <li>Add people</li>
      <li>add their emails</li>
      <li>set how musch each person is required to pay</li>
      <ul>
        <li>in £</li>
        <li>in %</li>
      </ul>
      <li>Add unique name to the expense - reference</li>
      <li>Once all done, submit, and everyone will recieve an email and website notification</li>
    </ul>
    <li>My expenses</li>
    <?php require 'my_expense.php'; ?>
    <ul>
      <li>See what expenses you have added and the payment status of people</li>
      <li>Send out another email if it is urgent!</li>
    </ul>
    <li>Settle payment</li>
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
