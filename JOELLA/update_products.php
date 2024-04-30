<?php
include('database_connection.php');

// Check if productid is set
if(isset($_REQUEST['productid'])) {
    $cid = $_REQUEST['productid'];
    
    $stmt = $connection->prepare("SELECT * FROM products WHERE productid=?");
    $stmt->bind_param("i", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['productid'];
        $u = $row['productname'];
        $y = $row['price'];
    } else {
        echo "product not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="pname">productname:</label>
        <input type="text" name="pname" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="pr">price:</label>
        <input type="text" name="pr" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $productname = $_POST['pname'];
    $price = $_POST['price'];
    
    // Update the products in the database
    $stmt = $connection->prepare("UPDATE products SET productname=?, price=?WHERE productid=?");
    $stmt->bind_param("ssd", $productname, $price);
    $stmt->execute();
    
    // Redirect to products.php
    header('Location: products.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
