<?php
include('database_connection.php');


// Check if feedbackid is set
if(isset($_REQUEST['feedbackid'])) {
    $aid = $_REQUEST['feedbackid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM feedback WHERE feedbackid=?");
    $stmt->bind_param("i", $fid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "no feedback
    .";
}

$connection->close();
?>
