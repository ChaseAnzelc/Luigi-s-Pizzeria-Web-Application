<!DOCTYPE html>
<html>
<head>
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
				background-image: url("https://img.grouponcdn.com/deal/a1eFPxp18S6c163KaYW4/yV-1500x900/v1/c700x420.jpg");
				height: 50%;
				background-repeat: no-repeat;
				background-postition: center;
				background-size: cover;
				position: relative;
				opacity: 0.7;
			}

h1 {
font-size: 50px;
padding: 0px;

}
h4 {
font-size: 20px;
padding: 0px;

}
.row {
	padding:  20px 300px;
}


}

</style>

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Pizza Shop</a>
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





<div align="center">

		<?php
		@$count = $_COOKIE['count'];
		@$id = $_COOKIE['user_id'];
		//echo $id;
		//@$title = $_COOKIE['title'];
		@$name = $_COOKIE['name'];
		@$email = $_COOKIE['email'];
		@$phone = $_COOKIE['phone'];
		@$address = $_COOKIE['address'];
		@$city = $_COOKIE['city'];
		@$state = $_COOKIE['state'];
		@$zip = $_COOKIE['zip'];
		@$password = $_COOKIE['password'];
		
		
		@$size1 = $_COOKIE['size1'];
		@$size2 = $_COOKIE['size2'];
		@$size3 = $_COOKIE['size3'];
		@$size4 = $_COOKIE['size4'];
		@$type1 = $_COOKIE['type1'];
		@$type2 = $_COOKIE['type2'];
		@$type3 = $_COOKIE['type3'];
		@$type4 = $_COOKIE['type4'];
		
		@$total = $_COOKIE['total'];
		
		$toppingarray1 = null;
		$toppingarray1 = null;
		$toppingarray1 = null;
		$toppingarray1 = null;
		
		
		for($i=1; $i<$count+1; $i++)
		{
		if($i == 1)
		{
		$toppingarray1 = unserialize($_COOKIE['toppingarray1']);
		}
		if($i == 2)
		{
		$toppingarray2 = unserialize($_COOKIE['toppingarray2']);
		}
		if($i == 3)
		{
		$toppingarray3 = unserialize($_COOKIE['toppingarray3']);
		}
		if($i == 4)
		{
		$toppingarray4 = unserialize($_COOKIE['toppingarray4']);
		}
		}

	

		
            $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );

	
		
		
		
		
		
		if($id == null){
			
		$w = sprintf("SELECT * FROM users WHERE email=\"%s\"", $email);
				$s = mysqli_query($dbc, $w);
				
				while ($row = mysqli_fetch_array($s)){
				
				$id = $row['id'];
				}
		
		}
		
		$date = date('Y-m-d');
		$payment_method = $_REQUEST["payment_method"];
		
		$credit_card_info = null;
		
		if(isset ($_REQUEST["credit_card_info"]))
		{$credit_card_info = $_REQUEST["credit_card_info"];}
	
		
		
		
		
		//Into Payments
		$payment = "INSERT INTO payment(id,payment_date,payment_method,credit_card_info) VALUES (\"$id\",\"$date\",\"$payment_method\",\"$credit_card_info\")";
		
		
		
		if (mysqli_query($dbc, $payment))
            {
                //echo "New record created successfully Payment";
            } else
            {
                echo "Error: " . $payment . "<br>" . mysqli_error($dbc);
            }
		
		
		
		
		
		
		$t = sprintf("SELECT * FROM payment WHERE id = %d and payment_date=\"%s\"", $id,$date);
        $p = mysqli_query($dbc, $t);
        //$row1 = mysqli_fetch_array($p);
		
		//INTO Orders
		while($row=mysqli_fetch_array($p)){
			
			$payment_id = $row['payment_id'];
		}
		
		
		$comment = $_REQUEST["comment"];
		$status = "Being Prepared";
		//$payment_id = $row1['payment_id'];
		
		$orderssql = "INSERT INTO orders(payment_id,id,amount,comment,status) VALUES (\"$payment_id\",\"$id\",\"$total\",\"$comment\", \"$status\")";
		
		
		if (mysqli_query($dbc, $orderssql))
            {
                //echo "New record created successfully ORDERs";
            } else
            {
                echo "Error: " . $orderssql . "<br>" . mysqli_error($dbc);
            }
		
		//get order_id
		$l = sprintf("select * from orders where payment_id = %d and amount= %d;", $payment_id, $total);
        $m = mysqli_query($dbc, $l);
        $row2 = mysqli_fetch_array($m);
		
		$order_id = $row2['order_id'];
		
		setcookie('order_id', $row2["order_id"], time() + (86400 * 30));
		
		
		
		
		//INTO Pizza
		
		
		for($i=1; $i<$count+1; $i++)
		{
		if($i == 1)
		{
			
			
		$pizzasql = "INSERT INTO pizza(p_size,crust_type) VALUES (\"$size1\",\"$type1\")";
		
		if (mysqli_query($dbc, $pizzasql))
            {
                //echo "New record created successfully PIzza1";
            } else
            {
                echo "Error: " . $pizzasql . "<br>" . mysqli_error($dbc);
            }
		}
		if($i == 2)
		{
		$pizzasql = "INSERT INTO pizza(p_size,crust_type) VALUES (\"$size2\",\"$type2\")";
		if (mysqli_query($dbc, $pizzasql))
            {
                //echo "New record created successfully PIzza2";
            } else
            {
                echo "Error: " . $pizzasql . "<br>" . mysqli_error($dbc);
            }
		}
		if($i == 3)
		{
		$pizzasql = "INSERT INTO pizza(p_size,crust_type) VALUES (\"$size3\",\"$type3\")";
		if (mysqli_query($dbc, $pizzasql))
            {
                //echo "New record created successfully PIzza3";
            } else
            {
                echo "Error: " . $pizzasql . "<br>" . mysqli_error($dbc);
            }
		}
		if($i == 4)
		{
		$pizzasql = "INSERT INTO pizza(p_size,crust_type) VALUES (\"$size4\",\"$type4\")";
		if (mysqli_query($dbc, $pizzasql))
            {
                //echo "New record created successfully PIzza4";
            } else
            {
                echo "Error: " . $pizzasql . "<br>" . mysqli_error($dbc);
            }
		}
		}
		
		
		//get pizza ids INTO ORDER ITEMS
		$l = sprintf("select * from pizza order by pizza_id desc LIMIT %d", $count);
        $m = mysqli_query($dbc, $l);
        
		$counta = 0;
		
		while($row2 = mysqli_fetch_array($m)){
			$counta +=1;
		$pizza_id = $row2['pizza_id'];
	
		
		$order_items = "INSERT INTO order_items(order_id,pizza_id) VALUES (\"$order_id\",\"$pizza_id\")";
		if (mysqli_query($dbc, $order_items))
            {
                //echo "New record created successfully OrderItems";
            } else
            {
                echo "Error: " . $order_items . "<br>" . mysqli_error($dbc);
            }
			
			
			
			if($counta == 1)
			{
			
			foreach($toppingarray1 as $selected){
			$topping_itemssql = "INSERT INTO topping_items(pizza_id,name) VALUES (\"$pizza_id\",\"$selected\")";
			if (mysqli_query($dbc, $topping_itemssql))
            {
                //echo "New record created successfully Toppingitems";
            } else
            {
                echo "Error: " . $topping_itemssql . "<br>" . mysqli_error($dbc);
            }
			}
			}
			if($counta == 2)
			{
			
			foreach($toppingarray2 as $selected){
			$topping_itemssql = "INSERT INTO topping_items(pizza_id,name) VALUES (\"$pizza_id\",\"$selected\")";
			if (mysqli_query($dbc, $topping_itemssql))
            {
                //echo "New record created successfully Toppingitems";
            } else
            {
                echo "Error: " . $topping_itemssql . "<br>" . mysqli_error($dbc);
            }
			}
			}
			if($counta == 3)
			{
			
			foreach($toppingarray3 as $selected){
			$topping_itemssql = "INSERT INTO topping_items(pizza_id,name) VALUES (\"$pizza_id\",\"$selected\")";
			if (mysqli_query($dbc, $topping_itemssql))
            {
                //echo "New record created successfully Toppingitems";
            } else
            {
                echo "Error: " . $topping_itemssql . "<br>" . mysqli_error($dbc);
            }
			}
			}
			if($counta == 4)
			{
			
			foreach($toppingarray4 as $selected){
			$topping_itemssql = "INSERT INTO topping_items(pizza_id,name) VALUES (\"$pizza_id\",\"$selected\")";
			if (mysqli_query($dbc, $topping_itemssql))
            {
                //echo "New record created successfully Toppingitems";
            } else
            {
                echo "Error: " . $topping_itemssql . "<br>" . mysqli_error($dbc);
            }
			}
			}
		
		}
		
		
		
		$q = sprintf("select * from orders where order_id = %d", $order_id);
$r = mysqli_query($dbc, $q);
if($r){
	while($row=mysqli_fetch_array($r)){
	$payment_id = $row['payment_id'];
	$id = $row['id'];
	}
	
}


?>

<div class="hero-image">
			<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<h1 class="text-center" style="color: black;font-size: 100px;">Order Successful</h1>
			</div>
			</div>
	</div>


<?php
echo "<bR><br>(Please print this receipt for your record)<bR><br>";



echo '<H1>RECEIPT</H1>';

$q = sprintf("select * from users where id = %d", $id);
$r = mysqli_query($dbc, $q);

if($r){
	while($row=mysqli_fetch_array($r))
		echo sprintf ("Customer Id: %d <br> Name: %s <br> Order Number: %d<br><br><br>", $row['id'], $row['name'], $order_id);
}


//$q = sprintf("select * from order_items as o, pizza as p, pizza_size as s, pizza_type as t where p.pizza_id = o.pizza_id and order_id = %d and s.p_size = p.p_size and p.crust_type = t.crust_type", $order_id);

$q = sprintf("select * from order_items as o, pizza as p, pizza_size as s, pizza_type as t, topping_items as ti where p.pizza_id = o.pizza_id and order_id = %d and s.p_size = p.p_size and p.crust_type = t.crust_type and ti.pizza_id = p.pizza_id", $order_id);
$r = mysqli_query($dbc, $q);


$count = 0;
$pizza_cost = 0;



if($r){
	while($row=mysqli_fetch_array($r)){
		$cost = ($row['s_price'] + $row['ty_price']);
		
		
		
		
		if($count == 0 or ($pizza_id != $row['pizza_id']))
		{
		echo sprintf ("%s %s-Crust Pizza    &nbsp;  $%d.00<br>", $row['p_size'], $row['crust_type'], $cost);
		$pizza_cost += $cost;
		}
		$pizza_id = ($row['pizza_id']);
		$pizza_cost += 1; //for topping
		$count += 1;
		echo sprintf (" %s  &nbsp;&nbsp; $1.00<br>", $row['name']);
	}
	
}


echo sprintf("<br>Total    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     $%d.00 <br><br><br>", $pizza_cost);
	


$q = sprintf("select * from payment where payment_id = %d", $payment_id);	
$r = mysqli_query($dbc, $q);
if($r){
	while($row=mysqli_fetch_array($r))
	{
		echo sprintf ("Payment Date: %s <br><br> Payment Method: %s <br> ", $row['payment_date'], $row['payment_method']);
	
		if($row['credit_card_info'] != null){
		echo sprintf ("Account: XXXX-XXXX-XXXX-%s<br><br>",substr($row['credit_card_info'], -4));
		}

		if($row['payment_method'] != 'Cash'){
			echo '<H4>Approved</H4><br><br><br>';
		}
		else{ echo '<br>';}

		echo sprintf ("<H4>Order Type: %s</H4><br><br><br>", $comment);

		if($comment == "Delivery"){
			echo sprintf ("<H4>Delivery Address: %s</H4><br><br><br>", $address);
		}


		if($comment == "Delivery"){
		echo '<p>Delivery Time: ';
		}
		else{
		echo '<p>Pickup Time: ';
		}
		echo(strftime("%I:%M"));
		echo ' pm</p>';



	}
		

}


echo '<h3>Thank you for your order</h3>';

	



mysqli_close($dbc);
		
		
		

		
		
		
		?>
		<a href="home.php"><h3>Go Back Home</h3></a>
		
		<br>
		<h7>Don't worry a copy of your receipt will be sent to your email</h7>
		
		
		</div>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		
</body>
</html>
