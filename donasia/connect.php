<?php
mysql_connect("localhost","root","") or die("Tidak bisa connect ke database");
mysql_select_db("forum") or die("Database tidak ditemukan");

function mss($value){
    return mysql_real_escape_string(trim(strip_tags($value)));
}

function topic_go($id){
    echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?act=topic&id=".$id."\">";
}

function s($value){
    return stripslashes($value);
}

function topic($input){
    // bbcode
    return nl2br(strip_tags(stripslashes(htmlentities(htmlspecialchars($input)))));
}

function uid($uid, $link = FALSE){
    $sql = "SELECT username FROM `users` WHERE `id`='".$uid."'";
    $res = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($res) == 0){
        return "Invalid User";
    }else {
        $row = mysql_fetch_assoc($res);
        if(!$link){
            return $row['username'];
        }else {
            return "<a href=\"/tuts/forum/index.php?act=profile&id=".$uid."\">".$row['username']."</a>";
        }
    }
}

function post($uid){
    $sql = "SELECT * FROM `forum_replies` WHERE `uid`='".$uid."'";
    $res = mysql_query($sql) or die(mysql_error());
    return mysql_num_rows($res);
}

function isa($uid){
    $sql = "SELECT admin FROM `users` WHERE `id`='".$uid."'";
    $res = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_assoc($res);
    return $row['admin'];
}
?>