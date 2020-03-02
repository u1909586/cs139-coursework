<main>
  <h1>Hello</h1>
  <h2>Down bellow you will see these sections - </h2>
  <ul>
    <h1>Add new expense</h1>
    <form class="" action="add_expense.php" method="post">
      <button type="submit" name="add-expense">Add Expense</button>
    </form>
    <h1>Add new group</h1>
    <form class="" action="add_group.php" method="post">
      <button type="submit" name="add-group">Add Group</button>
    </form>
    <h1>Your created group</h1>
    <?php require 'my_group.php'; ?>

    <h1>Groups you are in</h1>
    <?php require 'groups_in.php'; ?>

    <h1>Your created expenses</h1>
    <?php require 'my_expense.php'; ?>
    <ul>
      <li>Send out another email if it is urgent!</li>
    </ul>
    <h1>Settle expenses</h1>
    <?php require 'need_to_pay_expense.php'; ?>
    <ul>
      <li>repay the expenses you want, once this is done your balance will change</li>
      <li>also the head of the expense will get an email of the payment</li>
    </ul>
    <li>Total balance</li>
    <ul>
      <?php require 'total_balance.php'; ?>
      <li>track how much money you owe or people owe you - in total or split</li>
    </ul>
  </ul>
</main>
