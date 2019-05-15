
<!DOCTYPE html>
<html>
<head>
    <title>New User Form</title>
    <meta charset="utf-8" />
</head>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        border-style: none;
        border-color: inherit;
        border-width: medium;
        width: 14%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border-radius: 4px;
        cursor: pointer;
    }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>
	<form method="post">
		<div>

			<table width="100%" border="0">
				<tr>
					<td width="30%" align="right"></td>
					<td width="70%">
						<label>New User Form</label>
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter UserName</label>
					</td>
					<td width="70%">
						<input name="UserName" id="UserName" required />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter Password</label>
					</td>
					<td width="70%">
						<input name="Password" id="Password" required/>
					</td>
				</tr>

				<tr>
					<td width="30%" align="right">
						<label>Enter First Name</label>
					</td>
					<td width="70%">
						<input name="fname" id="fname" required />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter Last Name</label>
					</td>
					<td width="70%">
						<input name="lname" id="lname" required />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter Email</label>
					</td>
					<td width="70%">
						<input name="mail" id="mail" required />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter StreetAddress</label>
					</td>
					<td width="70%">
						<input name="saddress" id="saddress" />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter Residence Hall</label>
					</td>
					<td width="70%">
						<input name="rhall" id="rhall" />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right">
						<label>Enter City</label>
					</td>
					<td width="70%">
						<input name="City" id="City" />
					</td>
				</tr>
				<tr>
					<td width="30%" align="right"></td>
					<td width="70%">
						<input type="submit" value="Submit" name="submitDetails" />
					</td>
				</tr>
			</table>
		</div>
		<?php

		require_once('db_setup.php');

    if(isset($_REQUEST['submitDetails']))
    {
		$sql = "USE akuo2_1;";
		if ($conn->query($sql) === TRUE) {
			// echo "using Database tbiswas2_company";
		} else {
			echo "Error using  database: " . $conn->error;
		}
        $userName = $_POST['UserName'];
		$Password = $_POST['Password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mail = $_POST['mail'];
		$saddress = $_POST['saddress'];
		$rhall = $_POST['rhall'];
		$City = $_POST['City'];
		$userID=2;
		$userType='User';
		$sql = "INSERT INTO USER (Username ,Password , Firstname ,Email , Streetaddress, Residencehall ,UserType , City) VALUES ('$userName', '$Password','$fname','$mail','$saddress','$rhall','$userType','$City')";
		$result = $conn->query($sql);
		if ($result === TRUE) {
			echo "record inserted successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
        ?>

		<?php
		$conn->close();
        ?>
		</form>
</body>
</html>
