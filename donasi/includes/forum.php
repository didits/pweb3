<?php

$id = mss($_GET['id']);

if($id){
    $sql = "SELECT * FROM `forum_sub_cats` WHERE `id`='".$id."'";
    $res = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($res) == 0){
        echo "The forum category you supplied does not exist!\n";
    }else {
        $row = mysql_fetch_assoc($res);
        if($row['admin'] == 1 && $admin_user_level == 0){
            echo "You must be an administrator to view this forum!\n";
        }else {
            $sql2 = "SELECT * FROM `forum_topics` WHERE `cid`='".$row['id']."' ORDER BY time DESC";
            $res2 = mysql_query($sql2) or die(mysql_error());
            if(mysql_num_rows($res2) == 0){
                echo "There are no topics in this forum, <a href=\"./forum.php?act=create&id=".$row['id']."\">click here</a> to create a topic!\n";
            }else {
                echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\" width=\"100%\">\n";
                echo "<tr><td colspan=\"4\" align=\"right\"><a href=\"./forum.php?act=create&id=".$row['id']."\">create a topic</a></td></tr>\n";
                echo "<tr align=\"center\"><td class=\"forum_header\">Title</td><td class=\"forum_header\">User</td><td class=\"forum_header\">Date Created</td><td class=\"forum_header\">Replies</td></tr>\n";
                while($row2 = mysql_fetch_assoc($res2)){
                    $sql3 = "SELECT count(*) AS num_replies FROM `forum_replies` WHERE `tid`='".$row2['id']."'";
                    $res3 = mysql_query($sql3) or die(mysql_error());
                    $row3 = mysql_fetch_assoc($res3);
                    echo "<tr align=\"center\"><td><a href=\"./forum.php?act=topic&id=".$row2['id']."\">".s($row2['title'])."</a></td><td>".uid($row2['uid'])."</td><td>".$row2['date']."</td><td>".$row3['num_replies']."</td></tr>\n";
                }
                echo "</table>\n";
            }
        }
    }
}else {
    echo "Please supply a category ID!\n";
}

?>