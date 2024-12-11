<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>

<body>
    <h1>Registration Page</h1>
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="accessLevel" class="form-input" required>
                <option value="">Please select</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select>
        </div>
        <button type="submit" name="submit" class="form-submit">Submit</button>
    </form>
</body>
</html>