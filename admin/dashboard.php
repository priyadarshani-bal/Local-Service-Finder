<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f4f6f9;
}

.sidebar{
width:250px;
height:100vh;
background:#1e293b;
position:fixed;
color:white;
}

.sidebar h2{
text-align:center;
padding:20px;
}

.sidebar a{
display:block;
padding:15px;
color:white;
text-decoration:none;
}

.sidebar a:hover{
background:#334155;
}

.main{
margin-left:250px;
padding:20px;
}

.cards{
display:flex;
gap:20px;
margin-bottom:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
width:250px;
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

table{
width:100%;
background:white;
border-collapse:collapse;
}

th,td{
padding:12px;
border:1px solid #ddd;
}

button{
padding:10px;
background:#2563eb;
color:white;
border:none;
cursor:pointer;
}

</style>
</head>
<body>

<div class="sidebar">
<h2>Admin Panel</h2>

<a href="#">Dashboard</a>
<a href="#">Add Service</a>
<a href="#">Manage Services</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<h1>Admin Dashboard</h1>

<div class="cards">

<div class="card">
<h3>Total Services</h3>

<?php
$count = $conn->query("SELECT * FROM services");
echo $count->num_rows;
?>

</div>

</div>

<h2>Add Service</h2>

<form action="add_service.php" method="POST">

<input type="text" name="name" placeholder="Service Name" required><br><br>

<input type="text" name="type" placeholder="Service Type" required><br><br>

<input type="text" name="location" placeholder="Location" required><br><br>

<input type="text" name="phone" placeholder="Phone" required><br><br>

<button>Add Service</button>

</form>

<br>

<h2>Manage Services</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>SERVICE_Type</th>
<th>Location</th>
<th>Phone</th>

</tr>

<?php

$result = $conn->query("SELECT * FROM services");

while($row=$result->fetch_assoc())
{

echo "<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['service_type']}</td>
<td>{$row['location']}</td>
<td>{$row['phone']}</td>

<td>
<a href='delete_service.php?id={$row['id']}'>Delete</a>
</td>
</tr>";

}

?>

</table>

</div>

</body>
</html>