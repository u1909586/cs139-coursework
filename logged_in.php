<main>
  <h1>Hello <?php echo $_SESSION['userName']; ?></h1>
  <br>
  <div class="main_page" style="padding-left: 20px; width:200px;">
    <h2>Total balance</h2>
    <?php require 'total_balance.php'; ?>
  </div>
  <br>
    <h1>Add new expense</h1>
    <form class="" action="add_expense.php" method="post">
      <button type="submit" name="add-expense" style="max-width: 300px; height:70px;">Add Expense</button>
    </form>
    <h1>Add new group</h1>
    <form class="" action="add_group.php" method="post">
      <button type="submit" name="add-group" style="max-width: 300px; height:70px;">Add Group</button>
    </form>
    <h1>Your created group:</h1>
    <div class="main_page">
      <?php require 'my_group.php'; ?>
    </div>

    <h1>Groups you are in:</h1>
    <div class="main_page">
        <?php require 'groups_in.php'; ?>
    </div>

    <h1>Your created expenses:</h1>
    <div class="main_page">
      <?php require 'my_expense.php'; ?>
    </div>

    <h1>Settle expenses:</h1>
    <div class="main_page">
      <?php require 'need_to_pay_expense.php'; ?>
    </div>

</main>
