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
<h4>Debtor:</h4>



<div>


<?php

$phonenumber = $_SESSION['phonenumber'];
$id=$_GET['u_id'];
    include('db.php');
    $sql="SELECT * FROM debtorstable where salersphonenumber='$phonenumber' and id = '$id' ORDER BY ID DESC";

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


            
        }
    }

	
		?>


</div>


<br><br>
<div>
<form action="delete.php" method="post">

<input type="hidden" name= "hiddenid" value=<?php echo $_GET['u_id'] ?>>
<button name="deletebtn" class="btn btn-danger">Delete Above Record</button>
</form>
<br><br>
</div>
</div>

</body>
</html>

<?php

if(isset($_POST['deletebtn'])){

include('db.php');
$postid = $_POST['hiddenid'];
$sql1= "DELETE FROM debtorstable where id = '$postid'";

$data= mysqli_query($con,$sql1);
if($data ==1) {
    echo "<script>alert('Record Deleted successfully.')</script>";
    echo "<script>location.replace('showdebtors.php')</script>";
}


}


?>


