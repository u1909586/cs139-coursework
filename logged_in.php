<main>
  <h1>Hello <?php echo $_SESSION['userName']; ?></h1>
  <h2>Down bellow you will see these sections - </h2>
  <h2>Total balance</h2>
  <?php require 'total_balance.php'; ?>
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

    <h1>Settle expenses</h1>
    <?php require 'need_to_pay_expense.php'; ?>

</main>
