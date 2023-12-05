<?php
include_once "../connection.php";
$id = $_GET['id'];

$sqlDelete = "DELETE from tacgia WHERE ma_tgia = '$id'";
$conn->exec($sqlDelete);
header("Location: ../author.php");
$conn=null;
?>