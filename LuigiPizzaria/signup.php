
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
				background-image: url("https://img.grouponcdn.com/deal/jDmXdNLkoWAkG4E4s1ev/cA-800x480/v1/c700x420.jpg");
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

<?php $dbc = mysqli_connect('localhost', 'Chase', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() ); ?>
<?php




			if (isset($_REQUEST['name'])){

			$cookie_duration = 3600 * 24;


			$name = $_REQUEST["name"];
			$email = $_REQUEST["email"];
			$phone = $_REQUEST["phone"];
			$address = $_REQUEST["address"];
			$city = $_REQUEST["city"];
			$state = $_REQUEST["state"];
			$zip = $_REQUEST["zip"];
			$password = $_REQUEST["password"];

			// Create New User
            $sql = "INSERT INTO users (title,name, email, c_phone, address, city, state, zip_code, password) VALUES (\"Customer\",\"$name\", \"$email\", \"$phone\", \"$address\", \"$city\", \"$state\", \"$zip\", SHA2('$password',512))";
        
            if (mysqli_query($dbc, $sql))
            {
                echo "New record created successfully USER";
				
            } else
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
            }


			$q = sprintf("SELECT * FROM users WHERE name = '%s'", $name);
			$r = mysqli_query($dbc, $q);
    
			if ($r)
			{
			$row = mysqli_fetch_array($r);
				if ($row)
				{
            setcookie('user_id', $row['id'], time() + $cookie_duration);
			setcookie('user_name', $name, time() + $cookie_duration);
			setcookie('user_type', $row['title'], time() + $cookie_duration);			

			header('Location: home.php');
			exit();
			

				}
			}




			mysqli_close($dbc);

			}
?>

<div class="hero-image">
			<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-12">
					<h1 class="text-center" style="color: black ;font-size: 100px;">Sign Up</h1>
				</div>
			</div>
			</div>
		</div>


<div class="container mt-5 mb-5">
			<form method="get">
				<div class="row">
					<div class="col-12 col-sm-6">
						<label>Name</label>
						<input class="form-control" type="text" name="name" id="name" placeholder="Name" required />
					</div>
					<div class="col-12 col-sm-6">
						<label>Email Address</label>
						<input class="form-control" type="email" name="email" placeholder="name@example.com" required />
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-sm-6">
						<label>Phone Number</label>
						<input class="form-control" type="tel" name="phone" placeholder="Phone" required />
					</div>
					<div class="col-12 col-sm-6">
						<label>Address</label>
						<input class="form-control" type="text" name="address" placeholder="Address" required />
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-sm-6">
						<label>City</label>
						<input class="form-control" type="text" name="city" placeholder="City" required />
					</div>
					<div class="col-12 col-sm-6">
						<label>State</label>
						<select name="state" id="state" class="form-control" required>
							<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
						</select>
					</div>
				</div>
				<div class="row mt-3">
				<div class="col-12 col-sm-6">
						<label>Zipcode</label>
						<input class="form-control" type="text" name="zip" placeholder="Zipcode" required />
					</div>
				<div class="col-12 col-sm-6">
					</div>
				</div>
				
			<div class="row mt-3">
					<div class="col-12 col-sm-6">
						<label>Password</label>
						<input class="form-control" type="password" name="password" required />
					</div>
					<div class="col-12 col-sm-6">
						<label>Confirm Password</label>
						<input class="form-control" type="password" name="confirmpassword" required />
					</div>
				</div>
				<input class="btn btn-primary mb-2" type="submit" value="Sign Up">
			</form>



</body>
</html>