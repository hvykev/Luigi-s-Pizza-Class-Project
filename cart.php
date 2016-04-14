<?php 
    require_once("CartItem.php");
    require_once("LuigiPizzaDB_Connect.php");
    session_start();
	
	if(isSet($_POST['formRemoveItems']) and isSet($_POST['formCartRemoval']))
	{
		$arrTemp = $_SESSION['Cart'];
		$arrToRemove = $_POST['formCartRemoval'];
                
		foreach($arrToRemove as $intRemovalVal)
                {
                    //The echo here was for debugging purposes.
                    //echo "Removing item: ".$intRemovalVal;
                    unset($arrTemp[$intRemovalVal]);                        
		}
		$_SESSION['Cart'] = array_values($arrTemp);
                unset($_POST['formRemoveItems']);
                unset($_POST['formCartRemoval']);
	}
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
	<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post">
        <?php
        
        $intNumItems = count($_SESSION['Cart']);        
        for($intCounter = 0; $intCounter < $intNumItems; $intCounter++)
        {
            $_SESSION['Cart'][$intCounter]->ConnectDB();
            $_SESSION['Cart'][$intCounter]->displayItem();
			echo "<input type='checkbox' name='formCartRemoval[]' value='$intCounter'/> Remove this item?";
            echo "<br>";
        }
        
        ?>
		<input type="submit" name="formRemoveItems" value="Remove Checked Items" />
		<a href="BYOP.php">Return to Pizza Builder</a>
		</form>
    </body>
</html>
