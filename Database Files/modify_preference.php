<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <style>
          /*body {
              font-family: "Lato", sans-serif;
          }*/

          .sidenav {
              height: 100%;
              width: 160px;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              padding-top: 20px;
          }

              .sidenav a {
                  padding: 6px 8px 6px 16px;
                  text-decoration: none;
                  font-size: 25px;
                  color: #818181;
                  display: block;
              }

                  .sidenav a:hover {
                      color: #f1f1f1;
                  }

          .main {
              margin-left: 160px; /* Same as the width of the sidenav */
              /* font-size: 28px;  Increased text to enable scrolling */
              padding: 0px 10px;
          }

          @media screen and (max-height: 450px) {
              .sidenav {
                  padding-top: 15px;
              }

                  .sidenav a {
                      font-size: 18px;
                  }
          }
      </style>
  </head>
</head>
<body>
  <div class="sidenav">
    <a href="LandingPageUser.php">View All orders</a>
    <a href="place_order.php">Place A New Order</a>
    <a href="modify_preference.php">Add Preferences</a>
    <a href="view_items_user.php">View All Items</a>
  </div>
  <div class="main">
      <label>Add preference</label>
  <form method="post">
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

$ItemID = $_POST['ItemName'];
// Query:
$sess = $_SESSION["UserID"];
$sql2 = "INSERT INTO Preference values ($sess,$ItemID);";
$sess = $_SESSION["UserID"];

#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql2);

if ($result === TRUE) {
    echo "Preference Added";
} else {

}
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
 <input type="submit" name="SubmitOrder">
 </form>
<?php
$sql = "select ItemName from Preference join Item on Preference.ItemID = Item.ItemID where UserID = $sess";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
<table border="1" class="table table-striped">
    <tr>
        <th>Preference</th>


    </tr>
    <?php
    while($row = $result->fetch_assoc()){
    ?>
    <tr>
        <td>
            <?php echo $row['ItemName']?>
        </td>


    </tr>

    <?php
    }
}
else {
    echo "Nothing to display";
}
    ?>

</table>



 </div>




<?php
$conn->close();
?>

</body>
</html>
