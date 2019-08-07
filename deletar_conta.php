<?php
$con = mysqli_connect('localhost','root','','tech');
if (!isset($_SESSION)) session_start();
$id = $_GET['id'];

$query = "DELETE FROM `tbl_financa` WHERE id = '$id'";
$delete = mysqli_query($con, $query);
header("Location: dashboard.php");

?>