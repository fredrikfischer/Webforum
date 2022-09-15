<?php

function getUsername($uid) {

    $db = new SQLite3('..\db\databas ind.db');

    $sql = "SELECT * FROM users WHERE uid=:uid";

    if(!$stmt=$db->prepare($sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':username', $username, SQLITE3_TEXT);
        
        //run parameters inside database
        $result = $stmt->execute();

        $row = $result->fetchArray(SQLITE3_TEXT);
        return $row['username'];
        
    }   
}



function getEmail($uid) {

    $db = new SQLite3('..\db\databas ind.db');

    $sql = "SELECT * FROM users WHERE uid=:uid";

    if(!$stmt=$db->prepare($sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':email', $password, SQLITE3_TEXT);
        
        //run parameters inside database
        $result = $stmt->execute();

        $row = $result->fetchArray(SQLITE3_TEXT);
        return $row['email'];
        
    }   
}
