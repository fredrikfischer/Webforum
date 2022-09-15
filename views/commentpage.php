<?php

session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '..\inc\set & get thread.inc.php';
    include '..\inc\getUsernameAndEmail.inc.php';
    include '..\inc\signup & login.inc.php';

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
    $uid = $_SESSION['uid'];
    
    $username = getUsername($uid); //located in getUsernameAndEmail.inc.php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <!-- <script defer src='comment script.js'></script>  -->
     <script defer src='..\js\commentpage.js'></script> 

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
            <form class='form' action="">

            <?php   if($_GET){
        $tid = $_GET['thread']; // print_r($_GET);       
    }else{
      echo "Url has no user";
    }
            getSingleThread($tid) //located in getUsernameAndEmail.inc.php?>

            </form>
        </div>

       
  

        <!--action='".setComments()."'-->


<div class='container'>
        <?php echo "<form id='commentForm' class='form' method='POST'>
       
            <input type='hidden' name='tid'  id='tid' value=$tid />
            <input type='hidden' name='uid'  id='uid' value=$uid />
            <input type='hidden' name='username' placeholder='Enter username' id='username' value=$username />

            <div class='form-control' id='comment-form-control'>
                <label for='comment'>Comment as: $username</label> <br> 
                <textarea name='comment' id='comment' placeholder='Comment Here...'></textarea>
                <small>Comment can not be blank</small>
            </div>

            <input type='hidden' name='date' id='date' value='".date('Y-m-d H:i:s')."'>
            
            <button type='submit' name='commentSubmit' id='commentSubmit'>Submit</button>
        </form>
        </div>
  
            <div class='comment-container' id='comment-container'>";
//getComments($tid);
?>
</div>

</body>
</html>

<!--<input type="text" placeholder="Comment" id="comment"/>-->