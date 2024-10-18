<?php
$user = $_POST['user'];
$pass =$_POST['pass'];

//Dtabse connection
$conn = new mysqli("localhost","root","","test");
if ($conn->connect_error ){
    die("Failed to connect : ".$conn->connect_error);
} else{
    $stmt = $conn->prepare("select * from registration where user = ?");
    $stmt ->bind_param("s",$user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if ($data['pass'] === $pass){
            header("Location:weatherApp.html");
            exit;

        
    } else {
        echo "<h2> Invalid Username or Password </h2>";
    }
} else {
    echo "<h2> Invalid Username or Password </h2>";
}
}



?>