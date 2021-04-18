<?php include '../admin/view/header.php'?>
<?php 
if(isset($errors)){
  foreach ($errors as $error) {
    echo $error;
  }
}

?>
<form action="." method="POST">
  <input type="hidden" name="action" value="register">
  <div class="form-group">
    <label >Username</label>
    <input type="text" class="form-control" name="username" >
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control"  name="password" >
  </div>
  <div class="form-group">
    <label >Confirm Password</label>
    <input type="password" class="form-control"  name="confirm_password" >
  </div>
  <button class="btn btn-primary">Register</button>
</form>

<?php include '../admin/view/footer.php' ?>