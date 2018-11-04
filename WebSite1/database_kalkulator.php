<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HK/Kalkulator</title>
        <link href="StyleSheet.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <body>
        <div id="nav-placeholder">
        </div>

        <table style ="border:1" id ="table">
            <tr id="myRow">
                <td>Product</td>
                <td>Pris</td>
                <td>Remove</td>
            </tr>
            <tr id="total">
                <td>Total</td>
                <td>0.00</td>
                <td></td>
            </tr>
        </table>
        <script>
            $(function () {
                $("#nav-placeholder").load("https://raw.githubusercontent.com/h578011/Ing_Handlevogn-Kalkulatoren/master/WebSite1/nav.html");
            });

            var currentValue = 0;

            function setCurrentValue(arg){
                currentValue = arg;
            }

            function addToCart(){
                Cart.push(Products[currentValue]);
                //console.log(Cart[Cart.length-1].aBarcode);
                updateCart();
            }



            function updateCart(){
                var table = document.getElementById("table");

                for(var i = table.rows.length-1; i >=0 ; i--){
                    table.deleteRow(i);
                }
                var head = table.insertRow(0);
                head.insertCell(0).appendChild(document.createTextNode('Vare'));
                head.insertCell(1).appendChild(document.createTextNode('Pris'));
                head.insertCell(2).appendChild(document.createTextNode('Remove'));

                var totalPrice = 0;
                for(var i = 0; i < Cart.length ; i++){
                    var row = table.insertRow(i + 1);
                    row.insertCell(0).appendChild(document.createTextNode(Cart[i].aProductname));
                    row.insertCell(1).appendChild(document.createTextNode(Cart[i].aPrice));
                    var button = document.createElement("button");
                    button.innerHTML = "X";

                    button.setAttribute("onclick", "removeFromCart("+ i+")")

                    row.insertCell(2).appendChild(button);
                    totalPrice += Cart[i].aPrice;
                }

                var total = table.insertRow(table.rows.length);
                total.insertCell(0).appendChild(document.createTextNode('Total'));
                totalPrice = Math.round(totalPrice * 100) / 100;
                total.insertCell(1).appendChild(document.createTextNode( totalPrice +'kr'));
                total.insertCell(2).appendChild(document.createTextNode(''));

            }
            function removeFromCart (arg) {
                Cart.splice(arg,1);
                updateCart();
            }

            var Products = new Array();
            var Cart = new Array();

            function Product (aBarcode,aProductcompany,aProducttype,aProductname,aPrice) {
                this.aBarcode = aBarcode;
                this.aProductcompany = aProductcompany;
                this.aProducttype = aProducttype;
                this.aProductname = aProductname;
                this.aPrice = aPrice;
            }
        
        </script>
        <footer>&copy; 2018 Damanito</footer>

    </body>
</html>

<?php
    $file = "database.txt";

    $barcode = 0;
    $productcompany = 1;
    $producttype = 2;
    $productname = 3;
    $price = 4;

    function readFileLine($file, $line)
    {            
        return explode("\n", file_get_contents($file))[$line];
    }
    function getFileLineCount($file)
    {            
        return count(explode("\n", file_get_contents($file)));
    }


    class Product {
        public $aBarcode = 0;
        public $aProductcompany = 1;
        public $aProducttype = 2;
        public $aProductname = 3;
        public $aPrice = 4;

        function __construct ($aBarcode,$aProductcompany,$aProducttype,$aProductname,$aPrice ) {
            $this->aBarcode = $aBarcode;
            $this->aProductcompany = $aProductcompany;
            $this->aProducttype = $aProducttype;
            $this->aProductname =$aProductname;
            $this->aPrice =$aPrice;
        }
    }

    $products = array();

    $string = '<p>
    Add to Cart:
    <select onChange = "setCurrentValue(this.value);">';

    for($i= 0; $i < getFileLineCount($file);  $i++ )
    {
        $row = explode(",", readFileLine($file, $i));
        $temp = new Product($row[0],$row[1],$row[2],$row[3],$row[4]);
        $products[$i] = $temp;

        $string = $string.'<option value="'.$i.'">'.$products[$i]->aProductname.'</option>';

        
        echo('<script> Products.push(new Product('.$row[0].',"'.$row[1].'","'.$row[2].'","'.$row[3].'",'.$row[4].')); </script>');
    }

    
    $string = $string.'
    </select>
     </p>';

    echo($string);
    echo('<input  onclick = "addToCart()" value ="Add" id type="button"></button>');

?>
