<!doctype html>
<html>
<head>
	<title>Sign up</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style type = "text/css">
	</style>
	
	<body>
	<? include ('components/_navbar.php'); ?>
<div class = "container">
	<div class = "row">
	
	
	<div class = "col-md 6">
	<form role="form">
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
  </div>
  
   <div class="form-group">
    <label for="inputEmail">Verify Email address</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
  </div>
  
   <div class="form-group">
    <label for="username">Desired Username</label>
    <input type="text" class="form-control" id="username" placeholder="Username">
  </div>
  
  <div class="form-group">
    <label for="userPassword">Password</label>
    <input type="password" class="form-control" id="userPassword" placeholder="Password">
  </div>
  
  
    <div class="form-group">
    <label for="userPassword">Confirm Password</label>
    <input type="password" class="form-control" id="userPassword" placeholder="Password">
  </div>
  
  <div class="form-group">
  
    <label for="exampleInputFile">Profile Picture</label>
    <input type="file" id="userPic">
    <p class="help-block">This picture will be displayed on your profile</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Agree to our terms and services.
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>



</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type = "text/javascript">
			$('signup').addClass('active');
		</script>
</body>
</html>