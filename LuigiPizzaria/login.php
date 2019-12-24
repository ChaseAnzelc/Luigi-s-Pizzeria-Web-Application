<html>
<body>


<?php
    $dbc = mysqli_connect('localhost', 'root', '1234', 'termproject') or die('Could not connect to MySQL ' . mysqli_connect_error() );
    $cookie_duration = 3600 * 24;
    $email = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $q = sprintf("SELECT * FROM users WHERE email = '%s' AND password = SHA2('%s', 512)", $email, $password);
    $r = mysqli_query($dbc, $q);
    
    if ($r)
    {
        $row = mysqli_fetch_array($r);
        if ($row)
        {
            setcookie('user_id', $row['id'], time() + $cookie_duration);
            setcookie('user_name', $row['name'], time() + $cookie_duration);
            setcookie('user_type', $row['title'], time() + $cookie_duration);
            header('Location: home.php');
            echo 'Congrat. Successful Login!<p><a href="home.php">Go Home</a>';
        }
        else
        {
            echo "Username and password do not match!<br>";
            echo '<a href="login.html">Try again</a><br>';
        }
    }
    else
    {
        echo "Username is not found<br>";
        echo '<a href="login.html">Try again</a><br>';
    }
    mysqli_close($dbc);
?>

</body>
</html>
