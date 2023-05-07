<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome!</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">-->
	</head>
	<?php
		$_SESSION["cart_item"] = [];
	?>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>TaskHub</h1>
				<a href="#"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="reviewsList.php"><i class="fas fa-user-circle"></i>Reviews List</a>
				<a href="productslist_shoppingcart.php"><i class="fas fa-user-circle">ProductsList/ShoppingCart</i></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	</body>
	<div class="content">
        <h2>Welcome back!</h2>
        <div>
            <p>Listed below are some of the perks of shopping with GameSpot:</p>
            <table>
                <tr>
                    <td>Buy products online!</td>
					<!--<td>This website allows users to create, assign, view,  modify, and delete tasks that pertain to projects such as those for industry professionals completing a work project.</td>-->
					<td>GameSpot now has a state-of-the-art Shopping Cart feature for shopping for GameSpot products. You can shop for electronics and video games, all online! The experience of shopping with GameSpot, now online.</td>
				</tr>
				<tr>
					<td>Some of the best prices in town:</td>
					<td>We offer great prices on all of our products and have specials that run once a month. Shop with GameSpot today!</td>
                </tr>
				<tr>
					<td>Great Customer Service</td>
					<td>We offer great customer service - both in-person and over the phone. On the Reviews List page of our website you can create a review to share your experience shopping from GameSpot. SHare what we did well, or what we can work on. We will get to your comments right away!</td>
				</tr>
            </table>
        </div>
    </div>
</html>
