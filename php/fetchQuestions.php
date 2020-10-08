<?php
//echo "hundred!";]
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "users";
// Create connection


$link = mysqli_connect($servername, $username, $password, $database);

$name_category = $_GET["name"];

$query = mysqli_query($link, "select * from questions where Category = '$name_category'");

$result = array();

if (mysqli_num_rows($query)) {

    while ($row = $query->fetch_assoc()) {

        $result[] = $row;

    }

    //returns a string
    $jsonArray = json_encode($result, true);

    //decode that string into an array
    $decode = json_decode($jsonArray);


for($i = 0; $i < sizeof($decode); $i++){

    $jsonObject = $decode[$i];

//try starting by dding everything to the array and then echo the div
    $userID = "UserID";
    $questionKey = "QuestionID";
    $messageKey = "Message";

    $firstName = $jsonObject->$userID;
    $question = $jsonObject->$questionKey;
    $message = $jsonObject->$messageKey;

    echo "
        <!--   <a href='tobadialogbox.html' class='material-icons floating-btn'>add</a> -->
    <!--        <button onclick='document.getElementById('modal')' class='material-icons floating-btn' id='click'>add</button>-->

            <div class='card' style='margin-bottom: 0px !important;margin-top: 0px !important;width:100%;height:150px;position: center;background-color: #1eccf8; border-radius: 15px'>
                <h3><em>Student Number : $firstName</em></h3>
                <h1>Message: $message</h1>
                <button class='material-icons list' style='font-size:28px; border: none;background-color:#1eccf8'>list</button>
            </div>
            <div id='myModal' class='modal'>
                <!-- Modal content -->
                <div  class='modal-content'>
                    <div class='modal-header'>
                        <span class='close'>&times;</span>
                        <h2>Question</h2>
                    </div>
                    <div class='modal-body'>
                        <form action='insertQuestion.php' method='post'>
                            <textarea id='question' class='userInput' name='question'></textarea><br><br>
                            <input type='submit' value='Submit'>
                            <input type='text' id='field' name='field' value='$name_category'>
                            <p style='padding-left: 350px;  font-size:20px;  display: inline'>Enter your student number:</p>
                            <input type='text' id='stud_num' name='stud_num' value='$firstName'>
                        </form>
                    </div>
                </div>
            </div>";

    }
    session_abort();

}
else {
    echo " <div style='width:100%;height:150px;position: center;padding:10px; background-color: white'>
                <h1>There are no Questions regarding this field!</h1> 
                            <div id='myModal' class='modal'>
                <!-- Modal content -->
                <div  class='modal-content'>
                    <div class='modal-header'>
                        <span class='close'>&times;</span>
                        <h2>Question</h2>
                    </div>
                    <div class='modal-body'>
                        <form action='insertQuestion.php' method='post'>
                            <textarea id='question' class='userInput' name='question'></textarea><br><br>
                            <input type='submit' value='Submit'>
                            <input type='text' id='field' name='field' value='$name_category'>
                            <input type='text' id='enter_stud_num' placeholder='Enter your student number:'>
                            <input type='text' id='stud_num' name='stud_num'>
                        </form>
                    </div>
                </div>
            </div>" ;
}

//$_SESSION['name'] = "";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <title>Questions</title>

    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/fetchQuestions.css">
    <!--<link rel="stylesheet" href="../css/overflow.css">-->

</head>
<body>

<div class='container'>
    <div style='padding-bottom: 0px' class='app'>
        <!-- Trigger/Open The Modal -->
        <button id='myBtn' class='material-icons floating-btn' >add</button>
            <script>
                // Get the modal
                let modal = document.getElementById("myModal");

                // Get the button that opens the modal
                let btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                let span = document.getElementsByClassName("close")[0];

                // When the user clicks on the button, open the modal
                btn.onclick = function() {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>
    </div>
</div>
</body>
</html>



