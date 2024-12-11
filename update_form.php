<?php
include 'Database.php';
include 'User.php';



if (isset($_GET['matric']) && !empty($_GET['matric'])) {
    $matric = $_GET['matric'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    if (!$userDetails) {
        die("User not found in the database.");
    }
} else {
    die("Matric parameter is missing in the URL.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="update.php" method="post">
    <div class="form-group">
        <label for="matric">Matric Number:</label>
        <input type="text" name="matric" value="<?php echo $userDetails['matric']; ?>" class="form-input" readonly><br>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>"  class="form-input"required><br>
    </div>
    <label for="role">Access Level:</label>
    <div class="form-group">
        <select name="role" id="role"  class="form-input"required>
            <option value="">Please select</option>
            <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
            <option value="student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
        </select><br>
    </div>
    <div class="form-buttons">
    <input type="submit" value="Update" class="form-submit">
    <a href="read.php" class="form-cancel">Cancel</a>
</div>

    </form>
</body>
</html>
