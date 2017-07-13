<?php
include 'config.php';
session_start();
$id = $_SESSION['id'];
$query = "select * from test";
$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>List data</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Password</th>
        <th>Hobby</th>
		<th>Gender</th>
		<th>Type</th>
		<th>Image</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($result as $result) { ?>
      <tr class="amit" id="<?php echo $result['id'];?>">
        
		<td> <?php echo $result['email'];?></td>
		<td><?php echo $result['password'];?></td>
		<td><?php echo $result['hobby'];?></td>
		<td><?php echo $result['gender'];?></td>
		<td><?php echo $result['type'];?></td>
		<td><?php echo $result['image'];?></td>
		<td id="<?php echo $result['id'];?>"><input type="button" class="button" value="delete" id="button1"></td>
		<td><?php echo 'DELETE';?></td>
		
      </tr>
	  <?php } ?>
    </tbody>
  </table>
</div>
</body>
<form method='post' action=''><input type='button' class='button' id='button1' name='submit' value='delete'></form>
</html>
<script type="text/javascript">
    // $(document).ready(function(){
              // // alert('hii');
			    // var id = <?php echo $_SESSION['id'];?>;
				 // alert(id);
            // $.ajax({
                // type: 'POST',
                // url: 'class.php',
				// data: { id:id,action: 'fetch'},
                 // success: function (response)  { 
					// alert(response);
					// $('.amit').html(response);
            // },
            // });
   // });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".button").click(function(){
			    var id = $(this).closest('tr').attr('id');
                alert (id);
				$.ajax({
                type: 'POST',
                url: 'class.php',
				data: { id:id,action: 'delete'},
                 success: function (response)  { 
					alert(response);
            },
            });
   });
});
</script>