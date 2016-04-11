<!-- TODO: Initialize session, pull in any passed values if sent here from the cart (via a pizza click) or from Premade Pizzas (TBI) -->

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
				/* Setting up empty variables for the selectors to run off of. Also, pulling in values from POST if the values were set. TBI: Pull from session if sent here from the right places. */
                $pizzaCrust = (isSet($_POST['formCrustDropDown'])) ? $_POST['formCrustDropDown'] : "";
                //$pizzaSauce = (isSet($_POST['formSauceDropDown'])) ? $_POST['formSauceDropDown'] : "";
                $pizzaSize = (isSet($_POST['formSizeDropDown'])) ? $_POST['formSizeDropDown'] : "";
                $arrPizzatoppings;  
				
				
				// THIS WILL BE REPLACED BY SESSION STUFF. ALSO CHECKBOXES.
				//Part of the 'Code Relocation Project' aka 'this was at the end and it fit better at the start because of a check'.
			
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
					$strToppingName = (isSet($_POST['formToppingDropDown']))?$_POST['formToppingDropDown']:"";
					if($strToppingName != "")
					{
						$arrCurrentToppings[] = $strToppingName;
					}
				}
			
				if(count($arrCurrentToppings) > 0)
				{			
					$strImplodedString = implode("|",$arrCurrentToppings);
					echo "<input type='hidden' name='transToppings' value='$strImplodedString' />";
				}				
            ?>
            <div id="CrustSelector" class="selectorSubWrapper">
             <div id="CrustText" class="SelectorTextLabel">
                Crust                
             </div>
             <div>
                <select name="formCrustDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
					<!-- Will add this in later today - Pull in values from 'pizza bases' table in the database. -->
                    <option <?php if($pizzaCrust == "Thin"){ echo "selected";} ?> value="Thin">Thin</option>
                    <option <?php if($pizzaCrust == "Norm"){ echo "selected";} ?> value="Norm">Standard</option>
                    <option <?php if($pizzaCrust == "Deep"){ echo "selected";} ?> value="Deep">Deep Dish</option>
                    <option <?php if($pizzaCrust == "Stff"){ echo "selected";} ?> value="Stff">Stuffed</option>
                    <option <?php if($pizzaCrust == "GlFr"){ echo "selected";} ?> value="GlFr">Gluten-Free</option>
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
             </div>
             <div>
                <select name="formSizeDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
					<!-- Will add this in later today - Pull in values from 'pizza bases' table in the database. -->
                    <option <?php if($pizzaSize == "Per"){ echo "selected";} ?> value="Per">Personal (6")</option>
                    <option <?php if($pizzaSize == "Sml"){ echo "selected";} ?> value="Sml">Small (8")</option>
                    <option <?php if($pizzaSize == "Med"){ echo "selected";} ?> value="Med">Medium (12")</option>
                    <option <?php if($pizzaSize == "Lrg"){ echo "selected";} ?> value="Lrg">Large (16")</option>
                    <option <?php if($pizzaSize == "Prt"){ echo "selected";} ?> value="Prt">Party (24")</option>
                    <option <?php if($pizzaSize == "why"){ echo "selected";} ?> value="why">Giant (90")</option>
                </select>
                 
                
             </div>
            </div>
            
            <div class="filler"></div>
             <div id="ToppingSelector" class="selectorSubWrapper">
                <div id="ToppingText" class="SelectorTextLabel">
                Toppings                
                </div>
                <div>
                    <select name="formToppingDropDown" class="SelectorDropDown">
                        <?php 
                        //In future, pull from the Toppings database for this. (Will do later today)
                        $arrToppings = array("pepperoni"=>"Pepperoni","cheese"=>"Cheese","sausage"=>"Sausage","greenbellpeppers"=>"Green Bell Peppers","onions"=>"Onions");
                        $booNoUniqueToppings = true;
                        foreach($arrToppings as $topValue => $topName)
                        {  
                            if(!in_array($topValue,$arrCurrentToppings))
                            { 
                                $booNoUniqueToppings = false;
                                break;
                            }                         
                        }
                        if($booNoUniqueToppings == true)
                        {
                            echo "<option value=''>No toppings left!</option>";                            
                        }
                        else
                        {                            
                            echo "<option value=''>Select...</option>";
                            foreach($arrToppings as $topValue => $topName)
                            {
                            				//Seeing if the topping is already selected to avoid duplicates.
                            				if(!in_array($topValue,$arrCurrentToppings))
                            				{
                            					echo "<option value='$topValue'>".$topName."</option>";
                            				}
                            }
                        }
                        ?>
                    </select> 
					<input type="submit" name="formAddTopping" value="Add Topping" /> <!-- Adding the 'Add Topping' button to here, as half/whole are not being bothered with. -->
                </div>
                 <div style="float:left;">
                     
                 </div>
            </div>
            <!-- Out of scope. 
			<div class="selectorSubWrapper">
                <input type="radio" name="radToppingCoverage" value="whole" checked="checked"  /> Whole <br>
                <input type="radio" name="radToppingCoverage" value="half" /> Half <br>
                <input type="submit" name="formAddTopping" value="Add Topping" />
            <br><br>
            <input type="submit" name="formSubmitButton" value="Submit" />
                
            
            </div>
			-->
            
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
