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
  <form action="confirm_order.php" method="post">
  <div class="center">
  <div class="form-style-8">
  <h2> Place Order </h2>

  <?php
  require_once('db_setup.php');
  $sql = "USE akuo2_1;";
  if ($conn->query($sql) === TRUE) {
     // echo "using Database tbiswas2_company";
  } else {
     echo "Error using  database: " . $conn->error;
  }
  $sql = "SELECT ItemName, ItemID FROM Item;";
  $result = $conn->query($sql);
  echo "<select name='ItemName'>";
while($row = $result->fetch_assoc()){
      echo "<option value='" . $row['ItemID'] ."'>" . $row['ItemName'] ."</option>";
  }
  echo "</select>";

$sess = $_SESSION["UserID"];
  ?>
   Quantity:  <input type="text" name="Quantity" required><br>
   Instructions:  <input type="text" name="Instructions" required><br>
   CardNum:  <input type="text" name="CardNum" required><br>
   CVV:  <input type="text" name="CVV" required><br>
   ExpirationDate:  <input type="text" name="ExpirationDate" required><br>
   <input type="submit" name="SubmitOrder">


 </div>
 </div>
</form>



<?php
$conn->close();
?>

</body>
</html>
