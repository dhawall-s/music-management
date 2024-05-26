<?php
$firstName = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Establishing connection to MySQL server
$conn = new mysqli('localhost', 'root', '', 'forms');

// Check connection
if($conn->connect_error) {
    die('Connection Failed: '.$conn->connect_error);
} else {
    // Preparing SQL statement to insert data into 'registration' table
    $stmt = $conn->prepare("INSERT INTO registration (firstname, email, password) VALUES (?, ?, ?)");

    // Binding parameters
    $stmt->bind_param("sss", $firstName, $email, $password);

    // Executing the statement
    if ($stmt->execute()) {
        echo "Registration Successful...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Closing statement and connection
    $stmt->close();
    $conn->close();
}
?>
