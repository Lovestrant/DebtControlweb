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

<div style="text-align: right;background-color: transparent;">
<form action="logout.php">
<button class="btnsearch" style="background-color: transparent;"><i class="material-icons">logout</i>Log Out</button>
</form>
</div>
</div>
<div class="container">
<br>
<a href="main.php"><button style="color: red;">Main</button></a><br><br>
<form action="adddebtor.php" method="post">

    <h4 style="text-align: left;">Add Debtor:</h4>
    <br>

    <input type="text" placeholder="Input debtor name." name="name" class="form-control" required><br><br>
    <textarea class="form-control" placeholder="List the items" rows="5" columns="3"  name="list" required></textarea>
    <br><br>
    <input type="number" placeholder="Total" name="total" class="form-control" required><br><br>
    <button class="btn btn-primary" name="add" style="text-align: centre;">Add</button>
</form>
<br><br>

</div>

</body>
</html>


<?php
if($_SESSION['phonenumber']){
include('db.php');


if(isset($_POST['add'])){


    $phonenumber = $_SESSION['phonenumber'];
    $name = $_POST['name'];
    $list = $_POST['list'];
    $total = $_POST['total'];


            $sql = "INSERT INTO debtorstable (name,list,total,salersphonenumber) VALUES ('$name','$list','$total','$phonenumber')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){

       

			echo "<script>alert('Details recorded.')</script>";
            echo "<script>location.replace('adddebtor.php')</script>";
		}

    } 

  }else{
    echo "<script>alert('You are not logged in.')</script>";
    echo "<script>location.replace('index.php')</script>";
}
    




?>