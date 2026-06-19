<?php
include '../config/db.php';

if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO services (name, service_type, location, phone)
            VALUES ('$name', '$type', '$location', '$phone')";

    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
}
?>