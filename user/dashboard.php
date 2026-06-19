<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user']))
{
header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

.navbar{
background:#2563eb;
padding:15px;
color:white;
display:flex;
justify-content:space-between;
}

.container{
padding:20px;
}

.card{
background:white;
padding:20px;
margin:15px;
border-radius:10px;
display:inline-block;
width:280px;
box-shadow:0px 2px 10px rgba(0,0,0,0.1);
}

.card h3{
color:#2563eb;
}

</style>

</head>

<body>

<div class="navbar">

<h2>Local Service Finder</h2>

<a href="logout.php" style="color:white;">Logout</a>

</div>

<div class="container">

<h1>Available Services</h1>

<?php

$result = $conn->query("SELECT * FROM services");

while($row=$result->fetch_assoc())
{

echo "

<div class='card'>

<h3>{$row['name']}</h3>

<p><b>Type:</b> {$row['service_type']}</p>

<p><b>Location:</b> {$row['location']}</p>

<p><b>Phone:</b> {$row['phone']}</p>

</div>

";

}

?>

</div>

</body>
</html>