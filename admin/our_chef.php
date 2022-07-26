<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="my_js/our_chef.js"></script>
    <?php include "includes/common-includes.php";?>
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<title>Our Chef</title>
    <script>
        function init()
        {
            getallchef();
        }
    </script>
	<style type="text/css">
           
	</style>
</head>
<body onload="init()">
<?php

include_once('includes/header.php');
include_once('includes/scripts.php');
include_once('includes/menubar2.php');
?>

<div class="container-fluid mt-5">
    <div class="row" id="cardview">
    </div>
</div>
<div class="fixed-bottom">
<?php
include_once('includes/footer.php');
?>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Chef's Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="uname" placeholder="name" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="ugender" name="gender">
    <option value="" disabled selected>select</option>
      <option value="Male">MALE</option>
      <option value="Female">FEMALE</option>
      <option value="Transgender">TRANSGENDER</option>
    </select>
  </div>
  <div class="form-group">
    <label for="phno">Phone number</label>
    <input type="tel" class="form-control" name="phno" id="uphno" placeholder="xxxxxxxxxx" required autocomplete="off" maxlength="10">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" id="uaddress" rows="3" name="address"></textarea>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
    <input type="email" class="form-control" id="uemail" name="email" required autocomplete="off">
      <div class="valid-feedback">
        Looks good!
      </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="upassword" name="password" required autocomplete="off">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update1()" data-dismiss="modal">Send</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>