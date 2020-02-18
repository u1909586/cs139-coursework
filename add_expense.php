<?php require 'header.php';
?>
<div class="new-expense">
  <h2>Add new expense</h2>
  <form action="add_expense.inc.php" method="post">
    <div id="people-container">
      <input type="text" name="reference" placeholder="Reference">
      <h3>Person 1:</h3>
      <p>
          <label>Name</label><br>
          <input name="people[1][name]">
      </p>

      <p>
          <label>Email</label><br>
          <input name="people[1][email]">
      </p>
      <p>
          <label>Amount</label><br>
          <input name="people[1][amount]">
      </p>
    </div>

    <a href="javascript:;" id="add-new-person" class="add-new-person">Add! new person</a>

    <p>
      <button type="submit" name="button">people</button>
    </p>
  </form>
  <script>
let i = 2;
document.getElementById('add-new-person').onclick = function () {
    let template = `
        <h3>Person ${i}:</h3>
        <p>
            <label>Name</label><br>
            <input name="people[${i}][name]">
        </p>

        <p>
            <label>Email</label><br>
            <input name="people[${i}][email]">
        </p>

        <p>
            <label>Amount</label><br>
            <input name="people[${i}][amount]">
        </p>`;

    let container = document.getElementById('people-container');
    let div = document.createElement('div');
    div.innerHTML = template;
    container.appendChild(div);

    i++;
}
</script>
</div>
