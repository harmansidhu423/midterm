<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Inventory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css"
    <!-- Optional theme -->
    <link rel="stylesheet" href=CSS/bootstrap-theme.min.css

</head>
<body>
<main class="container">

    <h1>Car Inventory</h1>


    <form action="save_file.php" method="post">

    <fieldset class="form-group">
        <label for="manufacturer" class="col-sm-1">manufacturer: *</label>
        <select name="manufacturer" id="manufacturer">
            <?php
            //Step 1 - connect to the DB
            $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Step 2 - create a SQL script
            $sql = "SELECT * FROM manufacturers";
            //Step 3 - prepare and execute the SQL script
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $manufacturers = $cmd->fetchAll();
            //Step 4 - display the results
            foreach($manufacturers as $manufacturer)
            {


                    echo '<option>'.$manufacturer['manufacturer'].'</option>';

            }
            //Step 5 - disconnect from the DB
            $conn=null;
            ?>
    </select>
    </fieldset>

    <button class="btn btn-success col-sm-offset-1">Submit</button>




</main>
</body>
<script src="JS/bootstrap.min.js" ></script>

</html>