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
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
				opacity: .7;
			}

h3{font-size:36px;}

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
                        echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>






	<div class="hero-image">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
  				<div class="col-12">
					<h1 class="text-center" style="font-size: 100px; font-family: Arial; color: black">Luigi's Pizzeria</h1>
					<p class="text-center" style="font-size: 25px; font-family: Arial; color: white"> Homemade Fresh Original Authenic Pizza</p>
				</div>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="row mt-5">
				<div class="col-12 col-sm-6">
					<div class="card">
						<a href="placeorder.php" class="btn text-center">
							<h3>Place an Order</h3>
						</a>
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="card">
						<a href="pastorders.php" class="btn text-center">
							<h3>View Past Orders</h3>
						</a>
					</div>
				</div>
			</div>
		</div>
	
	
	

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
