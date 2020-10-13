<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $name= $_POST['name'];
    $name= $_POST['surname'];
    $student_number= $_POST['student_number'];
    $passW = $_POST['password'];
    $rePassW = $_POST['re-password'];
    $sql = "INSERT INTO `users` (`QuestionID`, `Message`, `Date`, `Votes`, `Username`, `UserID`, `Category`) VALUES (NULL,'$question', CURRENT_DATE, '0', '$student_number', '$student_number', '$field')";
    $result = mysqli_query($conn,$sql);
    // echo ($result);

    if (mysqli_num_rows($result)>0) {
        header("Location:../home.php");
        exit();
    } else {
        echo(" wrong details");
    }


}




?>

