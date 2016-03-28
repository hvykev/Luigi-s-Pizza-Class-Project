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
    </head>
    <body style="background-color: slategray">
        <div style="text-align: center">[Nav Bar and Logo go here]</div>
        <br>
        <br>
        <br>
        <div style="border: thick solid white">
            <p style="text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;">
            Picture the Perfect Pie
            </p>
        </div>
        <br>
        <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post" id="selectorWrapperMain" style="overflow: hidden; position: relative; padding:20px;">
            <?php
                $pizzaCrust = "";
                $pizzaSauce = "";
                $pizzaSize = "";
                    if(isset($_POST["formSubmitButton"]))
                    {    
                        $pizzaCrust = $_POST["formCrustDropDown"];
                        $pizzaSauce = $_POST["formSauceDropDown"];
                        $pizzaSize = $_POST["formSizeDropDown"];                    
                        echo "<p>$pizzaCrust</p>";
                        echo "<p>$pizzaSauce</p>";
                        echo "<p>$pizzaSize</p>";
                    }
                ?>
            <div id="CrustSelector" style=" float:left;">
             <div id="CrustText" style=" border: thick solid white; width: 120px; padding-bottom: 5px; text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;">
                Crust                
             </div>
             <div>
                <select name="formCrustDropDown" style="width: 130px;">
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
            <div style="width: 30px; float:left; padding:2px;"></div>
             <div id="SauceSelector" style=" float:left;">
             <div id="SauceText" style=" border: thick solid white; width: 120px; padding-bottom: 5px; text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;">
                Sauce                
             </div>
             <div>
                <select name="formSauceDropDown" style="width: 130px;">
                    <option value="">Select...</option>
                    <option <?php if($pizzaSauce == "Non"){ echo "selected";} ?> value="Non">None</option>
                    <option <?php if($pizzaSauce == "Red"){ echo "selected";} ?> value="Red">Classic Red</option>
                    <option <?php if($pizzaSauce == "Alf"){ echo "selected";} ?> value="Alf">Alfredo</option>
                    <option <?php if($pizzaSauce == "Pes"){ echo "selected";} ?> value="Pes">Pesto</option>
                </select>
                 
                <?php
                ?>
             </div>
            </div>
            <div style="width: 30px; float:left; padding:2px;"></div>
             <div id="SizeSelector" style=" float:left;">
             <div id="SizeText" style=" border: thick solid white; width: 120px; padding-bottom: 5px; text-align: center; font-size: x-large; font-family:Comic Sans MS; font-weight: bold; color: white;">
                Size                
             </div>
             <div>
                <select name="formSizeDropDown" style="width: 130px;">
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
            <div>
            <input type="submit" name="formSubmitButton" value="Submit" />
                
            </div>
        </form>
        
    </body>
</html>
