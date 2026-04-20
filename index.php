<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Online Exam System</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <?php if(isset($_GET['error'])) { echo "<p style='color:red;'>".$_GET['error']."</p>"; } ?>
        
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required autocomplete="username">
            <br><br>
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <br><br>
            <button type="submit" name="login_btn">Login</button>
        </form>
    </div>
</body>
</html>