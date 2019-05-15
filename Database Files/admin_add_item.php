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
$ItemName = $_POST['ItemName'];
$ServingSize = $_POST['ServingSize'];
$QuantityInStock = $_POST['QuantityInStock'];
$Calories = $_POST['Calories'];
$TotalFat = $_POST['TotalFat'];
$TransFat = $_POST['TransFat'];
$Cholesterol = $_POST['Cholesterol'];
$Sodium = $_POST['Sodium'];
$TotalCarbs = $_POST['TotalCarbs'];
$Fiber = $_POST['Fiber'];
$Sugar = $_POST['Sugar'];
$Protein = $_POST['Protein'];
if(isset($_POST['Vegan'])){
    $Vegan = 1;
}
else{
    $Vegan=0;
}
if(isset($_POST['Vegetarian'])){
    $Vegetarian = 1;
}
else{
    $Vegetarian=0;
}
if(isset($_POST['Halal'])){
    $Halal = 1;
}
else{
    $Halal=0;
}
if(isset($_POST['Kosher'])){
    $Kosher = 1;
}
else{
    $Kosher=0;
}
if(isset($_POST['International'])){
    $International = 1;
}
else{
    $International=0;
}
$Price = $_POST['Price'];
$ItemID = $_POST['ItemID'];
$sql = "INSERT INTO Item (ItemName,Servingsize,QuantityInStock,Calories, TotalFat, TransFat, Cholesterol, Sodium, TotalCarbs, Fiber, Sugar, Protein, Vegan, Vegetarian, Halal, Kosher, International, Price)values ('$ItemName', $ServingSize, $QuantityInStock, $Calories, $TotalFat, $TransFat, $Cholesterol, $Sodium, $TotalCarbs, $Fiber, $Sugar, $Protein,
$Vegan, $Vegetarian, $Halal, $Kosher, $International, $Price);";


#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Item added.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
<a href="LandingPageAdmin.php">Back</a>
<?php
$conn->close();
?>

</body>
</html>
