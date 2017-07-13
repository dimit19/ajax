<?php  
 class Crud  
 {  
      //crud class  
      public $connect;  
      public $host = "localhost";  
      public $username = 'root';  
      public $password = '';  
      public     $database = 'test';  
      function __construct()  
      {  
           $this->database_connect();  
      }  
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  
      public function insert()  
      {   
				$email = $_REQUEST['email'];
				$password = $_REQUEST['pwd'];
				$hobby = $_REQUEST['hobby'];
				$gender = $_REQUEST['gender'];
				$image = $_REQUEST['image'];
				$type = $_REQUEST['sel1'];
				$query = "insert into test (email,password,hobby,gender,type,image) VALUES ('$email','$password','$hobby','$gender','$type','$image')";
				if (mysqli_query($this->connect, $query)) {
				echo "New record created successfully";
				} else {
				echo "Error: " . $query . "<br>" . mysqli_error();
				}
           //return mysqli_query($this->connect, $query);  
     }  
	 public function login()
	 {
			$email = $_REQUEST['email'];
			$password = $_REQUEST['pwd'];
			$query = "select * from test where email = '$email' AND password = '$password'";
			//echo $query; 
			$result = mysqli_query($this->connect, $query);	
			$count = mysqli_num_rows($result);
			//echo $count; 
			if($count == 1)
			{
				foreach($result as $result)
			{
				$id = $result['id'];
			    session_start();
				$_SESSION['id'] = $id;
			}
			echo "Success";	
			return true;
			}
           else
		   {
			   echo "wrong email or password..";
		   }			   
	 
	 }
	 public function fetch()
	 {
		 $id = $_REQUEST['id'];
		// echo $id.amit;
		 $query = "select * from test where id = '$id'";
		// echo $query;
	     $result = mysqli_query($this->connect, $query);
	     foreach($result as $result)
		 {
			 print_r($result);
			 echo "<td>";
             echo $result['email'];
             echo "</td>";

             echo "<td>";
             echo $result['password'];
             echo "</td>";
 
             echo "<td>";
             echo $result['hobby'];
             echo "</td>";

             echo "<td>";
             echo $result['gender'];
             echo "</td>";

             echo "<td>";
             echo $result['type'];
             echo "</td>";

             echo "<td>";
             echo $result['image'];
             echo "</td>";
           
		    $rid = $result['id'];
             echo "<td class= 'ad' id='$rid'>";
			 echo "<form method='post' action=''><input type='button' class='button' id='button1'  name='submit' value='delete'></form>";
             echo "</td>";
			 
		 }
		 return true;
	 }
	 public function deletedata()
	 {
		 print_r($_REQUEST);
		 echo "chauhan";
	 }
             
 }  
 ?>  