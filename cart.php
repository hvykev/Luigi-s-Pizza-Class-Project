<?php 
    require_once("CartItem.php");
    require_once("LuigiPizzaDB_Connect.php");
    session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $intNumItems = count($_SESSION['Cart']);        
        for($intCounter = 0; $intCounter < $intNumItems; $intCounter++)
        {
            $_SESSION['Cart'][$intCounter]->ConnectDB();
            $_SESSION['Cart'][$intCounter]->displayItem();
            echo "<br>";
        }
        
        ?>
    </body>
</html>
