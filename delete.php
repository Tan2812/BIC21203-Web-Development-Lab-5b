<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    if (isset($_GET['matric']) && !empty($_GET['matric'])) {
        $matric = $_GET['matric'];

        // Create an instance of the Database class and get the connection
        $database = new Database();
        $db = $database->getConnection();

        // Create an instance of the User class
        $user = new User($db);

        // Delete the user
        if ($user->deleteUser($matric)) {
            // Redirect to read.php after successful deletion
            header("Location: read.php");
            exit;
        } else {
            echo "Failed to delete the user.";
        }

        // Close the connection
        $db->close();
    } else {
        echo "Matric parameter is missing.";
    }
}
?>
