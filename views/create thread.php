<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '..\inc\set & get thread.inc.php';

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
   /*$username = getUsername($_SESSION['uid'], $conn);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
     <script defer src="..\js\create thread.js"></script>  
    <!-- <script defer src="comment script.js"></script> -->
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

<div class='container'>
        <div class='header'>
            <h2>Create a Thread</h2>
        </div>
        <?php echo "<form id='commentForm' class='form' method='POST' enctype='multipart/form-data' action='".setThread()."'>";?>
            

            <div class='form-control'>
                <label for='topic'>Topic</label> <br> 
                <input name='topic' id='topic' placeholder='Topic'></textarea>
                <small>Error message</small>
            </div>

            <div class='form-control'>
                <label for='comment'>Write text here</label> <br> 
                <textarea name='threadText' id='threadText' placeholder='Text goes here...'></textarea>
                <small>Error message</small>
            </div>

            <div class='form-control'>
                <label for='image'>Upload an image</label> <br> 
                <p class="xx-smalltext">    Allowed file formats: png, gif, jpeg, jpg</p>
                <input  id='fileinput' type="file" name="image" class="form-control"/>          
                <small id="fileError">Error message</small>
            </div>

            
            <?php echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";?>
            
            <button type ='submit' name='threadSubmit' id='threadSubmit'>Submit</button>
        </form>
        </div>
  
        <div class='comment-container'>
</div>
</body>
</html>

<!--<input type="text" placeholder="Comment" id="comment"/>-->