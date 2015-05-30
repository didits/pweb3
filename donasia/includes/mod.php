<?php

if(!$_SESSION['uid']){
    header("Location: forum.php");
}

$actz = $_GET['act2'];
$actzz = array('reply','topic','admin');

if($actz){
    $admin = isa($_SESSION['uid']);
    
    if($actz == 'admin'){
        if($admin){
            //
        }else {
            echo "You are not an administrator, so you cannot view this page!";
        }
    }
    
    if($actz == 'reply'){
        $id = mss($_GET['id']);
        if($id){
            $sql = "SELECT * FROM `forum_replies` WHERE `id`='".$id."'";
            $res = mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($res) == 0){
                echo "This topic doesn't exist, so therefore you cannot edit it!";
            }else {
                $row = mysql_fetch_assoc($res);
                $user_id = $row['uid'];
                
                if($user_id == $_SESSION['uid'] || $admin == 1){
                    if(!@$_POST['submit']){
                        echo "<form method=\"post\" action=\"forum.php?act=mod&act2=reply&id=".$id."\">\n";
                        echo "<table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\">\n";
                        echo "<tr><td class=\"forum_header\" align=\"center\"><textarea style=\"width:90%;height:200px\" name=\"reply\">".htmlentities($row['message'])."</textarea></td></tr>\n";
                        echo "<tr><td class=\"forum_header\" align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Edit This Reply\"></td></tr>\n";
                        echo "</table></form>\n";
                    }else {
                        $reply = mss($_POST['reply']);
                        if($reply){
                            $r = range(10,10000);
                            if(in_array(strlen($reply),$r)){
                                $sql2 = "UPDATE `forum_replies` SET `message`='".$reply."', `edit_time`='".time()."' WHERE `id`='".$id."'";
                                $res2 = mysql_query($sql2) or die(mysql_error());
                                header("Location: forum.php?act=topic&id=".$row['tid']."");
                            }else {
                                echo "Your reply must be between 10 and 10,000 characters in length!\n";
                            }
                        }
                    }
                }else {
                    echo "This is not your reply to edit!";
                }
            }
        }
    }
    
    if($actz == 'topic'){
        
    }
}else {
    header("Location: forum.php");
}