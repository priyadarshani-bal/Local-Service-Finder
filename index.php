<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
   
</head>
<body>

<div class="login-box">
    <h2>Local Service Finder</h2>

    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Email / Admin Name" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Login</button>
    </form>

    <p>Not registered? <a href="register.php">Register</a></p>
</div>

</body>
</html>