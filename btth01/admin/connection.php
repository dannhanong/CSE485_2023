<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485","root","123456");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>