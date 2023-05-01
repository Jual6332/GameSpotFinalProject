<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome!</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
            <p>Listed below are the many benefits of TaskHub:</p>
            <table>
                <tr>
                    <td>Easy of communication:</td>
					<!--<td>This website allows users to create, assign, view,  modify, and delete tasks that pertain to projects such as those for industry professionals completing a work project.</td>-->
					<td>Users can assign tasks to other coworkers which allows for increase communication between workers. Task descriptions and task assignment grades communicate a standard message of performance in a team environment. This makes life easier for assessing raises and bonuses which are always based on recorded performance.</td>
				</tr>
				<tr>
					<td>Robust front-end:</td>
					<td>Bootstrap is a front-end framework being utilized in the TaskHub project which allows for sleek buttons, consistent color schemes, and other asthetic features for web development. </td>
                </tr>
                <!--
                <tr>
                    <td>Password:</td>
                    <td><?//=$password?></td>
                </tr>-->
            </table>
        </div>
    </div>
</html>
