<?php
include("connection.php");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["fullname"])) {
    $fullname = mysqli_real_escape_string($con, $_POST["fullname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $subject = mysqli_real_escape_string($con, $_POST["subject"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    $id = $_POST["id"];
    if ($id == 0) {
        $query = "INSERT INTO contact (fullname, email, subject, message) ";
        $query .= "VALUES ('$fullname', '$email', '$subject', '$message')";
        
        if (mysqli_query($con, $query)) {
            
            header("Location: contact.php");
            exit();
        } else {
        
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
}
?>
