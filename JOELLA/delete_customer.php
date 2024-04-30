<?php
include('database_connection.php');


// Check if customeris set
if(isset($_REQUEST['customerid'])) {
    $cid = $_REQUEST['customerid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customer WHERE customerid=?");
    $stmt->bind_param("i", $cid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "customerid is not set.";
}

$connection->close();
?>
