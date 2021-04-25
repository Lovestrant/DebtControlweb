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
<h4>DebtControl Login:</h4>
<br>
<form action="index.php" method="post">

<input type="number" name="phonenumber" placeholder="Enter phone number" class="form-control" required><br>
<input type="text" name="passwordfield" placeholder="Enter Password" class="form-control" required>
<br><br>
<button class="btn btn-secondary" name="submit">Log in</button>
<br><br>
<a href="reset.php">Forgot Password</a>
</form>


<br><br>
<a href="register.php" style="color: red;">Create Account</a>

</div>

</body>
</html>

<?php
include('db.php');


if(isset($_POST['submit'])){
   

    $password = $_POST['passwordfield'];
    $phonenumber = $_POST['phonenumber'];

    //$password1 = md5($password);
    $sql1="SELECT * FROM authentication where  phonenumber = '$phonenumber' and password= '$password' LIMIT 1";
  
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    if($queryResults) {
        while($row = mysqli_fetch_assoc($result)) {

        //set session variables

        $_SESSION['phonenumber'] = "$phonenumber";
    

        //taking user to main page
        echo "<script>alert('Login successful.')</script>";
        echo "<script>location.replace('main.php')</script>";

        }
    }else{
        echo "<script>alert('No such user in the system. Fill your details correctly.')</script>";
        echo "<script>location.replace('index.php')</script>";
    }
        
}




?>