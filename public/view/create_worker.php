
<?php
    include('../../assets/templates/header.php');
?>

<h2>Create a Worker</h2>

<form action="../../app/controllers/UserController.php" method="post">
    <div class="container">
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Username</label>
      <input type="text" class="form-control"  placeholder="Enter username" name="username">
    </div>
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Repeat password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Repeat password" name="passwordConfirm">
    </div>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select a payment method:</label>
      <select class="form-select" id="exampleSelect1" name="paymentType">
      <option value="Cash">Cash</option>
      <option value="Visa">Visa</option>
      <option value="Paypal">PayPal</option>
      </select>
    </div>
    <input type="hidden" name="registerHiddenInput" value="Worker">
    <button type="submit" name="register" class="btn btn-primary">Submit</button>
</form>