<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '..\inc\getUsernameAndEmail.inc.php';
    include '..\inc\set & get thread.inc.php';
    

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
    $username = getUsername($_SESSION['uid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="..\js\comment script.js"></script>
    <link rel="stylesheet" href="..\css\style.css">
</head>
<body>

    <header>    
        
        <a href="home.php" id='Fischers-forum'><h1>Fischer's Forum</h1></a>

        <nav>
        <form class='redirect' method='POST' action='logout.php'>
                <button>Logout</button>
            </form>
            <form class='redirect' method='POST' action='home.php'>
                <button>Home</button>
            </form>
            <form class='redirect' method='POST' action='my profile.php'>
                <button>My Profile</button>
            </form>
            <form class='redirect' method='POST' action='create thread.php'>
                <button>Create Thread</button>
            </form>
            
        </nav>
    </header>

        <?php 
        
        getThreads($username);
        
        ?>
    
</body>
</html>