<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ip_ass2');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$email = $password="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an Email ID.";
    } else{
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);


            if(mysqli_stmt_execute($stmt)){

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

        $password = trim($_POST["password"]);

        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password );

            $param_email = $email;
            $param_password=$password;
            if(mysqli_stmt_execute($stmt)){
                header("location: 2a.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2A</title>
    <link rel="stylesheet" href="2a.css">
</head>
<body>
    <div class='navbar'>
        <a href="" >BlogPoint</a>
        <div class='navlinks'>
            <a href="">Home</a>
            <a href="#blogs">Featured Blogs</a>
            <a href="/feed">Feed</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
    <div id="form_div">
        <p class="header">SIGNUP FORM</p>
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate();">
          <input type="text" name="email" id="email" placeholder="Enter Email">
          <input type="password" name="password" id="password" placeholder="********">
          <button type="submit" >Submit</button>
         </form>
        <p id="form_note">Password Must Be At Least 8 Digits Long And Contains One UpperCase, One LowerCase And One Special Character</p>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="2a.js"></script>
</body>
</html>