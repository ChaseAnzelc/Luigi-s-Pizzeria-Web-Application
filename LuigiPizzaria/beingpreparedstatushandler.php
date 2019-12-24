<!DOCTYPE html>
<html>
<head>
<title>Pizza Shop</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        $id = $_REQUEST["id"];
        
        $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );
        
        $sql = "UPDATE orders SET status=\"Being Prepared\" WHERE order_id=$id";
        
        if (mysqli_query($dbc, $sql))
        {
            echo "Record updated successfully";
            header('Location: viewallorders.php');
        }
        else
        {
            echo "Error updating record: " . mysqli_error($dbc);
        }
    ?>
</body>
</html>
