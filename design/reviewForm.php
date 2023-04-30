<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Review</title>
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
                    <h2 class="mt-5">Create Review</h2>
                    <p>Please fill this form and submit to add your review to the database.</p>
                    <form action="create2.php" method="post">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>The employee being reviewed</label>
                            <input type="text" name="employee" class="form-control <?php echo (!empty($employee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $employee; ?>">
                            <span class="invalid-feedback"><?php echo $taskee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Review Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Reason for Visit</label>
                            <input type="text" name="reason" class="form-control <?php echo (!empty($reason_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $reason; ?>">
                            <span class="invalid-feedback"><?php echo $reason_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Review Grade (out of 10)</label>
                            <input type="text" name="performance" class="form-control <?php echo (!empty($performance_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $performance; ?>">
                            <span class="invalid-feedback"><?php echo $performance_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="reviews_list.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
