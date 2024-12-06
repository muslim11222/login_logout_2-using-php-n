<?php 

session_start();

if(isset($_SESSION['email'])) {
     echo 'Well come to our deshbord'. $_SESSION['name']; 
} else {
     header('location:index.php');
}

?>
<a href="logout.php">login page</a>

