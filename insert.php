<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Register the user using POST data
    if ($user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role'])) {
        // Redirect to read.php after successful creation
        header("Location: read.php");
        exit;
    } else {
        echo "Failed to create the user.";
    }

    // Close the connection
    $db->close();
} else {
    echo "Invalid request method.";
}
?>
