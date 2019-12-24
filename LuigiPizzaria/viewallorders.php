<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Pizza Shop</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style>
body, html {
				height: 100%;
				margin: 0;
				font-family: Ariel, Helvetica, sans-serif;
				text-align: center;
			}
.hero-image {
				background-image: url("https://img.grouponcdn.com/deal/jDmXdNLkoWAkG4E4s1ev/cA-800x480/v1/c700x420.jpg");
				height: 40%;
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
				position: relative;
				opacity: 0.7;
			}

h1 {
    font-size: 100px;
padding: 0px;
    
}
.row {
padding:  20px 300px;
    
}
</style>

</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Pizza Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="placeorder.php">Place Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pastorders.php">Past Orders</a>
                </li>
                <?php
                    if (isset($_COOKIE['user_id']) and isset($_COOKIE['user_name']))
                    {
                        echo sprintf('
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello %s
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>', $_COOKIE['user_name']);
                        if ($_COOKIE['user_type'] == "Employee")
                        {
                            echo '<li class="nav-item">
                                <a class="nav-link" href="viewallorders.php">All Orders</a>
                                     </li>';
                        }
                    }
                    else {
                        //echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
echo "Please login!<b>";
            header('Location: index.php');
            exit();
                    }
                ?>
            </ul>
        </div>
    </nav>



<div class="hero-image">
			<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<h1 class="text-center" style="color: black;font-size: 100px;">All Orders</h1>
			</div>
			</div>
	</div>


<div style="text-align: center">
<bR><br>
<?php
    $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );

    if (isset($_COOKIE['user_id']))
    {
        @$id = $_COOKIE['user_id'];
        
        $q = sprintf("select * from orders as o, payment as p, order_items as oi, pizza as pi where o.id=p.id and o.payment_id=p.payment_id and oi.order_id = o.order_id and pi.pizza_id = oi.pizza_id ORDER BY o.order_id DESC;");
        $r = mysqli_query($dbc, $q);
        
        $count = 0;
        
        
        
        if ($r)
        {
            
            
            
            while ($row = mysqli_fetch_assoc($r))
            {
                
                
                if($count == 0 or ($order_id != $row['order_id']))
                {
                    echo sprintf ("<h2>%s</h2> <br> &nbsp;&nbsp;&nbsp; Payment Method: %s <br> &nbsp;&nbsp;&nbsp; Card Info:  %s<br> &nbsp;&nbsp;&nbsp; Amount: $%d.00 <br> Status: %s <br><br>", $row['payment_date'], $row['payment_method'], $row['credit_card_info'], $row['amount'], $row['status']);
                    echo sprintf("<form action=\"beingpreparedstatushandler.php\" method=\"GET\">
                                 <button type=\"submit\" class=\"btn btn-primary\" name=\"id\" value=\"%d\">Being Prepared</button>                                </form>", $row['order_id']);
                     echo sprintf("<form action=\"cookingstatushandler.php\" method=\"GET\">
                                  <button type=\"submit\" class=\"btn btn-primary\" name=\"id\" value=\"%d\">Cooking</button>
                                  </form>", $row['order_id']);
                      echo sprintf("<form action=\"readyforpickupstatushandler.php\" method=\"GET\">
                                   <button type=\"submit\" class=\"btn btn-primary\" name=\"id\" value=\"%d\">Ready for Pickup</button>
                                   </form>", $row['order_id']);
                       echo sprintf("<form action=\"deliveredstatushandler.php\" method=\"GET\">
                                    <button type=\"submit\" class=\"btn btn-primary\" name=\"id\" value=\"%d\">Delivered</button>
                                    </form>", $row['order_id']);
                        echo sprintf("<form action=\"cancelstatushandler.php\" method=\"GET\">
                                     <button type=\"submit\" class=\"btn btn-danger\" name=\"id\" value=\"%d\">Cancel Order</button>                                 </form>", $row['order_id']);
                }
                $order_id = ($row['order_id']);
                $count += 1;
                echo sprintf (" &nbsp;&nbsp;&nbsp; Pizza ID: %s <br> &nbsp;&nbsp;&nbsp; Size: %s <br> &nbsp;&nbsp;&nbsp; Crust Type: %s <br><br>", $row['pizza_id'], $row['p_size'], $row['crust_type']);
            }
            
            
            
        }
        if($count == 0){
            echo "<h3>You don't have any orders!</h3>";
        }
    }
    
    else
    {
        echo "Please login!<b>";
        header('Location: login.html');
        exit();
    }
    
    mysqli_close($dbc);
    
    
    
    
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
