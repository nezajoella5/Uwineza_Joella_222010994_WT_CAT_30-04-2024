<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our customer</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;    
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    section{
    padding:71px;
    border-bottom: 1px solid #ddd;
    }
    footer{
    text-align: center;
    padding: 15px;
    background-color:darkgray;
    }

  </style>
  </head>

  <header>

<body bgcolor="blue">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/arsnl.jpg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./Service.html">SERVICE</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./address.php">ADDRESS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./feedback.php">FEEDBACK</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">CUSTOMER</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./PRODUCTS.php">PRODUCTS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./orders.php">ORDERS</a>
  </li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

    <h1><u> customer Form </u></h1>
    <form method="post">
            
        <label for="cid">CustomerID:</label>
        <input type="number" id="cid" name="cid"><br><br>

        <label for="fnm">firstname:</label>
        <input type="text" id="fnm" name="fnm"><br><br>

        <label for="lnm">lastName:</label>
        <input type="text" id="lnm" name="lnm" required><br><br>

        <label for="eml">email:</label>
        <input type="text" id="eml" name="eml" required><br><br>

         <label for="gen">gender:</label>
        <input type="text" id="gen" name="gen" required><br><br>

        <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO customer(customerid, firstname, lastname, email, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $cid, $fnm, $lnm, $eml, $gen);
    // Set parameters and execute
    $cid = $_POST['cid'];
    $fnm = $_POST['fnm'];
    $lnm = $_POST['lnm'];
    $eml = $_POST['eml'];
    $gen = $_POST['gen'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
include('database_connection.php');

// SQL query to fetch data from the customer table
$sql = "SELECT * FROM customer";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of customer</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of customer</h2></center>
    <table border="5">
        <tr>
            <th>customerid</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');

        // Prepare SQL query to retrieve all customer
        $sql = "SELECT * FROM customer";
        $result = $connection->query($sql);

        // Check if there are any customer
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $cid = $row['customerid']; // Fetch the customerid
                echo "<tr>
                    <td>" . $row['customerid'] . "</td>
                    <td>" . $row['firstname'] . "</td>
                    <td>" . $row['lastname'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td><a style='padding:4px' href='delete_customer.php?customerid=$cid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_customer.php?customerid=$cid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Joella UWINEZA</h2></b>
  </center>
</footer>
</body>
</html>