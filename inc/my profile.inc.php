<?php
 

  /*For Username*/
function setUpdateUsername(){

           
            $usernameError = '';

            if(isset($_POST['usernameUpdateSubmit'])){
            $uid = $_SESSION['uid'];
            $updatedUsername = $_POST['updatedUsername'];
          
      
            if (trim($updatedUsername) === '' || trim($updatedUsername) === null ) {
                return "Username can not be blank";
            } elseif ($updatedUsername == getUsername($uid)){
                return "Same Username";
               
             } elseif (CheckIfUsernameExists($updatedUsername)){
            return "This username already exists";
            }else {
                updateUsernameInDb($uid, $updatedUsername);
                header('location:my profile.php');
            }

            
        }
    }
    
        function updateUsernameInDb($uid, $updatedUsername){

            $db = new SQLite3('../db/databas ind.db');
            $sql = "UPDATE users SET username=:username WHERE uid=:uid";
        
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
            $stmt->bindParam(':username', $updatedUsername, SQLITE3_TEXT);
            if(!$result=$stmt->execute()){
                echo "error";
            }else{
                echo "sucesss";   
            }
          }

           /*For Username*/
function setUpdateEmail(){

            if(isset($_POST['emailUpdateSubmit'])){
            $uid = $_SESSION['uid'];
            $updatedEmail = $_POST['updatedEmail'];
       
            if (trim($updatedEmail) === '' || trim($updatedEmail) === null ) {
                return "Email can not be blank";
            } elseif ($updatedEmail == getEmail($uid)){
                return "Same Email";
            }elseif (CheckIfEmailExists($updatedEmail)){
                return "This email already exists";
            }elseif (!filter_var($updatedEmail, FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format";
            } else {
                updateEmailInDb($uid, $updatedEmail);
                header('location:my profile.php');
            }

            
        }
    }

function updateEmailInDb($uid, $updatedEmail){

        $db = new SQLite3('../db/databas ind.db');
        $sql = "UPDATE users SET email=:email WHERE uid=:uid";
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':email', $updatedEmail, SQLITE3_TEXT);
        if(!$result=$stmt->execute()){
            echo "error";
        }else{
            echo "success";   
        }
      }
      
function setUpdatePassword(){

        if(isset($_POST['passwordUpdateSubmit'])){
        $uid = $_SESSION['uid'];
        $updatedPassword = $_POST['updatedPassword'];
        $updatedPasswordMatch = $_POST['updatedPasswordMatch'];
        $passwordValidationBool = false;
        $passwordMatchValidationBool = false;

        $salt = hash('sha3-256', rand());
        $saltedpass = $updatedPassword.$salt;
        $passhash = hash('sha3-256', $saltedpass);
    
   
        if (trim($updatedPassword) === '' || trim($updatedPassword) === null ) {
            return "Password can not be blank";
        }elseif (strlen(trim($updatedPassword)) < 8) {
            return "Password needs to be 8 characters or longer";
            } else{
                $passwordValidationBool = true;
            }

            if(!($updatedPassword == $updatedPasswordMatch)){
                return "Passwords does not match";
            } else {
                $passwordMatchValidationBool = true;
            }

            if($passwordValidationBool === true && $passwordMatchValidationBool === true){
                updatePasswordInDb($uid, $updatedPassword);
                header('location:my profile.php');
            }else{
                echo"error";
            }



        }
    }

function updatePasswordInDb($uid, $updatedPassword){

        
        $db = new SQLite3('../db/databas ind.db');
        $sql = "UPDATE users SET password=:password, salt=:salt WHERE uid=:uid";

        // salt and hash

        $salt = hash('sha3-256', rand());
        $saltedpass = $updatedPassword.$salt;
        $passhash = hash('sha3-256', $saltedpass);
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':password', $passhash, SQLITE3_TEXT);
        $stmt->bindParam(':salt', $salt, SQLITE3_TEXT);
        if(!$result=$stmt->execute()){
            echo "error";
        }else{
            echo "success";   
        }
      }

      

