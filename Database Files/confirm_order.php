<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="form8.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

  <div class="center">
  <div class="form-style-8">
  <h2> Confirm Order </h2>

  <?php
  require_once('db_setup.php');
  $sql = "USE akuo2_1;";
  if ($conn->query($sql) === TRUE) {
     // echo "using Database tbiswas2_company";
  } else {
     echo "Error using  database: " . $conn->error;
  }

  ?>

<?php
$Quantity = $_POST['Quantity'];
$Instructions = $_POST['Instructions'];
$CardNum = $_POST['CardNum'];
$CVV = $_POST['CVV'];
$ExpirationDate = $_POST['ExpirationDate'];
$ItemID = $_POST['ItemName'];
$sess = $_SESSION['UserID'];

  $Price = "SELECT Price FROM Item WHERE Item.ItemID = $ItemID";
  $result3 = $conn->query($Price);
  if ($result3->num_rows>0) {
      while($row = $result3->fetch_assoc())
        {
          $Price2 = $row['Price'];
          $TotalPrice = $Price2*$Quantity;
        }
    }
?>


  <form  method="post">
    Quantity: <input type="text" name="Quantity" readonly=true value="<?php echo $Quantity; ?>">
    Instructions: <input type="text" name="Instructions" readonly=true value="<?php echo $Instructions; ?>">
    CardNum: <input type="text" name="CardNum" readonly=true value="<?php echo $CardNum; ?>">
    CVV: <input type="text" name="CVV" readonly=true value="<?php echo $CVV; ?>">
    ExpirationDate: <input type="text" name="ExpirationDate" readonly=true value="<?php echo $ExpirationDate; ?>">
 </form>

 <?php
if (isset($_REQUEST['SubmitOrder']))
{
$sql2 = "INSERT INTO OrderInfo (TimePlaced,Quantity, Instructions, TotalPrice, CardNum, CVV, ExpirationDate,UserID,ItemID) values
(now(), $Quantity, '$Instructions', $TotalPrice, $CardNum, $CVV, $ExpirationDate, $sess, $ItemID); ";
$result = $conn->query($sql2);
if ($result === TRUE) {
    echo "Order placed successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
}
?>
<br>
<a href="LandingPageUser.php">Back</a>

</div>
</div>

<?php
$conn->close();
?>

</body>
</html>
