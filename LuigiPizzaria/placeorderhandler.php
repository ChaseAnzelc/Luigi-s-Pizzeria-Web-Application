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

h1{font-size: 70px;}
</style>

</head>
<body>


<div class="hero-image">
			<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<h1 class="text-center" style="color: black;font-size: 100px;">Order Total</h1>
			</div>
			</div>
	</div>




		<?php
		$total = 0;
		@$count = $_COOKIE['count'];
		@$address = $_COOKIE['address'];
		
		
		for($i=1; $i<$count+1; $i++)
		{
		if($i == 1)
		{
		setcookie('toppingarray1', serialize($_REQUEST["topping1"]), time()+3600);
		foreach($_REQUEST['topping1'] as $selected){
		//echo $selected."</br>";
		$total += 1;
		}
		}
		if($i == 2)
		{
		setcookie('toppingarray2', serialize($_REQUEST["topping2"]), time()+3600);
		foreach($_REQUEST['topping2'] as $selected){
		//echo $selected."</br>";
		$total += 1;
		}
		}
		if($i == 3)
		{
		setcookie('toppingarray3', serialize($_REQUEST["topping3"]), time()+3600);
		foreach($_REQUEST['topping3'] as $selected){
		//echo $selected."</br>";
		$total += 1;
		}
		}
		if($i == 4)
		{
		setcookie('toppingarray4', serialize($_REQUEST["topping4"]), time()+3600);
		foreach($_REQUEST['topping4'] as $selected){
		//echo $selected."</br>";
		$total += 1;
		}
		}
		
		}
		
		
		
		
		
		
		
		
		
		
			
		
		
			if (isset ($_REQUEST["type1"])){
				$type1 = $_REQUEST['type1'];
				setcookie('type1', $_REQUEST["type1"], time() + (86400 * 30));
				if($type1 == "Original")
				{$total += 1;}
				if($type1 == "Deep Dish")
				{$total += 2;}
			}
			if (isset ($_REQUEST["type2"])){
				$type2 = $_REQUEST['type2'];
				setcookie('type2', $_REQUEST["type2"], time() + (86400 * 30));
				if($type2 == "Original")
				{$total += 1;}
				if($type2 == "Deep Dish")
				{$total += 2;}
			}
			if (isset ($_REQUEST["type3"])){
				$type3 = $_REQUEST['type3'];
				setcookie('type3', $_REQUEST["type3"], time() + (86400 * 30));
				if($type3 == "Original")
				{$total += 1;}
				if($type3 == "Deep Dish")
				{$total += 2;}
			}
			if (isset ($_REQUEST["type4"])){
				$type4 = $_REQUEST['type4'];
				setcookie('type4', $_REQUEST["type4"], time() + (86400 * 30));
				if($type4 == "Original")
				{$total += 1;}
				if($type4 == "Deep Dish")
				{$total += 2;}
			}
			if (isset ($_REQUEST["size1"])){
				$size1 = $_REQUEST['size1'];
				setcookie('size1', $_REQUEST["size1"], time() + (86400 * 30));
				if($size1 == "Small")
				{$total += 5;}
				if($size1 == "Medium")
				{$total += 7;}
				if($size1 == "Large")
				{$total += 9;}
			}
			if (isset ($_REQUEST["size2"])){
				$size2 = $_REQUEST['size2'];
				setcookie('size2', $_REQUEST["size2"], time() + (86400 * 30));
				if($size2 == "Small")
				{$total += 5;}
				if($size2 == "Medium")
				{$total += 7;}
				if($size2 == "Large")
				{$total += 9;}
			}
			if (isset ($_REQUEST["size3"])){
				$size3 = $_REQUEST['size3'];
				setcookie('size3', $_REQUEST["size3"], time() + (86400 * 30));
				if($size3 == "Small")
				{$total += 5;}
				if($size3 == "Medium")
				{$total += 7;}
				if($size3 == "Large")
				{$total += 9;}
			}
			if (isset ($_REQUEST["size4"])){
				$size4 = $_REQUEST['size4'];
				setcookie('size4', $_REQUEST["size4"], time() + (86400 * 30));
				if($size4 == "Small")
				{$total += 5;}
				if($size4 == "Medium")
				{$total += 7;}
				if($size4 == "Large")
				{$total += 9;}
			}
			
		
			echo "<br><br><h1>$" . $total . ".00</h1>";
			
			setcookie('total', $total, time() + (86400 * 30));
			
	
			
			
			
			
        @$id = $_COOKIE['user_id'];
		
		/*
		//setcookie('title', $_REQUEST["title"], time() + (86400 * 30));//one day
		setcookie('name', $_REQUEST["name"], time() + (86400 * 30));
		setcookie('email', $_REQUEST["email"], time() + (86400 * 30));
		setcookie('phone', $_REQUEST["phone"], time() + (86400 * 30));
		setcookie('address', $_REQUEST["address"], time() + (86400 * 30));
		setcookie('city', $_REQUEST["city"], time() + (86400 * 30));
		setcookie('state', $_REQUEST["state"], time() + (86400 * 30));
		setcookie('zip', $_REQUEST["zip"], time() + (86400 * 30));
		setcookie('password', $_REQUEST["password"], time() + (86400 * 30));
		*/
		
    ?>
	

	<div class="container mt-5 mb-1">
			<form class="form_control mt-1" action="placeorderhandler2.php" method="get">
				<div class="row pt-3">
						<label>Payment Method</label><br />
						<select class="form-control form-control-mt" name="payment_method" id="payment_method" required>
							<option value="">Choose a Payment Method</option>
							<option value="Cash">Cash</option>
							<option value="Credit">Credit</option>
							<option value="Debit">Debit</option>
						</select>
				</div>
				<div class="row pt-3">
						<label>Credit/Debit Card Information</label>
						<input type="text" class="form-control form-control-lg" name="credit_card_info" id="credit_card_info"/>
				</div>
				<div class="row pt-3">
						<label>Delivery or Pickup?</label><br />
						<select class="form-control form-control-mt" name="comment" id="comment" required>
							<option value="">Choose a Option</option>
							<option value="Delivery">Delivery</option>
							<option value="Pickup">Pickup</option>
						</select>
				</div>
				<div class="row pt-3">
						<label>Delivery Address</label><br />

						<?php
						echo sprintf ('<input type="text" class="form-control form-control-lg" name="address" id="address" value="%s"/>', $address);

						?>
				</div>
				<br><br>
				<button type="submit" class="btn btn-primary mb-2">Let's Get Cooking</button>
			</form>
		</div>




	
	<?php
	/*
	echo '<form action="placeorderhandler2.php" method="get">
			
			<div class="form-group">
                <label for="payment_method">Payment Method</label>
			<select class="form-control" name="payment_method">
            <option value="Cash">Cash</option>
			<option value="Credit">Credit</option>
            <option value="Debit">Debit</option>
			</select>
			<div class="form-group">
                <label for="credit_card_info">Card Info</label>
                <input type="text" class="form-control" name="credit_card_info" id="credit_card_info" value="">
            </div>
            </div>
			<div class="form-group">
                <label for="comment">Comments</label>
                <input type="text" class="form-control" name="comment" id="comment" value="">
            </div>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>';
*/
	
	?>
	
</body>
</html>
