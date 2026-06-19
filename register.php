<?php include 'config/db.php'; ?>

<form method="POST">
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" required>
    <input name="phone" placeholder="Phone" required>
    <input name="location" placeholder="Location" required>
    <input name="password" type="password" placeholder="Password" required>
    <button name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
    $conn->query("INSERT INTO users(name,email,phone,password,location)
    VALUES('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[password]','$_POST[location]')");

    echo "Registered Successfully!";
    header("refresh:2;url=index.php");
}
?>