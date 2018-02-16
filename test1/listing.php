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
   
      
      <div class="form-group" id="studentid">
		
      </div>

	  <div class="form-group" id="subjctid">
		
      </div>
    <button type="submit" name="submit" id="submit" class="btn btn-default">Submit</button>
  

</div>

</body>
</html>
<script>  
 
$(document).ready(function(){   

    $("#sel1").change(function(){           		 
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>index.php/welcome/fetch_student", 
         data: {standard: $('#sel1').val()},
         success: function(data){
                
               $("#studentid").html(data);             
			 }
          });
     return false;
 });
    $('body').on('change',"#studentlist",function (e) {
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>index.php/welcome/fetch_subject", 
         data: {standard: $('#sel1').val()},
         success: function(data){
                console.log(data);
               $("#subjctid").html(data);             
			 }
          });
     return false; 
    });
	$("#submit").click(function(){
	 var selectednumbers = [];
	 var selectednumbersmarks = [];
         $('.subject').each(function(i, selected) {
            selectednumbers[i] = $(selected).val();
			selectednumbersmarks[i] = $(selected).attr('data-id');
         });
	 
	 alert(selectednumbersmarks);
     $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>index.php/welcome/insertmarks", 
         data: {standard: $('#sel1').val(),studentname : $("body").find("#studentlist").val(),subjectmarks:selectednumbers,subjectname: selectednumbersmarks},
         success: function(data){
                console.log(data);
               $("#subjctid").html(data);             
			 }
          });
     return false; 
    });
 });
    </script>     