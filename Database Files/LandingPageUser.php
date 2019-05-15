<?php
session_start();
?>
<!DOCTYPE html>
<html>
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
<body>

	<div class="sidenav">
        <a href="LandingPageUser.php">View All orders</a>
				<a href="place_order.php">Place A New Order</a>
				<a href="modify_preference.php">Add Preferences</a>
				<a href="view_items_user.php">View All Items</a>
	</div>

	<div class="main">
        <?php

		require_once('db_setup.php');

		$sql = "USE akuo2_1;";
		//$_SESSION["username"] = $userName
		$userID=$_SESSION["UserID"];


		if ($conn->query($sql) === TRUE) {
			// echo "using Database tbiswas2_company";
		} else {
			echo "Error using  database: " . $conn->error;
		}

		//$sql = "select OrderInfo.ItemID, OrderInfo.Intructions,Item.ItemName, OrderInfo.Quantity,OrderInfo.TotalPrice,OrderInfo.TimePlaced from OrderInfo join Item on OrderInfo.ItemID=Item.ItemID where OrderInfo.UserID = '$userID'";
        $sql = "select OrderInfo.ItemID, OrderInfo.Instructions,Item.ItemName, OrderInfo.Quantity,OrderInfo.TotalPrice,OrderInfo.TimePlaced from OrderInfo join Item on OrderInfo.ItemID=Item.ItemID where OrderInfo.UserID = $userID";
		$result = $conn->query($sql);
		if($result->num_rows > 0){

        ?>
		<table border="1" class="table table-striped">
			<tr>
				<th>Order Instructions</th>
				<th>Quantity</th>
				<th>Order Price</th>
				<th>Item Name</th>
				<th>Order Date</th>
                <th>View Details</th>

			</tr>
			<?php
			while($row = $result->fetch_assoc()){
            ?>
			<tr>
				<td>
					<?php echo $row['Instructions']?>
				</td>
				<td>
					<?php echo $row['Quantity']?>
				</td>
				<td>
					<?php echo $row['TotalPrice']?>
				</td>
				<td>
					<?php echo $row['ItemName']?>
				</td>
				<td>
					<?php echo $row['TimePlaced']?>
				</td>
                <td>
                    <input type='button' value='View Details' class="btn" onclick="document.location.href = 'ViewOrderItemDetails.php?id=<?php echo $row['ItemID'] ?>';" />
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

		<?php
		$conn->close();
        ?>
	</div>
</body>
</html>
