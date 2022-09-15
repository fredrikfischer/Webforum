<?php

function setUserSignup() {
   if(isset($_POST['userSubmit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordMatch = $_POST['passwordMatch'];
    $date = $_POST['date']; 

    /*salt and hash*/
    $salt = hash('sha3-256', rand());
    $saltedpass = $password.$salt;
    $passhash = hash('sha3-256', $saltedpass);

    /*validate form on server side*/
    $validationbool = false;
    if (trim($username) === '' || trim($username) === null ) {
        echo "<p id='errortext'>Username can not be blank</p>";
    }  elseif(checkIfUsernameExists($username)){
        echo "<p id='errortext'>This username already exists</p>";
    }else{

    }
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p id='errortext'>Invalid email format</p>";
      }elseif(checkIfEmailExists($email)){
        echo "<p id='errortext'>This email already exists</p>";
    } elseif (strlen(trim($password)) < 8) {
        echo "Password needs to be 8 characters or longer";
        } elseif(!($password === $passwordMatch)){
            echo "Passwords does not match";
        }else{
            $validationbool = true;
        }


        if($validationbool === false) {
        
        } else { 
        addUserToDb($username,$email,$passhash,$salt,$date);
        echo "Sign Up Successful!";
        header('location: login.php');
        }
    } 
      
}

function checkIfUsernameExists($username) {
    $db = new SQLite3('../db/databas ind.db');
    $sql = "SELECT * FROM users WHERE username=:username";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_TEXT);
    
    if($row['username']===$username){
        return true;
    }else{
        return false;
    } 
}

function checkIfEmailExists($email) {

    $db = new SQLite3('..\db\databas ind.db');
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_TEXT);
    
    if($row['email']===$email){
        return true;
    }else return false;

}

function addUserToDb($username,$email,$passhash,$salt,$date){

    $db = new SQLite3('..\db\databas ind.db');
    
    $sql = "INSERT INTO 'users' ('username','email','password','salt','date') VALUES (:username,:email,:password,:salt,:date)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username,SQLITE3_TEXT);
    $stmt->bindParam(':email',$email,SQLITE3_TEXT);
    $stmt->bindParam(':password',$passhash,SQLITE3_TEXT);
    $stmt->bindParam(':salt',$salt,SQLITE3_TEXT);
    $stmt->bindParam(':date',$date,SQLITE3_TEXT);
    
    
   if($stmt->execute())
    {
        $db->close();
        return true; 
    }
    else
    { 
        $db->close();
        return false;
    }
}


function getUserLogin()
{   {
        if(isset($_POST['userLogin'])) {
            $username = $_POST['username'];
            $loginpassword = $_POST['password'];

            $db = new SQLite3('..\db\databas ind.db');
            $sql = "SELECT * FROM users WHERE username=:username";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username, SQLITE3_TEXT);
            $result=$stmt->execute();
            $row = $result -> fetchArray(SQLITE3_TEXT);
            
            $salt = $row['salt'];
            
            $hashedloginpassword = hash('sha3-256', $loginpassword.$salt);
            $db->close();

            if(!($hashedloginpassword === $row['password'])){
               
               echo "<p id='errortext'>Wrong login credentials</p>";
            } else {
                echo "Login Successfull!";
                $_SESSION['uid'] = $row['uid'];
                
                header("Location: home.php");
                exit();
            }         
        }
    }
}
/*
function setUpdateUser(){
    if(isset($_POST['updateUserSubmit']))  {

        $uid = $_SESSION['uid'];
        echo "hello";
        $username = $_POST['updateUsername'];
      
    
        if (trim($username) === '' || trim($username) === null ) {
            echo "Username can not be blank";
        } elseif ($username == (getUsername($uid))){
            echo "Same Username";
        } else {
            updateUserInDb($uid, $username);
        }
    }

  function updateUserInDb($uid, $username){

    $db = new SQLite3('./db/databas ind.db');
    $sql = "SELECT users SET username=:username WHERE uid=:uid";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    if(!$result=$stmt->execute()){
        echo "error";
    }else{
        echo "sucesss";
    }
  }
}


}*/
