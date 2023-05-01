<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$addedItem = [
    "name" => "",
    "image" => "",
    "sku" => "",
    "price" => 0,
    "quantity" => 0,
];
require_once 'connection.php';
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			//$productByCode = $db_handle->runQuery("SELECT * FROM products");
            $result = mysqli_query($con,"SELECT * FROM products");
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    if($row["sku"] == $_GET["sku"]) {
                        /*if(empty($_SESSION["cart_item"]["quantity"])) {
                            $_SESSION["cart_item"]["quantity"] = 0;
                        }*/
                        $cart_item = [
                            "name" => $row["price"],
                            "image" => $row["image"],
                            "sku" => $row["sku"],
                            "price" => $row["price"],
                            "quantity" => $_POST["quantity"],
                        ];
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$cart_item);
                        //$_SESSION["cart_item"]["name"] = $row["name"];
                        //$_SESSION["cart_item"]["image"] = $row["image"];
                        //$_SESSION["cart_item"]["sku"] = $row["sku"];
                        //$_SESSION["cart_item"]["price"] = $row["price"];
                        //$_SESSION["cart_item"]["quantity"] += $_POST["quantity"];
                    }
                }
            }
        }
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["sku"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
        $_SESSION["cart_item"] = [];
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
        $_SESSION["cart_item"] = [];
	break;	
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<!-- Title Heading -->
		<title>Products List and Shopping Cart</title>
		<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">-->
		<link href="productslist_shoppingcartstyle.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>

        <a id="btnEmpty" href="productslist_shoppingcart.php?action=empty">Empty Cart</a>
        <?php
        if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_cost = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">SKU</th>
                <th style="text-align:right" width="5%">Quantity</th>
                <th style="text-align:right" width="10%">Unit Price</th>
                <th style="text-align:right" width="10%">Total Cost</th>
                <th style="text-align:center" width="5%">Remove</th>
            </tr>

            <!--
            <tr>
                <td>
                    <?php
                    /*if ($_SESSION["cart_item"] != NULL){
                        echo $_SESSION["cart_item"]["sku"];
                    }*/
                    ?>
                </td>
            </tr>-->
            <?php
                $result = mysqli_query($con,"SELECT * FROM shoppingcart");
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
            ?>
                        <tr>
                            <td><img src="<?php echo $row["image"];?>"/></td> 
                            <td><?php echo $row["sku"]; ?></td>
                            <td style="text-align:right;"> <?php echo $row["quantity"]; ?></td>
                            <td style="text-align:right;"> <?php echo "$ ".$row["price"]; ?></td>
                            <td style="text-align:right;"><?php echo "$ ".number_format($row["quantity"]*$row["price"],2);?></td>
                            <td style="text-align:center;">
                                <a href="deleteProductFromShoppingCart.php?delete=<?php echo $row["name"]?>" class="btnRemoveAction">
                                    <img src="product-images/icon-delete.png" alt="Remove Item"/>
                                    <?php
                                    /*
                                        $_SESSION["removedItemName"] = $row["name"];
                                    */
                                    ?>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $total_quantity += $row["quantity"];
                        $total_cost += ($row["quantity"]*$row["price"]);
                    }
                }
            ?>

        <tr>
            <td colspan="2" align="right">Total:</td>
            <td align="right"><?php echo $total_quantity; ?></td>
            <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_cost,2); ?></strong></td>
        </tr>
        </tbody>
        </table>

        <?php 
        } else {
        ?>
        <div class="no-records">Your cart is empty.</div>
        <?php   
        }
        ?>
        </div>

        <div id="product-grid">
            <div class="txt-heading">Products We Offer</div>
            <?php
                $result = mysqli_query($con,"SELECT * FROM products");
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="product-item">
                            <form method="post" action="addProductToShoppingCart.php?name">
                                <div class="product-image">
                                    <img src="<?php echo $row["image"]; ?>">
                                </div>
                                <div class="product-tile-footer"></div>
                                <!--<div class="product-title">-->
                                    <input readonly type="text" name="productName" value="<?php echo $row["name"]; ?>"><br><br>
                                <!--</div>-->
                                <div class="product-price">
                                    <?php echo "$".$row["price"]; ?>
                                </div>
                                <div class="cart-action">
                                    <?php
                                    /*
                                        $addedItem = [
                                            "name" => $row["name"],
                                            "image" => $row["image"],
                                            "sku" => $row["sku"],
                                            "price" => $row["price"],
                                            "quantity" => 0,
                                        ];
                                        $_SESSION["addedItem"] = $addedItem;
                                        */
                                    ?>
                                    <input type="number" class="product-quantity" name="quantity" value="1" size="2">
                                    <input type="submit" value="Add to Cart" class="btnAddAction">
                                </div>
                            </form>
                        </div>
                <?php
                    }
                }
            ?>
        </div>
    </body>
</html>
