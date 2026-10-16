<?php 
include('koneksi.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM Customer WHERE CustomerID=$id");
header("location:index.php");
?>