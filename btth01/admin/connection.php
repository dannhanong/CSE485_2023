<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=BooksManagementSystem","root","123456");

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>