<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE akuo2_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$sql = "SELECT * FROM Item";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
        <th>Item Name</th>
        <th>Serving Size (g)</th>
        <th>QuantityInStock</th>
        <th>Calories</th>
        <th>Total Fat (g)</th>
        <th>TransFat (g)</th>
        <th>Cholesterol (mg)</th>
        <th>Sodium (mg)</th>
        <th>Total Carbs (g)</th>
        <th>Fiber (g)</th>
        <th>Sugar (g)</th>
        <th>Protein (g)</th>
        <th>Vegan</th>
        <th>Vegetarian</th>
        <th>Halal</th>
        <th>Kosher</th>
        <th>International</th>
        <th>Price</th>
        <th>ItemID</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
        <td><?php echo $row['ItemName']?></td>
        <td><?php echo $row['ServingSize']?></td>
        <td><?php echo $row['QuantityInStock']?></td>
        <td><?php echo $row['Calories']?></td>
        <td><?php echo $row['TotalFat']?></td>
        <td><?php echo $row['TransFat']?></td>
        <td><?php echo $row['Cholesterol']?></td>
        <td><?php echo $row['Sodium']?></td>
        <td><?php echo $row['TotalCarbs']?></td>
        <td><?php echo $row['Fiber']?></td>
        <td><?php echo $row['Sugar']?></td>
        <td><?php echo $row['Protein']?></td>
        <td><?php echo $row['Vegan']?></td>
        <td><?php echo $row['Vegetarian']?></td>
        <td><?php echo $row['Halal']?></td>
        <td><?php echo $row['Kosher']?></td>
        <td><?php echo $row['International']?></td>
        <td><?php echo $row['Price']?></td>
        <td><?php echo $row['ItemID']?></td>
      </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>

</body>
</html>
