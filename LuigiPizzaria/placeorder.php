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
				background-image: url("https://img.grouponcdn.com/deal/a1eFPxp18S6c163KaYW4/yV-1500x900/v1/c700x420.jpg");
				height: 40%;
				background-repeat: no-repeat;
				background-postition: center;
				background-size: cover;
				position: relative;
				opacity: 0.7;
			}
h2 {font-size: 50px;}
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







    <?php
        $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );

        @$id = $_COOKIE['user_id'];
        $q = sprintf("SELECT * FROM users WHERE id = %d", $id);
        $r = mysqli_query($dbc, $q);
        $row = mysqli_fetch_array($r);
		
		$t = sprintf("SELECT * from payment where id = %d", $id);



		setcookie('name', $row["name"], time() + (86400 * 30));
		setcookie('email', $row["email"], time() + (86400 * 30));
		setcookie('phone', $row["c_phone"], time() + (86400 * 30));
		setcookie('address', $row["address"], time() + (86400 * 30));
		setcookie('city', $row["city"], time() + (86400 * 30));
		setcookie('state', $row["state"], time() + (86400 * 30));
		setcookie('zip', $row["zip_code"], time() + (86400 * 30));	


    ?>

    

	<div class="hero-image">
			<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<h1 class="text-center" style="color: black;font-size: 100px;">Place Order</h1>
			</div>
			</div>
	</div>



	<div class="container mt-5 mb-5">
	
	<form method="get">
	<div class="form_-control mt-2"><br><br>

			<h3>How many pizzas would you like to order?</h3>
			<select class="form-control" name="count">';
				
		<?php	
			
			$count = $_REQUEST["count"];
			setcookie('count', $_REQUEST["count"], time() + (86400 * 30));
			
			
			if($count == 1)$one = "selected";
			if($count == 2)$two = "selected";
			if($count == 3)$three = "selected";
			if($count == 4)$four = "selected";
				
				
			echo sprintf('<option value="1" %s>1</option>', $one);
				
			echo sprintf('<option value="2" %s>2</option>', $two);
			
			echo sprintf('<option value="3" %s>3</option>', $three);
				
			echo sprintf('<option value="4" %s>4</option>', $four);
			

		?>


			</select>
			</div><br><br>
	<button type="submit" class="btn btn-primary">Submit</button>
    </form>

	</div>
	
		



                    


			<div class="content">
			<form action="placeorderhandler.php" method="get">


	
			
            <?php
			
			
			//$count = $_REQUEST["count"];
			
			$counter = 0;
			while($count > $counter){
				$counter += 1;
				$typecount = "type" . "$counter";
				$sizecount = "size" . "$counter";
				//$toppingcount = "topping" . "$counter";
				$pepperoni = "pepperoni" . "$counter";
				$mushrooms = "mushrooms" . "$counter";
				
				
				
				$topping = "topping" . "$counter" . "[]";  

				//echo $typecount;


			switch ($counter) {
				case 1:
					if($count == 1){echo '<h2>Your Pizza</h2><br>';}
					else{echo "<h2>Your First Pizza</h2><br>";}
					break;
				case 2:
					echo "<h2>Your Second Pizza</h2><bR>";
					break;
				case 3:
					echo "<h2>Your Third Pizza</h2><br>";
					break;
				case 4:
					echo "<h2>Your Fourth Pizza</h2><br>";
					break;
			}


				
            echo sprintf ('
			<h3>Size</h3>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="%s" id="size-small" value="Small" checked>
                <label class="form-check-label" for="size-small">
                   $5.00    Small
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="%s" id="size-medium" value="Medium">
                <label class="form-check-label" for="size-medium">
                   $7.00    Medium
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="%s" id="size-large" value="Large">
                <label class="form-check-label" for="size-large">
                    $9.00   Large
                </label>
            </div>
    		<h3>Type</h3>
            <div class="form-check form-check-inline"> 
            <input class="form-check-input" type="radio" name="%s" id="type-thin" value="Thin" checked>
			
			<label class="form-check-label" for="type-thin">
                         Thin
                </label>
            </div>
    		<div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="%s" id="type-orginal" value="Original">
                <label class="form-check-label" for="type-orginal">
                    add $1.00   Original
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="%s" id="type-deep-dish" value="Deep Dish">
                <label class="form-check-label" for="type-deep-dish">
                    add $2.00   Deep Dish
                </label>
            </div>
            
            <h3>Toppings</h3>
			add $1.00 per topping
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s"  value="Pepperoni" checked>
                <label class="form-check-label" for="topping-pepperoni">
                    Pepperoni
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Mushrooms">
                <label class="form-check-label" for="topping-mushrooms">
                    Mushrooms
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Sausage">
                <label class="form-check-label" for="topping-sausage">
                    Sausage
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Onions">
                <label class="form-check-label" for="topping-onions">
                    Onions
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Bacon">
                <label class="form-check-label" for="topping-bacon">
                    Bacon
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Peppers">
                <label class="form-check-label" for="topping-peppers">
                    Peppers
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Black Olives">
                <label class="form-check-label" for="topping-blackolives">
                    Black Olives
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Chicken">
                <label class="form-check-label" for="topping-chicken">
                    Chicken
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Pineapple">
                <label class="form-check-label" for="topping-pineapple">
                    Pineapple
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Spinach">
                <label class="form-check-label" for="topping-spinach">
                    Spinach
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Basil">
                <label class="form-check-label" for="topping-basil">
                    Fresh Basil
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Ham">
                <label class="form-check-label" for="topping-ham">
                    Ham
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="%s" value="Beef">
                <label class="form-check-label" for="topping-beef">
                    Beef
                </label>
            </div><bR>',$sizecount,$sizecount,$sizecount,$typecount,$typecount,$typecount,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping,$topping);
		
			

			}

			if($count > 0){
				echo '<button type="submit" class="btn btn-primary">Submit</button>
						</form>';
			}
			
		
			?>
		
</div>
            

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
