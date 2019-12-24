<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Luigi's Pizzaria</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<style>
body, html {
				height: 100%;
				margin: 0;
				font-family: Ariel, Helvetica, sans-serif;
			}
			

.hero-image {
				background-image: url("https://img.grouponcdn.com/deal/a1eFPxp18S6c163KaYW4/yV-1500x900/v1/c700x420.jpg");
				height: 40%;
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
				opacity: 0.7;
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
				<h1 class="text-center" style="color: black;font-size: 100px;">Your Past Orders</h1>
			</div>
			</div>
	</div>
   <div style="text-align: center"> 
    <?php
        $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );

        if (isset($_COOKIE['user_id']))
        {
            @$id = $_COOKIE['user_id'];
			
			$q = sprintf("select * from orders as o, payment as p, order_items as oi, pizza as pi where o.id=p.id and o.id=%d and o.payment_id=p.payment_id and oi.order_id = o.order_id and pi.pizza_id = oi.pizza_id ORDER BY o.order_id DESC;", $id);
            $r = mysqli_query($dbc, $q);
			
			$count = 0;
			
			
			
			if ($r)
            {
			
            ?>
					<div class="container-fluid mt-3">
					<div class="table-responsive">
					<table class="table table-striped">

					<?php
			
			while ($row = mysqli_fetch_assoc($r))
                { 
					
					if($count == 0 or ($order_id != $row['order_id']))
					{
					?>
						<thead>
						<th>Date : <?php echo sprintf ("%s", $row['payment_date']) ?></th>
						<th>Payment Method : <?php echo sprintf ("%s", $row['payment_method']) ?></th>
						<th>Status : <?php echo sprintf ("%s", $row['status']) ?></th>
						<th>Amount : <?php echo sprintf ("$ %s.00", $row['amount']) ?></th>
						</thead>
					<?php


					//echo sprintf ("<h3>%s</h3> <br> &nbsp;&nbsp;&nbsp; Payment Method: %s <br> &nbsp;&nbsp;&nbsp; Card Info:  %s<br> &nbsp;&nbsp;&nbsp; Amount: $%d.00 <br> Status: %s <br><br>", $row['payment_date'], $row['payment_method'], $row['credit_card_info'], $row['amount'], $row['status']);
					}
					$order_id = ($row['order_id']);
					$count += 1;

					?>
					<tbody>
						<tr>
							<td><?php echo sprintf ("Pizza ID : %s", $row['pizza_id']) ?></td>
							<td><?php echo sprintf ("Size : %s", $row['p_size']) ?></td>
							<td><?php echo sprintf ("Crust Type : %s", $row['crust_type']) ?></td>
							<td></td>
						</tr>
					</tbody>
					<?php


					//echo sprintf (" &nbsp;&nbsp;&nbsp; Pizza ID: %s <br> &nbsp;&nbsp;&nbsp; Size: %s <br> &nbsp;&nbsp;&nbsp; Crust Type: %s <br><br>", $row['pizza_id'], $row['p_size'], $row['crust_type']);
					
				}
			
				?>
				</table>
			</div>
		</div>

				<?php
			
			
			}
			if($count == 0){
				echo "<h3>You don't have any orders!</h3>";
			}
		}
        
        mysqli_close($dbc);
			
           
        
        
    ?>
	</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
