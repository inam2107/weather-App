<?php 
$user = $_POST['user'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];


//database connection
$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error ){
    die('Connection Failed : '.$conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into registration(user,pass,repass)
    values(?, ?, ?)");
    $stmt->bind_param("sss",$user,$pass,$repass);
    $stmt->execute();
    echo '<script> alert("ok"); </script>';
    echo "Registration Successfully...";
    header("Location:login.html");
    $stmt->close();
    $conn->close();

}
?>