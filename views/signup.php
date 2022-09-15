<?php
    session_start();    
    date_default_timezone_set('Europe/Stockholm');
    include '..\inc\signup & login.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script async src="..\js\sign in script.js"></script>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body>

    <header>    
    <a href="home.php" id='Fischers-forum'><h1>Fischer's Forum</h1></a>
        <nav>
                <form class='redirect' method='POST' action='login.php'>
                <button>Login</button>
            </form>
        </nav>
    </header>


    <div class='logsign-box'>
    <?php  echo "<form id='signInForm' class='logsign-formbox' method='POST' action='".setUserSignup()."'>";?>

            <h1>Sign Up!</h1>

            <div class='form-control'>
            <label for='username'>Username:</label><br>
            <input type='text' name='username' id='signInUsername'><br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='email'>Email:</label><br>
            <input type='text' name='email' id='email'> <br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='password'>Password:</label><br>
            <input type='password' name='password' id='password'><br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='passwordMatch'>Retype Password:</label><br>
            <input type='password' name='passwordMatch' id='passwordMatch'><br>
            <small>Error message</small><br>
            </div>

        <?php echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";?>

            <button type='submit' name='userSubmit'>Submit</button>

            
    </form>
    </div>
    

</body>
</html>