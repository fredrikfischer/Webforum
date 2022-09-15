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
    <script defer src="..\js\login script.js"></script>
    <link rel="stylesheet" href="..\css\style.css">
    <title>Call JS Function</title>

</head>
<body>


    <header>    
    <a href="home.php" id='Fischers-forum'><h1>Fischer's Forum</h1></a>
        <nav>
            <form class='redirect' method='POST' action='signup.php'>
                    <button>signup</button>
            </form>
        </nav>
    </header>

    
     <div class='logsign-box'>
<?php echo "<form id='loginForm' class='logsign-formbox' id=loginForm method='POST' action='".getUserLogin()."'>";?>
            <h1>Login</h1>
            <div class='form-control'>
        <label for='username'>Username:</label><br>
        <input type='text' name='username' id='loginUsername'><br>
        <small>Error message</small><br>
        </div>

        <div class='form-control'>
        <label for='username'>Password:</label><br>
        <input type='password' name='password' id='loginPassword'><br>
        <small>Error message</small><br>
        </div>

        <button type='submit' name='userLogin'>Login</button>
        
    </form>
    </div>
    

</body>
</html>