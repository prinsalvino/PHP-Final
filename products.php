<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="styleproducts.css" rel="stylesheet" type="text/css">

</head>
<body onload="onLoad()">
	<?php
    session_start();
    include 'AutoLoaderIncl.php';
    $userController = new UserController();
    $user = $userController->getCurrentUser($_SESSION["email"]);	
    
	include "header.php";
	?>
 <div class="row">
        <div class="col1">

            <form id="allform" class = "NameInput" action="payment.php" method="POST">
                Name:   <input type="text" class = "inputName" name="Name" value="<?php echo $user->name;?>"><br>
                <br>


                Service: 		
                <select id = "selectboxProducts" name="selectboxProducts" class = "Adult" onchange = "selectingProductAlert()">
                    <option value="100">Build Website</option>
                    <option value="150">Build Application</option>
                </select>
            <br>
            <br>

                Email:   	<input type="text" class = "telenumber" name="email" value="<?php echo $user->email;?>" ><br>

            </br>
                Comments: <input type="text" class = "comments" name="comment" >
            </form>
        </div>

        <div class="col2">
            <div class = "Calculate">

                <p id = "priceProduct"> Product  {Product}   € {Price}</p>
                <br>
                <br>

              <p class = "TotalPrice" id = "totalPrice"> € {Price}</p>
            </div>

        </div>
        <input  type="submit" class = "submitbtn" form="allform" value="Add to Cart" name = "addTOcart">


    </div>

<?php
	include ("footer.php");
?>

<script>

    //can also just pass the value from the parameter
function calculateProdcuts() {
    var product = "";
    var selectBox = document.getElementById("selectboxProducts");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if (selectedValue == "100") {
         product = "Build Website";
    }
    else{
        product = "Build Application";
    }    
    document.getElementById("priceProduct").innerHTML = "Product:  " + product + " , € " + selectedValue;    
    document.getElementById("totalPrice").innerHTML = "Total Price: € " + selectedValue;

    return product;
}

function selectingProductAlert(){
    product = calculateProdcuts();
    alert("You chose " + product);
}

function onLoad(){
    calculateProdcuts();
}

</script>
</body>

</html>

<?php
session_start();
if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>