<?php
include('database_connection.php');


// Check if addressidis set
if(isset($_REQUEST['addressid'])) {
    $aid = $_REQUEST['addressid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM address WHERE addressid=?");
    $stmt->bind_param("i", $aid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "no address";
}

$connection->close();
?>
