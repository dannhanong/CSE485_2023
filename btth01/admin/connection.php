<?php

   try{
       $conn = new mysqli("localhost","root","","BTTH01_CSE485");
   }catch(PDOException $e){
       echo $e->getMessage();
   }

?>