<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manufacturer</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="CSS/bootstrap-theme.min.css">
</head>
<body>
<?php
$make= $_POST['manufacturer'];
echo $make.'\'s inventory';
?>

<a href="details.php">Select another car manufacturer</a>
<?php
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358428', 'gc200358428', 'j5SmXe7bDI' );
$sql = "SELECT * FROM cars WHERE make=:make";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':make', $make, PDO::PARAM_STR,30);
$cmd->execute();
$manufacturers = $cmd->fetchALL();
$conn =null;
echo '<table class="table table-striped table-hover">
            <tr><th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Colour</th>
                <th>Milage</th></tr>';
foreach($manufacturers as $manufacturer) {
    echo '<tr><td>' . $manufacturer['year'] . '</td>
                      <td>' . $manufacturer['make'] . '</td>
                      <td>' . $manufacturer['model'] . '</td>
                      <td>' . $manufacturer['colour'] . '</td>
                      <td>' . $manufacturer['milage'] . '</td></tr>';
}
echo '</table>';

?>

</body>
<!--latest jQUERY-->
<script src="JS/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="JS/bootstrap.min.js"></script>
</html>