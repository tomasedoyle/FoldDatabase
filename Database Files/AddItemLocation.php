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
    <?php
    require_once('db_setup.php');
    $sql = "USE akuo2_1;";
    if ($conn->query($sql) === TRUE) {
        // echo "using Database tbiswas2_company";
    } else {
        echo "Error using  database: " . $conn->error;
    }
    $sql = "select ItemID, ItemName from Item";
    $result = $conn->query($sql);
    $sql1 = "select LocationID, LocationName from Location";
    $result1 = $conn->query($sql1);
    $sql3 = "select Item.ItemName,Location.LocationName  from ItemLocation , Item , Location where ItemLocation.ItemID=Item.ItemID and ItemLocation.LocationID=Location.LocationID";
    $result3 = $conn->query($sql3);
    ?>




        <div class="sidenav">
          <a href="admin_add_item.html">Add an Item</a>
          <a href="AddItemLocation.php">Add an Item Location</a>
          <a href="InsertLocation.php">Add a location</a>
          <a href="LandingPageAdmin.php">View All orders</a>
          <a href="view_items.php">View All Items</a>
        </div>
        <div class="main">
            <label>Select Item and corresponding Location below and click Submit</label>
            <form  method="post">
                <select id="ddlItem" name="ddlItem">
                    <?php
                while ($row = $result->fetch_assoc())
                {
                    echo '<option value="'.$row['ItemID'].'">'.$row['ItemName'].'</option>';
                }
                    ?>
                </select>
                <select id="ddlLocation" name="ddlLocation">
                    <?php
                while ($row = $result1->fetch_assoc())
                {
                    echo '<option value="'.$row['LocationID'].'">'.$row['LocationName'].'</option>';
                }
                    ?>
                </select>
                <input type="submit" value="Submit" name="submitDetails" />
                </form>
                <?php
            if($result3->num_rows > 0){
                ?>
                <table border="1" class="table table-striped">
                    <tr>
                        <th>Item Name</th>
                        <th>Location Name</th>


                    </tr>
                    <?php
    while($row = $result3->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['ItemName']?>
                        </td>
                        <td>
                            <?php echo $row['LocationName']?>
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

    if(isset($_REQUEST['submitDetails']))
    {
        $itemID= $_POST['ddlItem'];
        $LocationID= $_POST['ddlLocation'];
        $sql4 = "INSERT INTO ItemLocation (ItemID ,LocationID) VALUES ($itemID, $LocationID)";
		$result4 = $conn->query($sql4);
		if ($result4 === TRUE) {
			echo "record inserted successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

    }
            ?>
                <?php
            $conn->close();
                ?>


</div>

</body>
</html>
