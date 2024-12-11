<?php
// Start the session
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'Database.php';
include 'User.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css"> 
    <title>Read Users</title>
</head>
<body>
<div class="container">
    <table border="1">
        <tr>
            <th class="center-text">Matric</th>
            <th class="center-text">Name</th>
            <th class="center-text">Level</th>
            <th colspan="2" class="center-text">Action</th>

        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["matric"]); ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["role"]); ?></td>
                    <td><a href="update_form.php?matric=<?php echo htmlspecialchars($row["matric"]); ?>">Update</a> </td>
                    <td><a href="delete.php?matric=<?php echo htmlspecialchars($row["matric"]); ?>">Delete</a> </td>
                   
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }

        $db->close();
        ?>
    </table>
    <a href="logout.php">
    <br><button class="logout-btn">Logout</button>
</a>
</div>
</body>
</html>
