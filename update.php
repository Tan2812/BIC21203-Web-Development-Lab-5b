<?php
include 'Database.php';
include 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    // Update the user in the database
    if ($user->updateUser($matric, $name, $role)) {
        // Redirect to read.php after successful update
        header("Location: read.php");
        exit;
    } else {
        echo "Failed to update user.";
    }
} else {
    // Redirect if the script is accessed without POST
    header("Location: read.php");
    exit;
}
?>
