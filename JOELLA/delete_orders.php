<?php
include('database_connection.php');


// Check if orderid is set
if(isset($_REQUEST['orderid'])) {
    $oid = $_REQUEST['orderid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customer WHERE orderid=?");
    $stmt->bind_param("i", $oid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "no order";
}

$connection->close();
?>
