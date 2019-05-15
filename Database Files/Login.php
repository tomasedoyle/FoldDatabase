<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Login Page</title>
    <style>
        /* Basics */
        html, body {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            font-family: "Helvetica Neue", Helvetica, sans-serif;
            background: #FFFFFF;
        }

        .logincontent {
            position: fixed;
            width: 350px;
            height: 300px;
            top: 50%;
            left: 50%;
            margin-top: -150px;
            margin-left: -175px;
            background: #07A8C3;
            padding-top: 10px;
        }

        .loginheading {
            border-bottom: solid 1px #ECF2F5;
            padding-left: 18px;
            padding-bottom: 10px;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            font-family: sans-serif;
        }

        label {
            color: #ffffff;
            display: inline-block;
            margin-left: 18px;
            padding-top: 10px;
            font-size: 15px;
        }

        input[type=text], input[type=password] {
            font-size: 14px;
            padding-left: 10px;
            margin: 10px;
            margin-top: 12px;
            margin-left: 18px;
            width: 300px;
            height: 35px;
            border: 1px solid #ccc;
            border-radius: 2px;
            box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f5f5;
            font-size: 14px;
        }

        input[type=checkbox] {
            margin-left: 18px;
            margin-top: 30px;
        }

        .loginremember {
            background: #ECF2F5;
            height: 70px;
            margin-top: 20px;
        }

        .check {
            font-family: sans-serif;
            position: relative;
            top: -2px;
            margin-left: 2px;
            padding: 0px;
            font-size: 12px;
            color: #321;
        }

        .loginbtn {
            float: right;
            margin-right: 20px;
            margin-top: 20px;
            padding: 6px 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #07A8C3;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#07A8C3), to(#6EE4E8));
            background-image: -moz-linear-gradient(top left 90deg, #07A8C3 0%, #6EE4E8 100%);
            background-image: linear-gradient(top left 90deg, #07A8C3 0%, #6EE4E8 100%);
            border-radius: 30px;
            border: 1px solid #07A8C3;
            cursor: pointer;
        }

            .loginbtn:hover {
                background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e2ff), to(#6ec2e8));
                background-image: -moz-linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
                background-image: linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
            }
        .test {
            color: red;
        }
    </style>
</head>
<body>
	<form method="post">
		<div class="logincontent">
			<div class="loginheading">
				Login
			</div>
			<label for="txtUserName">
				Username:
			</label>
			<input type="text" id="txtUserName" name="txtUserName" required/ />
			<label for="txtPassword">
				Password:
			</label>
			<input type="password" id="txtPassword" name="txtPassword" required />
			<div class="loginremember">
				<!--    <input type="checkbox" id="chbRemember" name="chbRemember" /><label class="check"
                    for="chbRemember">Remember me next time</label>-->
				<a href="InsertNewUser.php"> New User? Click here </a>

				<input type="submit" class="loginbtn" value="Login" id="btnSubmit" name="submitDetails" />


			</div>
		</div>
		</form>
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
		$userName = $_POST['txtUserName'];
		$Password = $_POST['txtPassword'];
		$sql = "SELECT * FROM USER where Username = '$userName' and Password='$Password' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$_SESSION["UserID"] =	$row['UserID'];
				$_SESSION["UserType"] =	$row['UserType'];
				$_SESSION["username"] = $userName;
				if($row['UserType']=='Admin')
				{
					echo'<script> window.location="LandingPageAdmin.php"; </script> ';
				}
				else
				{
					echo'<script> window.location="LandingPageUser.php"; </script> ';
				}
			}


		}
		else{

			echo'<script> alert("wrong username or password"); </script> ';
		}

	}
	?>
</body>
</html>
