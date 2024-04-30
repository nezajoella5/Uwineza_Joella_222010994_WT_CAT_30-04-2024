<?php
include('database_connection.php');


// Check if customerid is set
if(isset($_REQUEST['customerid'])) {
    $cid = $_REQUEST['customerid'];
    
    $stmt = $connection->prepare("SELECT * FROM customer WHERE customerid=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['customerid'];
        $u = $row['firstname'];
        $y = $row['lastname'];
        $q = $row['email'];
        $p = $row['gender'];
    } else {
        echo "customer not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="fnm">firstName:</label>
        <input type="text" name="fnm" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="lnm">lastName:</label>
        <input type="text" name="lnm" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="eml">email:</label>
        <input type="text" name="eml" value="<?php echo isset($q) ? $q : ''; ?>">
        <br><br>

        <label for="gen">gender:</label>
        <input type="text" name="gen" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $fname = $_POST['firstnm'];
    $lname = $_POST['lastnm'];
    $Email = $_POST['email'];
    $gender = $_POST['gender'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE customer SET firstname=?, lastname=?, email=?, gender=? WHERE customerid=?");
    $stmt->bind_param("ssdii", $firstname, $lastname,$email, $gender,  $cid);
    $stmt->execute();
    
    // Redirect to customer.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
