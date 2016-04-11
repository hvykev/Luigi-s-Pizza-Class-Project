<?php 
    class CartItem
    {
       private $strType;
       private $intDBID;
       private $arrToppings;
       private $intPrice;
       
       public function __construct()
       {           
       }
       
       public static function NewPizza($intPizzaBaseIn, $arrToppingsIn)
       {
            $instance = new self();
            $instance->strType = "Pizza";
            $instance->intDBID = $intPizzaBaseIn;
            $instance->arrToppings = $arrToppingsIn;
            
            $instance->UpdatePrice();
            
            return $instance;
       }
       public static function NewSide($intSideIDIn)
       {
            $instance = new self();
            $instance->strType = "Side";
            $instance->intDBID = $intSideIDIn;
            
            $instance->UpdatePrice();
            
            return $instance;
       }
       
       public static function getPrice()
       {
           return $this->intPrice;
       }
       
       protected function UpdatePrice()
       {
           $intPricePlaceholder = 0;           
           $strTableName = "";
           $dbMaster = mysql_connect("localhost","root","") 
                   or die("Connection failure: " . mysql_error());
           if($this->strType == "Pizza")
           {
               $strTableName = "pizza bases";
           }
           elseif($this->strType == "Side")
           {
               $strTableName = "sides";
           }
           
           $dbTemp = mysql_query("SELECT Price FROM ".$strTableName." WHERE ID = ".$this->intDBID, $dbMaster)
                   or die("Table read error: ".mysql_error());
           while($arrRetrieved = mysql_fetch_array($dbTemp))
           {
               $intPricePlaceholder += intval($arrRetrieved['Price']);
           }
           if($this->strType == "Pizza")
           {
                $dbTemp = mysql_query("SELECT Price, ID FROM toppings", $dbMaster)
                   or die("Table read error: ".mysql_error());    
                while($arrRetrieved = mysql_fetch_array($dbTemp))
                {
                    if(in_array($arrRetrieved['ID'], $this->arrToppings))
                    {
                        $intPricePlaceholder += intval($arrRetrieved['Price']);
                    }
                }
           }
           $this->intPrice = $intPricePlaceholder;
       }
    }
?>