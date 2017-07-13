<?php
include 'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Registration</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Hobby:</label>
	  <input type="checkbox" name="hobby" id="hobby"> cricket
	  <input type="checkbox" name="hobby" id="hobby"> chess
	  <input type="checkbox" name="hobby" id="hobby"> caroom
    </div>
	<div class="form-group">
      <label for="pwd">gender:</label>	
	<input type="radio" name="gender" id="gender"> male
	<input type="radio" name="gender" id="gender"> female
    </div>
	<div class="form-group">
	<label for="sel1">Select list:</label>
	<select class="form-control" name="select1" id="sel1">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	</select>
	</div>
    <div class="form-group">
	<label for="sel1">Image:</label>
	<input type="file" name="image" id="image">
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
				 var hobby = $('#hobby').val();
				 var gender = $('#gender').val();
				 var image = $('#image').val();
				 var sel1 = $('#sel1').val();
            $.ajax({
                type: 'POST',
                url: 'class.php',
				data: { email:email,pwd:pwd,hobby:hobby,gender:gender,image:image,sel1:sel1,action: 'insert'},
                success: function(data) {
                    alert(data);
                    $("p").text(data);

                }
            });
   });
});
</script>