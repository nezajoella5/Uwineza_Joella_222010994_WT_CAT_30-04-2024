<?php
include('database_connection.php');


// Check if Product_Id is set
if(isset($_REQUEST['addressid'])) {
    $aid = $_REQUEST['addressid'];
    
    $stmt = $connection->prepare("SELECT * FROM address WHERE addressid=?");
    $stmt->bind_param("i", $aid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['addressid'];
        $u = $row['customerid'];
        $y = $row['city'];
        $z = $row['country'];
    } else {
        echo "no address.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="cid">customerid:</label>
        <input type="number" name="cid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="cty">city:</label>
        <input type="text" name="cty" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="ctry">country:</label>
        <input type="number" name="ctry" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $customerid= $_POST['cid'];
    $city = $_POST['cty'];
    $country = $_POST['ctry'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE address SET customerid=?, city=?, country=? WHERE addressid=?");
    $stmt->bind_param("ssdi", $customerid, $city, $country, $aid);
    $stmt->execute();
    
    // Redirect to address.php
    header('Location: address.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
