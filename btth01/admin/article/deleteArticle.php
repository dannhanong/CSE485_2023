<?php
include_once "../connection.php";
$id = $_GET['id'];

$sqlDelete = "DELETE FROM baiviet WHERE `ma_bviet`='$id'";
$conn->exec($sqlDelete);
header("Location: ../article.php");
$conn=null;
?>