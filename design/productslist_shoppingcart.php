<?php
session_start();
//require_once("dbcontroller.php");
include_once 'connection.php';
//$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			//$productByCode = $db_handle->runQuery("SELECT * FROM products");
            $productByCode = mysqli_query($con,"SELECT * FROM products");
            if (mysqli_num_rows($productByCode) == 0) {
                echo "There are no products in the database.";
            } else {
                $itemArray = array($productByCode[0]["sku"]=>array('name'=>$productByCode[0]["name"], 'sku'=>$productByCode[0]["sku"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
                
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["sku"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["sku"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
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
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
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

        <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
        <?php
        if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">SKU</th>
                <th style="text-align:right" width="5%">Quantity</th>
                <th style="text-align:right" width="10%">Unit</th>
                <th style="text-align:right" width="10%">Price</th>
                <th style="text-align:center" width="5%">Remove</th>
            </tr>

        <?php
            foreach ($_SESSION["cart_item"] as $item){
                $cost = $item["quantity"]*$item["price"];
                ?>
                    <tr>
                        <td><img src="<?php echo $item["image"];?>"/></td> 
                        <td><?php echo $item["sku"]; ?></td>
                        <td style="text-align:right;"> <?php echo $item["quantity"]; ?></td>
                        <td style="text-align:right;"> <?php echo "$ ".$item["price"]; ?></td>
                        <td style="text-align:right;"><?php echo "$ ".number_format($item_price,2);?></td>
                        <td style="text-align:center;"><a href="index.php?action=remove&sku=<?php echo $item["sku"]; ?>" class="btnRemoveAction"><img src="images/icon-delet.png" alt="Remove Item"/></a></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_cost += ($item["quantity"]*$item["price"]);
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
                $result = mysqli_query($con,"SELECT * FROM products ORDER BY id ASC");
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="product-item">
                            <form method="post" action="index.php?action=add&sku=<?php echo $row["sku"];?>">
                                <div class="product-image"><img src="<?php echo $row["image"]; ?>"></div>
                                <div class="product-tile-footer">
                                <div class="product-title"><?php echo $row["name"]; ?></div>
                                <div class="product-price"><?php echo "$".$row["price"]; ?></div>
                                <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2"><input type="submit" value="Add to Cart" class="btnAddAction"></div>
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
