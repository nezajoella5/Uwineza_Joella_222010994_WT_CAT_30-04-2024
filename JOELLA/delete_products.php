<?php
include('database_connection.php');


// Check if productid is set
if(isset($_REQUEST['productid'])) {
    $pid = $_REQUEST['productid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM products WHERE productid=?");
    $stmt->bind_param("i", $pid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "productid is not set.";
}

$connection->close();
?>
