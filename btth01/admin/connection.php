<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=CSE485_2023","root","");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>