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
    <form>
        <div class="sidenav">
          <a href="admin_add_item.html">Add an Item</a>
          <a href="AddItemLocation.php">Add an Item Location</a>
          <a href="InsertLocation.php">Add a location</a>
          <a href="LandingPageAdmin.php">View All orders</a>
          <a href="view_items.php">View All Items</a>

        </div>

        <div class="main">
            <label> Enter Location</label>
            <input id="txtLoction" name="txtLoction" required />
            <input type="submit" value="Submit" name="submitDetails" />
            <?php
            require_once('db_setup.php');
            $sql = "USE akuo2_1;";

            if ($conn->query($sql) === TRUE) {
                // echo "using Database tbiswas2_company";
            } else {
                echo "Error using  database: " . $conn->error;
            }
            if(isset($_REQUEST['submitDetails']))
            {

                $location = $_REQUEST['txtLoction'];
                $sql = "INSERT INTO Location (LocationName) VALUES ('$location')";
                $result = $conn->query($sql);
                if ($result === TRUE) {
                    echo "Location inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $sql = "select LocationName from Location";
            $result = $conn->query($sql);
            if($result->num_rows > 0){

            ?>
            <table border="1" class="table table-striped">
                <tr>
                    <th>Location Name</th>


                </tr>
                <?php
                while($row = $result->fetch_assoc()){
                ?>
                <tr>
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
            $conn->close();
            ?>
        </div>
    </form>
</body>
</html>
