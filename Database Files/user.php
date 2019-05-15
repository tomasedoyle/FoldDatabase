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
$sql = "SELECT * FROM USER";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
        <th>UserID</th>
        <th>Username</th>
        <th>Password</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Streetaddress</th>
        <th>ResidenceHall</th>
        <th>City</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
        <td><?php echo $row['UserID']?></td>
        <td><?php echo $row['Username']?></td>
        <td><?php echo $row['Password']?></td>
        <td><?php echo $row['FirstName']?></td>
        <td><?php echo $row['LastName']?></td>
        <td><?php echo $row['Email']?></td>
        <td><?php echo $row['Streetaddress']?></td>
        <td><?php echo $row['ResidenceHall']?></td>
        <td><?php echo $row['City']?></td>
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
