<?php
include 'Database.php';
include 'User.php';

session_start();

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $database = new Database();
    $db = $database->getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        if ($userDetails && password_verify($password, $userDetails['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $userDetails['matric'];
            $_SESSION['username'] = $userDetails['name'];

            // Redirect to read.php
            header("Location: read.php");
            exit();
        } else {
            echo 'Invalid username or password. Try <a href="login.php">login</a> again.';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
?>
