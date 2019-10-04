<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../inc/header.php';

?>

<div class="container form-container">
<form class="form" method="post" action="doRegister.php">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
	<label for="password2">Confirm password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Retype password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>