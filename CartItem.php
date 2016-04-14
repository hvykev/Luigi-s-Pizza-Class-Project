<?php 

    
    
    class CartItem
    {
       private $strType;
       private $intDBID;
       private $arrToppings;
       protected $dbMaster;
       
       public function __construct()
       {           
           $this->ConnectDB();
       }
       
       public static function NewPizza($intPizzaBaseIn, $arrToppingsIn)
       {
            $instance = new self();
            $instance->strType = "Pizza";
            $instance->intDBID = $intPizzaBaseIn;
            $instance->arrToppings = $arrToppingsIn;
                        
            return $instance;
       }
       public static function NewSide($intSideIDIn)
       {
            $instance = new self();
            $instance->strType = "Side";
            $instance->intDBID = $intSideIDIn;
            
            return $instance;
       }
       
       public function ConnectDB()
       {
           $this->dbMaster = mysqli_connect("localhost","root","")
                or die("Failure to connect to database: " . mysqli_error());
            mysqli_select_db($this->dbMaster, "luigipizzadb")
                or die("Could not find database: ".mysqli_error());
       }
       
       public function getPrice()
       {          
           
           $floPricePlaceholder = 0;           
           $strTableName = "";
           if($this->strType == "Pizza")
           {
               $strTableName = "pizza_bases";
           }
           elseif($this->strType == "Side")
           {
               $strTableName = "sides";
           }
           
           $dbTemp = mysqli_query($this->dbMaster, "SELECT Price FROM ".$strTableName." WHERE ID = ".$this->intDBID)
                   or die("Table read error: ".mysqli_error());
           while($arrRetrieved = mysqli_fetch_assoc($dbTemp))
           {
               $floPricePlaceholder += floatval($arrRetrieved['Price']);
           }
           if($this->strType == "Pizza")
           {
                $dbTemp = mysqli_query($this->dbMaster, "SELECT Price, ID FROM toppings")
                   or die("Table read error: ".mysqli_error());    
                while($arrRetrieved = mysqli_fetch_assoc($dbTemp))
                {
                    if(in_array($arrRetrieved['ID'], $this->arrToppings))
                    {
                        $floPricePlaceholder += floatval($arrRetrieved['Price']);
                    }
                }
           }
            return $floPricePlaceholder;
       }
       public function displayItem()
       {
               
           if($this->strType == "Pizza")
           {
                $dbTemp = mysqli_query($this->dbMaster, "SELECT SIZE, CRUST FROM pizza_bases WHERE ID = ".$this->intDBID)
                    or die("Table read error: ".mysqli_error());  
               
                while($arrRetrieved = mysqli_fetch_assoc($dbTemp))
                {
                    echo "This is a ";
                    echo strtolower($arrRetrieved['SIZE']);
                    echo " ";
                    echo strtolower($arrRetrieved['CRUST']);
                    echo " pizza";
                    if(count($this->arrToppings) > 0)
                    {
                        echo " with ";
                    }
                    else
                    {                        
                        echo ", ";
                    }
                }
                $dbTemp = mysqli_query($this->dbMaster, "SELECT Name, ID FROM toppings")
                    or die("Table read error: ".mysqli_error());
                $intAndCounter = count($this->arrToppings);
                while($arrRetrieved = mysqli_fetch_assoc($dbTemp))
                {
                    if(in_array($arrRetrieved['ID'], $this->arrToppings))
                    {
                        echo $arrRetrieved['Name'];
                        $intAndCounter--;
                        if($intAndCounter == 1)
                        {
                            echo " and ";
                        }
                        else
                        {
                            echo ", ";
                        }
                    }
                }
           }
           elseif($this->strType == "Side")
           {
               $dbTemp = mysqli_query($this->dbMaster, "SELECT Name FROM sides WHERE ID = ".$this->intDBID)
                    or die("Table read error: ".mysqli_error());  
               
                while($arrRetrieved = mysqli_fetch_assoc($dbTemp))
                {
                    echo "This is a ";
                    echo $arrRetrieved['Name'];
                    echo ", ";
                }
           }
           
           echo "and it costs ".$this->getPrice().".";
       }
    }
?>