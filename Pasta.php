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
        <style>
ul {
    list-style-type: none;
    margin: 0;
    
    padding-top: 20px;
/*    padding-left: 280px;*/
    overflow: hidden;
    background-color: #333;
}

.logo{
    padding:0;
    float:left;
    
}
.logo:hover{
    background-color: #111;
}

li {
    float: left;
    margin-top:5%;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding-top:20px;
    padding-bottom:0;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #111;
}

div{
    width: 250px;
    height: 640px;
    display: table-cell;
    background-color: #333;
    margin-top: 10px;
    margin-right: 10px;
    
    float: left;
}
.nav{
    
}

.content{
    margin-left: 10px;
    width: 987px;
    float: right;
}
table, tr, td{
    width: 881px;
    height: 272px;
    margin-top: 10px;
/*    margin-left: 10px;*/
    padding: 5px;
    border-spacing: 20px;
    background-color: #333;
    border: 1px solid black;
    
}
        </style>
    </head>
    <body>
        <ul>
            <a href="">
            <img src="images/logo.png" alt="Logo" float="left" width="230" class="logo">
            </a>
            
            
            <li style=""><a href="">Home</a></li>
            <li><a href="">Pizza</a></li>
            <li><a href="Pasta.php">Pasta</a></li>
            <li><a href="Sides.php">Sides</a></li>
            <li><a href="">Locations</a></li>
            <li><a href="">Cart</a></li>
            
        </ul>
        <div>
            <a href="">Special #1</a>
            <br>
            <a href="">Special #2</a>
            <br>
            <a href="">Special #3</a>
            <br>
            <a href="">Special #4</a>
            <br>
            <a href="">Special #5</a>
        </div>
<!--        <div class="content" style="background-color: #333">-->
            <table>
                <tr>
                    <td><a href="" >Fettuccine</a></td> 
                    <td><a href="" >Farfalle</a></td> 
                </tr>
                <tr>
                    <td><a href="" >Penne</a></td> 
                    <td><a href="" >Rigatoni</a></td> 
                </tr>
            </table>
        <!--</div>-->
        <?php
        // put your code here
        ?>
        </header
    </body>
</html>
