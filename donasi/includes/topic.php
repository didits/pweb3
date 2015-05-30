<?php
 
$id = mss($_GET['id']);
$page = (!@$_GET['page'] || @$_GET['page'] < 0) ? "1" : @$_GET['page'];
$page = ceil($page);
 
$limit = 10;
$start = $limit;
$end = $page*$limit-($limit);
 
 if($id){
    $sql = "SELECT * FROM `forum_topics` WHERE `id`='".$id."'";
    $res = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($res) == 0){
        echo "This topic does not exist!";
    }else {
        $row = mysql_fetch_assoc($res);
        $sql2 = "SELECT admin FROM `forum_sub_cats` WHERE `id`='".$row['cid']."'";
        $res2 = mysql_query($sql2) or die(mysql_error());
        $row2 = mysql_fetch_assoc($res2);
        if($row2['admin'] == 1 && $admin_user_level == 0){
            echo "You cannot view this topic!";
        }else {
            $a = (isa($row['uid'])) ? "<font style=\"color:#800000;\">ADMIN</font>" : "";
            echo "<table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\">\n";
            echo "<tr><td colspan=\"2\" align=\"left\" class=\"topic_forum_header\"><b>".$row['title']."</b> - Posted On: <em>".$row['date']."</em></td></tr>\n";
            echo "<tr><td align=\"left\" width=\"15%\" valign=\"top\" class=\"forum_header\">".uid($row['uid'], true)."<br>Post Count: ".post($row['uid'])."<br>".$a."</td>";
            echo "<td align=\"left\" valign=\"top\" class=\"forum_header\">\n";
            echo topic($row['message']);
            echo "</td>\n";
            echo "</tr>\n";
            $amount_check = "SELECT * FROM `forum_replies` WHERE `tid`='".$id."'";
            $amount_check_res = mysql_query($amount_check) or die(mysql_error());
            $amount_count = mysql_num_rows($amount_check_res);
            $pages = ceil($amount_count/$limit);
            
            $previous = ($page-1 <= 0) ? "&laquo; Prev" : "<a href=\"./forum.php?act=topic&id=".$id."&page=".($page-1)."\">&laquo; Prev</a>";
            $nextpage = ($page+1 > $pages) ? "Next &raquo;" : "<a href=\"./forum.php?act=topic&id=".$id."&page=".($page+1)."\">Next &raquo;</a>";
            echo "<tr><td align=\"right\" colspan=\"2\" class=\"forum_header\">\n";
            echo "Pages: ";
            echo $previous;
            for($i=1;$i<=$pages;$i++){
                $href = ($page == $i) ? " ".$i." " : " <a href=\"./forum.php?act=topic&id=".$id."&page=".$i."\">".$i."</a> ";
                
                echo $href;
            }
            echo $nextpage;
            echo "</td></tr>\n";
            $select_sql = "SELECT * FROM `forum_replies` WHERE `tid`='".$id."' ORDER BY id ASC LIMIT ".$end.",".$start."";
            $select_res = mysql_query($select_sql) or die(mysql_error());
            echo "</table>\n";
            echo "<table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\" class=\"reply\">\n";
            while($rowr = mysql_fetch_assoc($select_res)){
                $b = (isa($rowr['uid'])) ? "<font style=\"color:#800000;\">ADMIN</font>" : "";
                echo "<tr><td colspan=\"2\" align=\"left\" class=\"forum_header\">Posted On: <em>".$rowr['date']."</em></td></tr>\n";
                echo "<tr><td align=\"left\" width=\"15%\" valign=\"top\" class=\"forum_header\">".uid($rowr['uid'], true)."<br>Post Count: ".post($rowr['uid'])."<br>".$b."</td>";
                echo "<td align=\"left\" valign=\"top\" class=\"forum_header\">\n";
                echo topic($rowr['message']);
                if($rowr['edit_time'] > 0){
                    echo "<tr><td colspan=\"2\" align=\"right\"><em>Last Edit: ".date("M d, Y",$rowr['edit_time']) . " at " . date("h:i:s",$rowr['edit_time'])."</em></td></tr>\n";
                }
                $adminz = isa(@$_SESSION['uid']);
                if($adminz == 1 || $rowr['uid'] == @$_SESSION['uid']){
                    echo "<tr><td align=\"left\" colspan=\"2\"><a href=\"forum.php?act=mod&act2=reply&id=".$rowr['id']."\">Edit This Reply</a></td></tr>\n";
                }
                echo "</td>\n";
                echo "</tr>\n";
            }
            
            echo "<form method=\"post\" action=\"./forum.php?act=reply&id=".$row['id']."\">\n";
            echo "<tr><td colspan=\"2\" align=\"center\"><textarea style=\"width:90%\" name=\"reply\"></textarea><br><input type=\"submit\" name=\"submit\" value=\"Add Reply\" style=\"width:90%\"></td></tr>\n";
            echo "</table>\n";
        }
    }
}else {
    echo "Please view a valid topic!";
}
 
 ?>