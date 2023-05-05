<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome!</title>
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
            .wrapper{
                width: 600px;
                margin: 0 auto;
            }
            table tr td:last-child{
                width: 120px;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </head>
    <?php
        include_once 'connection.php';
        $result = mysqli_query($con,"SELECT * FROM reviews");
        if (mysqli_num_rows($result) > 0) {
    ?>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>TaskHub</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="#"><i class="fas fa-user-circle"></i>Reviews List</a>
                <a href="productslist_shoppingcart.php"><i class="fas fa-user-circle">ProductsList/ShoppingCart</i></a>
				<a href="employee_roster.php"><i class="fas fa-user-circle"></i>Employee Roster</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	</body>
	<div class="content">
        <h2>Reviews List!</h2>
        <div class="mt-5 mb-3 clearfix">
            <h2 class="pull-left">Review Details</h2>
            <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
        
        <?php
        $i=0;
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        //echo "<th>#</th>";
        echo "<th>Title</th>";
        echo "<th>Reviewer's Name</th>";
        echo "<th>Description</th>";
        echo "<th>Review Tyoe</th>";
        echo "<th>Rating</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = mysqli_fetch_array($result)) {
            
        ?>
        
        <tr>
        <?php echo "<td>" . $row["title"] . "</td>"; ?>
        <?php echo "<td>" . $row["name"] . "</td>"; ?>
        <td><?php echo $row["description"]; ?></td>
        <td><?php echo $row["reviewType"]; ?></td>
        <td><?php echo $row["rating"]; ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
        </table>
        <?php
        }
        else{
        echo "No result found";
        }
        ?>
    </div>
    </div>
</html>
