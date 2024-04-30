<?php
include('database_connection.php');


// Check if orderid is set
if(isset($_REQUEST['orderid'])) {
    $cid = $_REQUEST['orderid'];
    
    $stmt = $connection->prepare("SELECT * FROM orders WHERE orderid=?");
    $stmt->bind_param("i", $oid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['orderid'];
        $u = $row['customerid'];
        $y = $row['totalamount'];
        $z = $row['orderdate'];
    } else {
        echo "no order";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="cid">customerid:</label>
        <input type="number" name="cid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="ta">totalamount:</label>
        <input type="number" name="ta" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=odt>orderdate:</label>
        <input type="date" name="odt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $customerid= $_POST['cid'];
    $totalamount= $_POST['ta'];
    $orderdate = $_POST['odt'];
    
    // Update the orders in the database
    $stmt = $connection->prepare("UPDATE orders SET customerid=?, totalamount=?, orderdate=? WHERE orderid=?");
    $stmt->bind_param("ssdi", $customerid, $totalamount, $orderdate, $oid);
    $stmt->execute();
    
    // Redirect to orders.php
    header('Location: orders.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
