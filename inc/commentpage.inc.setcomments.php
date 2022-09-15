<?php
session_start();

$uid = $_SESSION['uid'];
$tid = $_POST['tid'];
$date = $_POST['date'];
$comment = $_POST['comment'];

if($comment === '' || $comment === null) {
    
} else {     
    $db = new SQLite3('..\db\databas ind.db');

    $sql = "INSERT INTO comments (tid, uid, date, comment) 
    VALUES (:tid,:uid,:date,:comment)";

    if(!$stmt=$db->prepare($sql)) {
        echo "SQL statement failed";
    } else {
        
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':tid', $tid, SQLITE3_TEXT);
        $stmt->bindParam(':date', $date, SQLITE3_TEXT);
        $stmt->bindParam(':comment', $comment, SQLITE3_TEXT);
        
        if(!$stmt->execute()) {
            echo 0;
            $db->close();
        } else {
            echo 1; 
            $db->close();
        }  
    }
}



