<!-- Session setup and required loading of CartItem, as we are storing those in the session variable 'Cart'. -->
<?php 

require_once("CartItem.php");
session_start();
//Database connection. Fail faster, etc.
$dbMaster = mysql_connect("localhost","root","") 
	or die("Failure to connect to database: " . mysql_error());

$booCrustSelected = (isSet($_POST['formCrustDropDown']))?true:false;
$booSizeSelected = (isSet($_POST['formSizeDropDown']))?true:false;

//Pulling in the Crust and Size stuff.
$pizzaCrust = (isSet($_POST['formCrustDropDown'])) ? $_POST['formCrustDropDown'] : "";
$pizzaSize = (isSet($_POST['formSizeDropDown'])) ? $_POST['formSizeDropDown'] : "";
//Also, the array of selected toppings.					
$arrCurrentToppings = NULL;
if(isSet($_POST["formAddTopping"]) or isSet($_POST["formSubmitButton"]))
{
	//Yay for shorthand 'if's Also, for using brakets in the name of a input group.
	$arrCurrentToppings = (isSet($_POST['formToppingSelect']))?$_POST['formToppingSelect']:NULL;
}

//Also, re-direction for reasons.
if(isSet($_POST['formSubmitButton']) and $booCrustSelected and $booSizeSelected) //If the 'Submit to Cart' button ahs been pressed..
{
	$dbTemp = mysql_query("SELECT ID FROM pizza bases WHERE CRUST = ".$pizzaCrust." AND WHERE SIZE = ".$pizzaSize, $dbMaster)
	$intPizzaID;
	while($arrRetrieved = mysql_fetch_array($dbTemp))
    {
		$intPizzaID = intval($arrRetrieved['ID']);
	}
	$tempPizza = CartItem::NewPizza($intPizzaID, $arrCurrentToppings);
	$_SESSION['Cart'][] = $tempPizza;
	header('Location: cart.php');
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Luigi's BYOP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Remember to replace this with the CSS when that is eventually made. -->
        <style>
        p {text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;}
        .bordered {border: thick solid white;}
        .selectorSubWrapper {float:left;}
        .filler {width: 30px; float:left; padding:2px;}        
        .SelectorTextLabelBorderless {width: 140px; padding-bottom: 5px; text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;}
        .SelectorTextLabel {border: thick solid white; width: 140px; padding-bottom: 5px; text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;}
        .SelectorDropDown {width:150px;}
        #selectorWrapperMain {overflow: hidden; position: relative; padding:20px;}
        
        </style>
    </head>
    <body style="background-color: slategray">
        <div id="Header"></div> <!-- Placeholder for the navigation stuff. -->
        <div id="Sidebar"></div> <!-- Similarly, have sidebar stuff go here. -->
	<div id="Content"> <!-- For when this is actually made to matter - Again, through CSS. -->
        <div class='bordered'>
            <p>
            Picture the Perfect Pie
            </p>
        </div>
        <br>
        <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post" id="selectorWrapperMain">
            <?php
				/* Pulling the options list from the database. */
				
                $arrToppings; 
				$arrPizzaCrusts;
				$arrPizzaSizes;
				
				//Filling in the option tables.
				
				//TOPPINGS
				$dbTemp = mysql_query("SELECT ID, Name FROM toppings", $dbMaster)
                   or die("Table read error: ".mysql_error());
				while($arrRetrieved = mysql_fetch_array($dbTemp))
                {
					$arrToppings[] = $arrRetrieved['Name'];
				}
				
				//CRUSTS
				$dbTemp = mysql_query("SELECT DISTINCT CRUST FROM pizza bases", $dbMaster)
                   or die("Table read error: ".mysql_error());
				while($arrRetrieved = mysql_fetch_array($dbTemp))
                {
					$arrPizzaCrusts[] = $arrRetrieved['CRUST'];
				}
				
				//SIZES
				$dbTemp = mysql_query("SELECT DISTINCT SIZE FROM pizza bases", $dbMaster)
                   or die("Table read error: ".mysql_error());
				while($arrRetrieved = mysql_fetch_array($dbTemp))
                {
					$arrPizzaSizes[] = $arrRetrieved['SIZE'];
				}
				
				// THIS WILL BE REPLACED BY SESSION STUFF. ALSO CHECKBOXES.
				/*Part of the 'Code Relocation Project' aka 'this was at the end and it fit better at the start because of a check'. Being kept for posterity.
			
				$arrCurrentToppings = NULL;
				//Grabbing the toppings from the hidden thingy.			
				$strImplodedString = (isSet($_POST['transToppings']))?$_POST['transToppings']:"";	
				if($strImplodedString != "")
				{
					$arrCurrentToppings = explode("|",$strImplodedString);
				}
				//Adding the current topping to the end of the array now.
				if(isSet($_POST["formAddTopping"]))
				{
					//Yay for shorthand 'if's.
					$strToppingName = (isSet($_POST['formToppingSelect']))?$_POST['formToppingDropDown']:"";
					if($strToppingName != "")
					{
						$arrCurrentToppings[] = $strToppingName;
					}
				}
			
				if(count($arrCurrentToppings) > 0)
				{			
					$strImplodedString = implode("|",$arrCurrentToppings);
					echo "<input type='hidden' name='transToppings' value='$strImplodedString' />";
				}	*/			
            ?>
            <div id="CrustSelector" class="selectorSubWrapper">
             <div id="CrustText" class="SelectorTextLabel">
                Crust
				<?php 
				if(!$booCrustSelected)
				{
					echo "<br /> Select a crust!";
				}
				?>               
             </div>
             <div>
                <select name="formCrustDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
					<!-- Will add this in later today - Pull in values from 'pizza bases' table in the database. -->
                    <?php
					foreach($arrPizzaCrusts as $strCrust)
					{
						if($pizzaCrust ==$strCrust)
						{
							echo "<option 'selected' >$strCrust</option>";	
						}
						else	
						{
							echo "<option>$strCrust</option>";	
						}					
					}
					?>
                </select>
                 
                <?php
                ?>
             </div>
            </div>
            <div class='filler'></div>
			<!-- May not end up having this - Otherwise, note is the same here as it was in the crust.
             <div id="SauceSelector" class="selectorSubWrapper">
             <div id="SauceText" class="SelectorTextLabel">
                Sauce                
             </div>
             <div>
                <select name="formSauceDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
                    <option <?php //if($pizzaSauce == "Non"){ echo "selected";} ?> value="Non">None</option>
                    <option <?php //if($pizzaSauce == "Red"){ echo "selected";} ?> value="Red">Classic Red</option>
                    <option <?php //if($pizzaSauce == "Alf"){ echo "selected";} ?> value="Alf">Alfredo</option>
                    <option <?php //if($pizzaSauce == "Pes"){ echo "selected";} ?> value="Pes">Pesto</option>
                </select>
                 
             </div>
            </div>
            <div class='filler'></div> For the moment, though, sauce seems to be a stretch goal. -->
             <div id="SizeSelector" class="selectorSubWrapper">
             <div id="SizeText" class="SelectorTextLabel">
                Size
				<?php 
				if(!$booSizeSelected)
				{
					echo "<br /> Select a size!";
				}
				?> 			
             </div>
             <div>
                <select name="formSizeDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
					<!-- Will add this in later today - Pull in values from 'pizza bases' table in the database. -->
					<?php
					foreach($arrPizzaSizes as $strSize)
					{
						if($pizzaSize == $strSize)
						{
							echo "<option 'selected' >$strSize</option>";	
						}
						else	
						{
							echo "<option>$strSize</option>";	
						}					
					}
					?>
                </select>
                 
                
             </div>
            </div>
            
            <div class="filler"></div>
             <div id="ToppingSelector" class="selectorSubWrapper">
                <div id="ToppingText" class="SelectorTextLabel">
                Toppings                
                </div>
                <div>
                    <?php 
                    //arrToppings is now being pulled from the database.
                    foreach($arrToppings as $topName)
                    {
                        //Seeing if the topping is already selected to keep it that way.
                        if(!in_array($topName,$arrCurrentToppings))
                        {
                        	echo "<input type='checkbox' name='formToppingSelect[]'/>".$topName."<br />";
                        }
						else
						{
                        	echo "<input type='checkbox' name='formToppingSelect[]' checked='checked'/>".$topName."<br />";                           
						}
                    }
                    ?>
					<input type="submit" name="formAddTopping" value="Update Toppings" /> <!-- Adding the 'Add Topping' button to here, as half/whole are not being bothered with. -->
                </div>
                 <div style="float:left;">
                     
                 </div>
            </div>
            
			<div class="selectorSubWrapper">
			<!-- Out of scope. 
                <input type="radio" name="radToppingCoverage" value="whole" checked="checked"  /> Whole <br>
                <input type="radio" name="radToppingCoverage" value="half" /> Half <br>
                <input type="submit" name="formAddTopping" value="Add Topping" />
            <br><br>			
			-->		
            <input type="submit" name="formSubmitButton" value="Submit Pizza to Cart" />
                
            
            </div>
            
            <?php
            /* This version of recently past me missed one major advantage of array simplification. Also, there were better places to put the code for this.			
            $intNumToppings;
            if(isSet($_POST['transNumToppings']))
            {
                $intNumToppings = intval($_POST['transNumToppings']);
            }
            else
            {
                $intNumToppings = 0;
            }
			//By taking out the half/whole stuff, this is made MUCH easier.
            if($intNumToppings != 0)
            {
				//Doing a for loop here to grab all the toppings.
                for($intToppingInputCounter = 0; $intToppingInputCounter < $intNumToppings; $intToppingInputCounter++)
                {
					//Ah, so much simpler.
                    $arrCurrentToppings[] = $_POST['transTopping'.$intToppingInputCounter];
                }
            }
            else
            {
                $arrCurrentToppings[] = "Topping";
            }
            
            if(isSet($_POST["formAddTopping"]))
            {
				//Yay for shorthand 'if's.
                $strToppingName = $_POST['formToppingDropDown'] ?: "";
                if($strToppingName != "")
                {
                    $arrCurrentToppings[] = $strToppingName;
                }
            }
            
            //And now for transforming the array into a series of hidden inputs for transfer.
			//SO MUCH BETTER WITHOUT COVERAGE WHY DID I EVER THINK THAT WAS A GOOD IDEA
            
            if(isset($_POST["formAddTopping"]) or isset($_POST["formSubmitButton"]))
            {
                //Using it as a counter variable now.               
                $intNumToppings = 0;
                foreach($arrCurrentToppings as $arrTopping)
                {
                    echo "<input type='hidden' name='transTopping".$intNumToppings."' value='$arrTopping' />";
                    $intNumToppings++;
                }
                echo "<input type='hidden' name='transNumToppings' value='".$intNumToppings."' />";
            }
            else
            {                
                echo "<input type='hidden' name='transNumToppings' value='0' />";
            }*/
            ?>
        </form>
		</div> <!-- Closing the 'Content' div. -->
		
        <div id="Footer"></div> <!-- Placeholder for the footer, if one exists. -->
        
    </body>
</html>
