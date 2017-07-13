<?php
include 'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>	
	<input type="button" id="button" name="submit" value="submit">	
  </form>
</div>
<a href="login.php">login</a>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#button").click(function(){
               alert('hii');
			    var email = $('#email').val();
				 var pwd = $('#pwd').val();
            $.ajax({
                type: 'POST',
                url: 'class.php',
				data: { email:email,pwd:pwd,action: 'login'},
                 success: function (response)  { 
                window.location.href = 'list.php'
            },
            });
   });
});
</script>