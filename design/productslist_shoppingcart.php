<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
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
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right" width="5%">Quantity</th>
                <th style="text-align:right" width="10%">Unit</th>
                <th style="text-align:right" width="10%">Price</th>
                <th style="text-align:center" width="5%">Remove</th>
            </tr>

        <?php
            if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
            }

            foreach ($_SESSION["cart_item"] as $item){
                $cost = $item["quantity"]*$item["price"];
                ?>
                    <tr>
                        <td><img src="<?php echo $item["image"];?>"/></td> 
                        <td><?php echo $item["code"]; ?></td>
                        <td style="text-align:right;"> <?php echo $item["quantity"]; ?></td>
                        <td style="text-align:right;"> <?php echo "$ ".$item["price"]; ?></td>
                        <td style="text-align:right;"><?php echo "$ ".number_format($item_price,2);?></td>
                        <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delet.png" alt="Remove Item"/></a></td>
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

        <div id="product-grid">
            <div class="txt-heading">Products We Offer</div>
            <?php
                $product_list = $db_handle->runQuery("SELECT * FROM products OREDER BY id ASC");
                if (!empty($product_list)){
                    foreach($product_list as $key=>$value){
                ?>
                    <div class="product-item">
                        <form method="post" action="index.php?action=add&sku=<?php echo $product_list[$key]["sku"];?>">
                        <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
                        <div class="product-tile-footer">
                        <div class="product-title"></div><?php echo $product_array[$key]["name"]; ?></div>
                        <div class="product-price"></div><?php echo "$".$product_array[$key]["price"]; ?></div>
                        <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2"><input type="submit" value="Add to Cart" class="btnAddAction"></div>
                    </div>
                <?php
                    }
                }
                ?>
        </div>
    </body>
</html>
