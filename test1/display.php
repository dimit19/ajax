<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">  
    <div class="form-group">
      <label for="email">standard:</label>
      <div class="form-group">
		<label for="sel1">Select standard:</label>
		<select class="form-control" id="sel1">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		</select>
	</div>
    </div>    
	<div class="studentresult"></div>
    <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
  

</div>
<div class="mainresult">

</body>
</html>   
<script>  
$(document).ready(function(){   

    $("#submit").click(function()
    {       
	
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>index.php/welcome/resultlist", 
         data: {standard: $('#sel1').val()},
         success: 
                function(data){
                $('.mainresult').html(data);  
              }
          });
     return false;
 });
 });		
    </script>     