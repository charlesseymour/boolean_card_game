<?php 

include '../inc/header.php';

?>

<div class="container form-container">
<form class="form">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
	<label for="password2">Confirm password</label>
    <input type="text" class="form-control" id="password2" placeholder="Retype password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>