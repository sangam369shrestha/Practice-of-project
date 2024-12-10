<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        'status' => 'error',
        'messages' => ['Database connection failed: ' . $conn->connect_error]
    ]);
    exit();
}

// Initialize response array
$response = [
    'status' => 'error',
    'messages' => []
];

// Collect and sanitize input
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$age = isset($_POST['age']) ? intval($_POST['age']) : 0;
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
$preferences = isset($_POST['preferences']) ? implode(', ', $_POST['preferences']) : '';
$bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';

// Validation
if (empty($name)) {
    $response['messages'][] = 'Name is required.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['messages'][] = 'Valid email is required.';
}
if ($age <= 0) {
    $response['messages'][] = 'Age must be a positive number.';
}
if (empty($gender)) {
    $response['messages'][] = 'Gender is required.';
}
if (empty($bio)) {
    $response['messages'][] = 'Bio is required.';
}

// If validation fails
if (!empty($response['messages'])) {
    echo json_encode($response);
    exit();
}

// Insert data into the database
$sql = "INSERT INTO users (name, email, age, gender, preferences, bio) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisss", $name, $email, $age, $gender, $preferences, $bio);

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['messages'][] = 'Data inserted successfully.';
} else {
    $response['messages'][] = 'Database error: ' . $conn->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
