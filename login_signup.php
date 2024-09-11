<?php
// Include database connection file
// include 'connect.php'; // assuming you have a db.php file for DB connection

// Check if the request is for signup or login
if (isset($_POST['signup'])) {
    // Handle Signup
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password for security

    // Check if the email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "Email is already registered!";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

} elseif (isset($_POST['login'])) {
    // Handle Login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the user from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "User not found!";
    }
}

// Close database connection
$conn->close();
?>
