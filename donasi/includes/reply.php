<?php

if(!$_SESSION['uid']){
    header("Location: forum.php");
}

if(!$_POST['submit']){
    echo "Invalid usage of file";
}else {
    $tid = mss($_GET['id']);
    $msg = mss($_POST['reply']);
    
    if(!$tid){
        echo "You did not supply a topic to add a reply to";
    }else {
        $sql = "SELECT * FROM `forum_topics` WHERE `id`='".$tid."'";
        $res = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($res) == 0){
            echo "This topic does not exist";
        }else {
            $row = mysql_fetch_assoc($res);
            $sql2 = "SELECT admin FROM `forum_sub_cats` WHERE `id`='".$row['cid']."'";
            $res2 = mysql_query($sql2) or die(mysql_error());
            $row2 = mysql_fetch_assoc($res2);
            if($row2['admin'] == 1 && $admin_user_level == 0){
                echo "You do not have sufficient priveleges to add a reply to this topic";
            }else {
                if(!$msg){
                    echo "You did not supply a reply";
                }else {
                    if(strlen($msg) < 10 || strlen($msg) > 10000){
                        echo "Your reply must be between 10 and 10,000 characters!";
                    }else {
                        $date = date("m-d-y") . " at " . date("h:i:s");
                        $time = time();
                        $sql3 = "INSERT INTO `forum_replies` (`tid`,`uid`,`message`,`date`,`time`) VALUES('".$tid."','".$_SESSION['uid']."','".$msg."','".$date."','".$time."')";
                        $res3 = mysql_query($sql3) or die(mysql_error());
                        $sql4 = "UPDATE `forum_topics` SET `time`='".time()."' WHERE `id`='".$tid."'";
                        $res4 = mysql_query($sql4) or die(mysql_error());
                        header("Location: ./forum.php?act=topic&id=".$tid);
                    }
                }
            }
        }
    }
}

?>