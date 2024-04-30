<?php
include('database_connection.php');


// Check if feedback is set
if(isset($_REQUEST['feedbackid'])) {
    $fid = $_REQUEST['feedbackid'];
    $stmt = $connection->prepare("SELECT * FROM feedback WHERE feedbackid=?");
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['feedbackid'];
        $u = $row['comments'];
        $y = $row['date'];
    } else {
        echo "no feedback";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="com">comments:</label>
        <input type="text" name="com" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="loc">date:</label>
        <input type="text" name="dt" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $comments = $_POST['com'];
    $date= $_POST['dt'];
    
    
    // Update the feedback in the database
    $stmt = $connection->prepare("UPDATE feedback SET comments=?, date=? WHERE feedbackid=?");
    $stmt->bind_param("ssd", $comments, $date, $fid);
    $stmt->execute();
    
    // Redirect to feedack.php
    header('date: feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
