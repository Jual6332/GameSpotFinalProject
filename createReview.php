<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Review Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Review Record</h2>
                    <p>Please fill this form and submit to add task record to the database.</p>
                    <form action="create2.php" method="post">
                        <div class="form-group">
                            <label>Review Title</label>
                            <input type="text" name="title" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo "Review Title"; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($taskee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo "Your name"; ?>">
                            <span class="invalid-feedback"><?php echo $taskee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Review Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo "Review Description"; ?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Review Type</label>
                            <input type="text" name="reviewType" class="form-control <?php echo (!empty($manager_err)) ? 'is-invalid' : ''; ?>" value="<?php echo "Review Type"; ?>">
                            <span class="invalid-feedback"><?php echo $manager_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rating (out of 10)</label>
                            <input type="text" name="rating" class="form-control <?php echo (!empty($performance_err)) ? 'is-invalid' : ''; ?>" value="<?php echo "Rating (out of 10)"; ?>">
                            <span class="invalid-feedback"><?php echo $performance_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="reviewsList.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>