<div id="product-grid">
    <div class="txt-heading">Products We Offer</div>
    <?php
        $product_list = $db_handle->runQuery("SELECT * FROM products OREDER BY id ASC");
        if (!empty($product_list)){
            foreach($product_list as $key=>$value){
        ?>
            <div class="product-item">
                <form method="post" action="index.php?action=add&sku=<?php echo $product_list[$key]["sku"];?>">
                <div class="product-image"></div><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
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
