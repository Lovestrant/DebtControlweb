<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debt Control</title>

    <!--javascript-->
    <script src="web.js"></script>

     <!--bootstrap links-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<!--Css link-->
   <link rel="stylesheet" type="text/css" href="index.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
<div class="container-fluid" style="background-color: orange;">

<h1 style="text-align: centre;">DebtControl</h1>


</div>
<div class="container">
<br>
<h4>DebtControl Reset Password:</h4>
<br>
<form action="reset.php" method="post">

<input type="text" name="Securityname" placeholder="Enter Security name" class="form-control" required><br><br>
<input type="number" name="phonenumber" placeholder=" Enter phone number" class="form-control" required><br><br>

<input type="text" name="password" placeholder=" Create New Password" class="form-control" required><br><br>
<input type="text" name="passwordconfirm" placeholder="Confirm  New Password" class="form-control" required><br><br>
<br>
<button class="btn btn-secondary" name="reset">Reset</button>
<br><br>

</form>




</div>

</body>
</html>


<?php

include('db.php');

if(isset($_POST['reset'])){

    
    $securitycode= $_POST['Securityname'];
    $phonenumber= $_POST['phonenumber'];
    $password= $_POST['password'];
    $passwordconfirm= $_POST['passwordconfirm'];

    if(!($password == $passwordconfirm)){
        echo "<script>alert('Password doesn't match with its confirmation. Try again.')</script>";
    
    }else{
      
        $sql1 = "SELECT * from authentication where securityname = '$securitycode' and phonenumber = '$phonenumber' Limit 1";
    	$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {
           // $password = md5($password_1);//encryption of password
            $sql = "UPDATE authentication set password = '$password' where phonenumber= '$phonenumber'";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){

             //set session variables
  
            $_SESSION['phonenumber'] = "$phonenumber";

			echo "<script>alert('Update successful. You are now logged in.')</script>";
            echo "<script>location.replace('main.php')</script>";
		}
     }else{
            echo"<script>alert('No user with those details in the system. Please try again. Ensure you fill your details correctly.')</script>"; 
           

        }
    }
  
}



?>