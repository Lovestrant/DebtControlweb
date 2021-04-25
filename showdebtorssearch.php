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
<div style="text-align: left;">
<a href="main.php"><button style="color: red;">Main</button></a><br><br>
<h4>Debtors:</h4>
<br>

<div>


<?php

$phonenumber = $_SESSION['phonenumber'];

 include('db.php');
 if(isset($_POST['searchbtn'])) {
     if(!empty($_POST['searchinput'])){

     $search = mysqli_real_escape_string($con, $_POST['searchinput']);

     $sql = "SELECT * FROM debtorstable WHERE salersphonenumber ='$phonenumber' and name LIKE '%$search%'";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
 
                echo "
                
                <div >
                <div style='text-transform: uppercase;color: blue;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['name']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
                <p>".$row['list']."</p>
                </div>
              
                <div  style='height: auto; color:green; width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
               <p>" ."Total:".$row['total']."</p>
                </div>
                ";
                echo"
                <div style='text-align: right;margin-top: 10px;'>
                <a  href='editdebtorsdetails.php?u_id=".$row['id']."'>
                     
           
                <button class='btn btn-primary'>Edit</button>
                </a>
                </div>
        
                ";
                echo"
                <div style='text-align: right;margin-top: 10px;'>
                <a  href='delete.php?u_id=".$row['id']."'>
                     
           
                <button class='btn btn-danger'>Delete</button>
                </a>
                </div>
        
                ";

            

        }
        }else{
            echo "<script>alert('No result matching your search.')</script>";
            echo "<script>location.replace('showdebtors.php')</script>";
         }
     }else{
        echo "<script>alert('Type something to search.')</script>";
        echo "<script>location.replace('showdebtors.php')</script>";
     
    }
	
}		?>


</div>

</div>
<br><br>


</div>

</body>
</html>

