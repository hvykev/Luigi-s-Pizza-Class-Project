<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Luigi's BYOP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div style="text-align: center">[Nav Bar and Logo go here]</div>
        <br>
        <br>
        <br>
        <div class='bordered'>
            <p>
            Picture the Perfect Pie
            </p>
        </div>
        <br>
        <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post" id="selectorWrapperMain">
            <?php
                $pizzaCrust = "";
                $pizzaSauce = "";
                $pizzaSize = "";
                $arrPizzatoppings;                    
                ?>
            <div id="CrustSelector" class="selectorSubWrapper">
             <div id="CrustText" class="SelectorTextLabel">
                Crust                
             </div>
             <div>
                <select name="formCrustDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
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
             <div id="SauceSelector" class="selectorSubWrapper">
             <div id="SauceText" class="SelectorTextLabel">
                Sauce                
             </div>
             <div>
                <select name="formSauceDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
                    <option <?php if($pizzaSauce == "Non"){ echo "selected";} ?> value="Non">None</option>
                    <option <?php if($pizzaSauce == "Red"){ echo "selected";} ?> value="Red">Classic Red</option>
                    <option <?php if($pizzaSauce == "Alf"){ echo "selected";} ?> value="Alf">Alfredo</option>
                    <option <?php if($pizzaSauce == "Pes"){ echo "selected";} ?> value="Pes">Pesto</option>
                </select>
                 
             </div>
            </div>
            <div class='filler'></div>
             <div id="SizeSelector" class="selectorSubWrapper">
             <div id="SizeText" class="SelectorTextLabel">
                Size                
             </div>
             <div>
                <select name="formSizeDropDown" class="SelectorDropDown">
                    <option value="">Select...</option>
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
                        <option value="">Select...</option>
                        <?php 
                        //In future, pull from a Topping database for this.
                        $arrToppings = array("pepperoni"=>"Pepperoni","cheese"=>"Cheese","sausage"=>"Sausage","greenpeppers"=>"Green Bell Peppers","onions"=>"Onions");
                        foreach($arrToppings as $topValue => $topName)
                        {
                            echo "<option value='$topValue'>".$topName."</option>";
                        }
                        ?>
                    </select> 
                </div>
                 <div style="float:left;">
                     
                 </div>
            </div>
            <div class="selectorSubWrapper">
                <input type="radio" name="radToppingCoverage" value="whole" checked="checked"  /> Whole <br>
                <input type="radio" name="radToppingCoverage" value="half" /> Half <br>
                <input type="submit" name="formAddTopping" value="Add Topping" />
            <br><br>
            <input type="submit" name="formSubmitButton" value="Submit" />
                
            
            </div>
            
            <?php
            $arrCurrentToppings;
            
            $intNumToppings;
            if(isSet($_POST['transNumToppings']))
            {
                $intNumToppings = intval($_POST['transNumToppings']);
            }
            else
            {
                $intNumToppings = 0;
            }
            //And now for the gathering of information for a 2-D array as transferred via implode stuff.
            //AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            //AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            if($intNumToppings != 0)
            {
                //AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                for($intToppingInputCounter = 0; $intToppingInputCounter < $intNumToppings; $intToppingInputCounter++)
                {
                    //AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                    $strArrayInput = $_POST['transTopping'.$intToppingInputCounter];
                    $arrTempArray = explode("|",$strArrayInput);
                    $arrCurrentToppings[] = $arrTempArray;
                }
            }
            else
            {
                //AAAAAAAAAAAAAAA--Oh, it's done?
                $arrCurrentToppings[] = array("Topping","Coverage");
            }
            
            if(isSet($_POST["formAddTopping"]))
            {
                $strCoverage = $_POST['radToppingCoverage'];
                $strToppingName = $_POST['formToppingDropDown'] ?: "";
                if($strToppingName != "")
                {
                    $arrCurrentToppings[] = array($strToppingName, $strCoverage);
                }
            }
            
            //And now for transforming the array into a series of hidden inputs for transfer.
            //..What, thought I was done screaming?
            
            if(isset($_POST["formAddTopping"]) or isset($_POST["formSubmitButton"]))
            {
                //Using it as a counter variable now.               
                $intNumToppings = 0;
                foreach($arrCurrentToppings as $arrTopping)
                {
                    $strArrayToString = implode("|",$arrTopping);
                    echo "<input type='hidden' name='transTopping".$intNumToppings."' value='$strArrayToString' />";
                    $intNumToppings++;
                    echo $strArrayToString."<br>";
                }
                echo "<input type='hidden' name='transNumToppings' value='".$intNumToppings."' />";
            }
            else
            {                
                echo "<input type='hidden' name='transNumToppings' value='0' />";
            }
            ?>
        </form>
        
    </body>
</html>
