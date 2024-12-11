<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>

    <body>
        <h1>Login Page</h1>
        <form action="authenticate.php" method="post">
        <div class="form-group">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" class="form-input" required><br>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-input" required><br>
        </div>
            <input type="submit" name="submit" value="Login" class="form-submit"><br>
            <p><a href="register_form.php">Register</a> here if you have not.</p>
        </form>
    </body>
</html>