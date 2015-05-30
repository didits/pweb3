<?php
error_reporting(0);
session_start();
include "./connect.php";

echo "<title>Login</title>\n";

if (@$_SESSION['uid']) {
    echo "You are already logged in, if you wish to log out, please <a href=\"./logout.php\">click here</a>!\n";
} else {

    if (!@$_POST['submit']) {
        echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
        echo "<form method=\"post\" action=\"./login.php\">\n";
        echo "<tr><td>Username</td><td><input type=\"text\" name=\"username\"></td></tr>\n";
        echo "<tr><td>Password</td><td><input type=\"password\" name=\"password\"></td></tr>\n";
        echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Login\"></td></tr>\n";
        echo "</form></table>\n";
    }else {
        $user = mss($_POST['username']);
        $pass = $_POST['password'];
        
            if($user && $pass){
                $sql = "SELECT id FROM `users` WHERE `username`='".$user."'";
                $res = mysql_query($sql) or die(mysql_error());
                if(mysql_num_rows($res) > 0){
                    $sql2 = "SELECT id FROM `users` WHERE `username`='".$user."' AND `password`='".md5($pass)."'";
                    $res2 = mysql_query($sql2) or die(mysql_error());
                    if(mysql_num_rows($res2) > 0){
                        $row = mysql_fetch_assoc($res2);
                        $_SESSION['uid'] = $row['id'];
                        
                        echo "You have successfully logged in as " . $user . "<br><br><a href=\"./index.php\">Proceed to the Forum Index</a>\n";
                    }else {
                        echo "Username and password combination are incorrect!\n";
                    }
                }else {
                    echo "The username you supplied does not exist!\n";
                }
            }else {
                echo "You must supply both the username and password field!\n";
            }
    }

}

?>