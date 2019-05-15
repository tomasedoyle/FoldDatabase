
<html>
<body>

    <?php
    $itemiD=$_SERVER['QUERY_STRING'];
    parse_str($itemiD, $output);
    //echo $itemiD;
    $itemIDFinal=$output[id];
    require_once('db_setup.php');
    $sql = "USE akuo2_1;";
    if ($conn->query($sql) === TRUE) {
        // echo "using Database tbiswas2_company";
    } else {
        echo "Error using  database: " . $conn->error;
    }

    $sql = "select ItemName,ServingSize,QuantityInStock, Calories,TotalFat,TransFat,Cholesterol,Sodium,TotalCarbs,Fiber,Sugar,Protein,Vegan,Vegetarian,Halal,Kosher,International,Price from Item where ItemID=$itemIDFinal";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table border="1" class="table table-striped">

        <?php
        while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td>
                <label> Item Name:</label>
            </td>
            <td>
                <?php echo $row['ItemName']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Calories</label>
            </td>
            <td>
                <?php echo $row['Calories']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> TransFat</label>
            </td>
            <td>
                <?php echo $row['TransFat']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Quantity in Stock Size</label>
            </td>
            <td>
                <?php echo $row['QuantityInStock']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Serving Size</label>
            </td>
            <td><?php echo $row['ServingSize']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Total Fat</label>
            </td>
            <td><?php echo $row['TotalFat']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Cholesterol</label>
            </td>
            <td>
                <?php echo $row['Cholesterol']?>
            </td>
        </tr>


        <tr>
            <td>
                <label> Sodium</label>
            </td>
            <td><?php echo $row['Sodium']?>
            </td>
        </tr>


        <tr>
            <td>
                <label> Total Carbs</label>
            </td>
            <td>
                <?php echo $row['TotalCarbs']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Fiber</label>
            </td>
            <td><?php echo $row['Fiber']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Sugar</label>
            </td>
            <td>
                <?php echo $row['Sugar']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Protein</label>
            </td>
            <td><?php echo $row['Protein']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Vegan</label>
            </td>
            <td>
                <?php echo $row['Vegan']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Vegetarian</label>
            </td>
            <td><?php echo $row['Vegetarian']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Halal</label>
            </td>
            <td>
                <?php echo $row['Halal']?>
            </td>
        </tr>

        <tr>
            <td>
                <label> Kosher</label>
            </td>
            <td><?php echo $row['Kosher']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> International</label>
            </td>
            <td>
                <?php echo $row['International']?>
            </td>
        </tr>
        <tr>
            <td>
                <label> Price</label>
            </td>
            <td>
                <?php echo $row['Price']?>
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

</body>
</html>
