<?php
session_start();

?>

<!DOCTYPE html>
<html>
<body>

<?php
//remove all session variables
session_unset();
//destroy session

session_destroy();
//go to index page

echo "<script>alert('You are logged out.')</script>";
echo "<script>location.replace('index.php')</script>";

?>


</body>

</html>