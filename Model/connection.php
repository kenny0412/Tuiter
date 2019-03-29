<?php
    try {
        $connection = new PDO('mysql:host=localhost;dbname=tuiter','root', '');
          
    } catch (PDOExeption $error) {
        echo "Error: " . $error->getMessage(); 
    }
    ?>
  