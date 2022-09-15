<?php
    session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '..\inc\getUsernameAndEmail.inc.php';
    include '..\inc\set & get thread.inc.php';
    include '..\inc\signup & login.inc.php'; //for checking if username exists
    include '..\inc\my profile.inc.php';

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
    $uid = $_SESSION['uid'];
    $username = getUsername($_SESSION['uid']);
    $email = getEmail($_SESSION['uid']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script type="text/javascript" src="my profile script.js"></script> -->
     <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
     <script async src="..\js\my profile script.js"></script> 
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
            <h2>Update User Information</h2>
        </div>

            <form id="myProfileForm" class='form' method="POST" >

            <input type='hidden' name='uid'  id='tid' value="uid" />
          
            <div class='form-control' id='myprofile'>
               
                        <label for='updateUsername'>Username</label> <br> 
                        <?php echo"<input type='hidden' name='currentUsername' placeholder='Enter username' id='currentUsername' value=$username />";?>
                        <?php echo"<input type='text' name='updatedUsername' placeholder='Enter username' id='updateUsername' value=$username />";?>
                        <?php echo "<button type='submit' name='usernameUpdateSubmit' id='usernameUpdateSubmit' action='".($usernameError = setUpdateUsername())."'>Submit</button>";?>
                        <?php echo "<div id='errorMessage-myprofile'>$usernameError</div>"?> 
                        <small>Error message</small><br>
                
                        
                </div>
            
             <div class='form-control' id='myprofile'>
           
                    <label for='comment'>Email</label> <br> 
                    <?php echo"<input type='hidden' name='currentEmail' placeholder='Enter email' id='currentEmail' value=$email />";?>
                    <?php echo" <input type='text' name='updatedEmail' placeholder='Enter Email' id='updatedEmail' value=$email />";?>
                    <?php echo "<button type='submit' name='emailUpdateSubmit' id='emailUpdateSubmit' action='".($emailError=setUpdateEmail())."'>Submit</button>";?>
                    <?php echo "<div id='errorMessage-myprofile'>$emailError</div>"?> 
                    <small>Error message</small><br>
               
            </div>
            <div class='form-control' id='myprofile'>
                <label for='comment'>Password</label> <br> 
                <input type='password' name='updatedPassword' placeholder='Change Password' id='updatedPassword' value='' />
                <?php echo "<button type='submit' name='passwordUpdateSubmit' id='updatedPasswordSubmit' action='".($passwordError = setUpdatePassword())."'>Submit</button>";?>
                <?php echo "<div id='errorMessage-myprofile'>".$passwordError."</div>"?> 
                <small>Error message</small><br>
            </div>

            <div class='form-control' id='myprofile'>
                <label for='comment'>Match Password</label> <br> 
                <input type='password' name='updatedPasswordMatch' id='updatedPasswordMatch' placeholder='Match Password' id='passwordMatch' value='' />
                 <?php echo "<div id='errorMessage-myprofile'>".$passwordError."</div>"?>  
                 <small>Error message</small><br>
            </div>
            
            
        </form>
        </div>

                        
</div>
                    
</body>
</html>