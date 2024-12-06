<?php 

session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'login_database';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM list WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($conn, $sql);

   
    $data = mysqli_fetch_array($query);

    if ($email == $data['email'] && $password == $data['password']) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['name'];
        header('location:wlc.php'); 
        exit();
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}

if (isset($_SESSION['email'])) {
    header('location:wlc.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Logout</title>
</head>
<body>
    
    <form action="index.php" method="POST">
        <input type="text" name="email" placeholder="Enter your email" required> <br> <br>
        <input type="password" name="password" placeholder="Enter your password" required><br> <br> 
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
