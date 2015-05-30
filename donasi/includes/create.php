<?php

if(!$_SESSION['uid']){
    header("Location: forum.php");
}

$id = mss($_GET['id']);

if ($id) {
    $sql = "SELECT * FROM `forum_sub_cats` WHERE `id`='" . $id . "'";
    $res = mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($res) == 0) {
        echo "The forum you are trying to create a topic on, does not exist!\n";
    } else {
        $row1 = mysql_fetch_assoc($res);
        if ($row1['admin'] == 1 && $admin_user_level == 0) {
            echo "You are not an administrator, therefore you cannot post on this forum!\n";
        } else {
            if (!@$_POST['submit']) {
                echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
                echo "<form method=\"post\" action=\"./forum.php?act=create&id=".$id."\">\n";
                echo "<tr><td>Forum Sub Category</td><td><select name=\"cat\">\n";
                $sql2 = "SELECT * FROM `forum_cats` WHERE `admin` < " . $admin_user_level . "+1";
                $res2 = mysql_query($sql2) or die(mysql_error());
                while ($row = mysql_fetch_assoc($res2)) {
                    $sql3 = "SELECT * FROM `forum_sub_cats` WHERE `cid`='" . $row['id'] . "'";
                    $res3 = mysql_query($sql3) or die(mysql_error());

                    echo "<option value=\"0\">" . $row['name'] . "</option>\n";
                    while ($row2 = mysql_fetch_assoc($res3)) {
                        $selected = ($row2['id'] == $id) ? " SELECTED" : "";
                        echo "<option value=\"" . $row2['id'] . "\"" . $selected .
                            ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row2['name'] . "</option>\n";
                    }
                }
                echo "</select></td></tr>\n";
                echo "<tr><td>Topic Title</td><td><input type=\"text\" name=\"title\"></td></tr>\n";
                echo "<tr><td>Message</td><td><textarea name=\"message\" style=\"width:300px;height:100px;\"></textarea></td></tr>\n";
                echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Create Topic\"></td></tr>\n";
                echo "</form></table>\n";
            } else {
                $cat = mss($_POST['cat']);
                $title = mss($_POST['title']);
                $msg = mss($_POST['message']);

                if ($cat && $title && $msg) {
                    $sql = "SELECT admin FROM `forum_sub_cats` WHERE `id`='" . $cat . "'";
                    $res = mysql_query($sql) or die(mysql_error());
                    if (mysql_num_rows($res) == 0) {
                        echo "This forum sub category does not exist!\n";
                    } else {
                        $row = mysql_fetch_assoc($res);
                        if ($row['admin'] == 1 && $admin_user_level != 1) {
                            echo "You are not an admin therefore you cannot post a new topic on this forum!\n";
                        } else {
                            if (strlen($title) < 3 || strlen($title) > 32) {
                                echo "The title must be between 3 and 32 characters!\n";
                            } else {
                                if (strlen($msg) < 3 || strlen($msg) > 10000) {
                                    echo "The message must be between 3 and 10,000 characters!\n";
                                } else {
                                    $date = date("m-d-y") . " at " . date("h:i:s");
                                    $time = time();
                                    $sql2 = "INSERT INTO `forum_topics` (`cid`,`title`,`uid`,`date`,`time`,`message`) VALUES('" .
                                        $cat . "','" . $title . "','" . $_SESSION['uid'] . "','" . $date . "','" . $time .
                                        "','" . $msg . "')";
                                    $res2 = mysql_query($sql2) or die(mysql_error());
                                    $tid = mysql_insert_id();
                                    topic_go($tid);
                                }
                            }
                        }
                    }
                } else {
                    echo "Please supply all the fields!\n";
                }
            }
        }
    }
} else {
    if (!$_POST['submit']) {
        echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
        echo "<form method=\"post\" action=\"./forum.php?act=create\">\n";
        echo "<tr><td>Forum Sub Category</td><td><select name=\"cat\">\n";
        $sql2 = "SELECT * FROM `forum_cats` WHERE `admin` < " . $admin_user_level . "+1";
        $res2 = mysql_query($sql2) or die(mysql_error());
        while ($row = mysql_fetch_assoc($res2)) {
            $sql3 = "SELECT * FROM `forum_sub_cats` WHERE `cid`='" . $row['id'] . "'";
            $res3 = mysql_query($sql3) or die(mysql_error());

            echo "<option value=\"0\">" . $row['name'] . "</option>\n";
            while ($row2 = mysql_fetch_assoc($res3)) {
                $selected = ($row2['id'] == $id) ? " SELECTED" : "";
                echo "<option value=\"" . $row2['id'] . "\"" . $selected .
                    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row2['name'] . "</option>\n";
            }
        }
        echo "</select></td></tr>\n";
        echo "<tr><td>Topic Title</td><td><input type=\"text\" name=\"title\"></td></tr>\n";
        echo "<tr><td>Message</td><td><textarea name=\"message\" style=\"width:300px;height:100px;\"></textarea></td></tr>\n";
        echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Create Topic\"></td></tr>\n";
        echo "</form></table>\n";
    } else {
        $cat = mss($_POST['cat']);
        $title = mss($_POST['title']);
        $msg = mss($_POST['message']);

        if ($cat && $title && $msg) {
            $sql = "SELECT admin FROM `forum_sub_cats` WHERE `id`='" . $cat . "'";
            $res = mysql_query($sql) or die(mysql_error());
            if (mysql_num_rows($res) == 0) {
                echo "This forum sub category does not exist!\n";
            } else {
                $row = mysql_fetch_assoc($res);
                if ($row['admin'] == 1 && $admin_user_level != 1) {
                    echo "You are not an admin therefore you cannot post a new topic on this forum!\n";
                } else {
                    if (strlen($title) < 3 || strlen($title) > 32) {
                        echo "The title must be between 3 and 32 characters!\n";
                    } else {
                        if (strlen($msg) < 3 || strlen($msg) > 10000) {
                            echo "The message must be between 3 and 10,000 characters!\n";
                        } else {
                            $date = date("m-d-y") . " at " . date("h:i:s");
                            $time = time();
                            $sql2 = "INSERT INTO `forum_topics` (`cid`,`title`,`uid`,`date`,`time`,`message`) VALUES('" .
                                $cat . "','" . $title . "','" . $_SESSION['uid'] . "','" . $date . "','" . $time .
                                "','" . $msg . "')";
                            $res2 = mysql_query($sql2) or die(mysql_error());
                            $tid = mysql_insert_id();
                            header("Location: forum.php?act=topic&id=" . $tid . "");
                        }
                    }
                }
            }
        } else {
            echo "Please supply all the fields!\n";
        }
    }
}
?>