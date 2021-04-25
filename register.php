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
<h4>DebtControl Account Creation:</h4>
<br>
<form action="register.php" method="post">
<input type="number" name="phonenumber" placeholder="Enter phone number" class="form-control" required><br><br>
<input type="number" name="phonenumberconfirm" placeholder="Confirm phone number" class="form-control" required><br><br>
<input type="text" name="Securityname" placeholder="Create Security name" class="form-control" required><br><br>
<input type="text" name="Securitynameconfirm" placeholder="Confirm Security name" class="form-control"required><br><br>
<input type="text" name="password" placeholder="Create Password" class="form-control" required><br><br>
<input type="text" name="passwordconfirm" placeholder="Confirm Password" class="form-control" required><br><br>
<br>
<button class="btn btn-secondary" name="reg">Create Account</button>
<br><br>

</form>




</div>

</body>
</html>


<?php

include('db.php');


if(isset($_POST['reg'])){


    $phonenumber = $_POST['phonenumber'];
    $phonenumberconfirm = $_POST['phonenumberconfirm'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $securitycode = $_POST['Securityname'];
    $securitycodeconfirm = $_POST['Securitynameconfirm'];

    if($password != $passwordconfirm || $phonenumber != $phonenumberconfirm || $securitycode != $securitycodeconfirm){
        echo"<script>alert('Password,securitycode or phone number with their confirmations does not match. Please try again.')</script>";
    }elseif($password === $passwordconfirm && $phonenumber === $phonenumberconfirm && $securitycode === $securitycodeconfirm){

        $sql1="SELECT * FROM authentication where phonenumber = '$phonenumber' Limit 1";
    
		$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {
            echo"<script>alert('A user with same phone number already exist. Try again with a different number.')</script>"; 
        }else{
          // $password = md5($password);//encryption of password
            $sql = "INSERT INTO authentication (securityname,password,phonenumber) VALUES ('$securitycode','$password','$phonenumber')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){

        //set session variables
 
        $_SESSION['phonenumber'] = "$phonenumber";


			echo "<script>alert('Registration successful. You are now logged in.')</script>";
            echo "<script>location.replace('main.php')</script>";
		}

        }
    }

}


?>