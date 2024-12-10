<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sl";  // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();  // Initialize the response array to store messages

// Check if form data is set
if (isset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['dob'], $_POST['time'], $_POST['gender'], $_POST['username'], $_POST['password'])) {
    // Sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $age = $conn->real_escape_string($_POST['age']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $time = $conn->real_escape_string($_POST['time']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password

    // Handle optional file upload
    $file = null;
    if (isset($_FILES['file'])) {
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        if ($fileError === 0) {
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExt, $allowedExts)) {
                if ($fileSize < 5000000) {  // 5MB max file size
                    $fileDestination = 'images/' . uniqid('', true) . '.' . $fileExt;
                    move_uploaded_file($fileTmp, $fileDestination);
                    $file = $fileDestination;  // Store file path for DB insert
                } else {
                    $response['error'] = "File size is too large.";
                    echo json_encode($response);
                    exit();
                }
            } else {
                $response['error'] = "Invalid file type.";
                echo json_encode($response);
                exit();
            }
        }
    }

    // Server-side validation
    if (empty($name) || empty($email) || empty($age) || empty($dob) || empty($time) || empty($gender) || empty($username) || empty($password)) {
        $response['error'] = "All fields are required.";  // Store error message
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['error'] = "Invalid email format.";  // Store error message
    } else {
        // Insert data into MySQL database
        $sql = "INSERT INTO users (name, email, age, dob, time, gender, username, password, file) 
                VALUES ('$name', '$email', '$age', '$dob', '$time', '$gender', '$username', '$password', '$file')";

        if ($conn->query($sql) === TRUE) {
            $response['success'] = "Data submitted successfully!";  // Store success message
        } else {
            $response['error'] = "Error: " . $conn->error;  // Store error message if insertion fails
        }
    }

    $conn->close();
} else {
    $response['error'] = "No data received.";  // Store error message if no data is received
}

// Return response as JSON
echo json_encode($response);
?>
