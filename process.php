<?php
include 'dbConnect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['validationCustom01'] ?? '';
    $last_name = $_POST['validationCustom02'] ?? '';
    $username = $_POST['validationCustomUsername'] ?? '';
    $email =$_POST['validationCustom03'] ?? '';
    $messages = $_POST['validationCustom05'] ?? '';
    //$checkbox = $_POST['invalidCheck'] ??'';
    // echo ' '. $first_name .' '. $last_name. ' '. $username. ' '. $email. ' '. $messages;
    // Validate empty fields
    if (!empty($first_name) && !empty($last_name) && !empty($username) && !empty($email) && !empty($messages)) {

    // Prepare SQL statement to insert data
        $stmt = $conn->prepare("INSERT INTO form_info (first_name, last_name, username, email, messages ) VALUES (?, ?, ?, ?, ? )");
        $stmt->bind_param("sssss", $first_name, $last_name, $username, $email, $messages);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        //In order to display the extracted data 
        echo "Name: " .htmlspecialchars($first_name) . "<br>";
        echo "Last Name: " .htmlspecialchars($last_name) . "<br>";
        echo "Username: " .htmlspecialchars($username) . "<br>";
        echo "Email: " .htmlspecialchars($email) . "<br>";
        echo "Message: " .htmlspecialchars($messages) . "<br>";
    } else {
        echo "Error one of the fields is empty";
    }

    header ("Location: face.html");
} else {
    echo "Form not submitted.";               

}

?>
