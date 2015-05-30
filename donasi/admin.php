<?php
session_start();
include "./connect.php";
?>
<html>

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Responsive Business website template</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>
      <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <script language="Javascript">
         function confirmLogout()
         {
            var agree = confirm("Are you sure you wish to logout?");   
            if (agree)
            {
               return true ;
            }
            else 
            {
               return false ;
            }
         }
      </script>
   </head>
   <body class="size-960">
      <header>
         <div class="line">
            <nav class="margin-bottom">
               <p class="nav-text">Custom menu text</p>
               <div class="top-nav s-12 l-10">
                  <ul>
                     <li><a>Home</a></li>
                     <li><a>Product</a>
                     </li>
                     <li><a>Company</a></li>
                     <li><a>Contact</a></li>
                  </ul>
               </div>
               <div class=" hide-s l-2">
                  <i class="icon-facebook_circle icon2x right padding"></i>
               </div>
            </nav>
         </div>
      </header>
    <section>
    <center>
        <div class="line">
            <div class="margin">
                <div class="s-12 margin-bottom" id="holder">
                    <div id="userInfo" class="box">
                        <?php
                
                            if($_SESSION['uid']){
                                $sql = "SELECT * FROM `users` WHERE `id`='".$_SESSION['uid']."'";
                                $res = mysql_query($sql) or die(mysql_error());
                                
                                if(mysql_num_rows($res) == 0){
                                    session_destroy();
                                    echo "Please <a href=\"./login.php\">Login</a> to your account, or <a href=\"./register.php\">Register</a> a new account!\n";
                                }else {
                                    $row = mysql_fetch_assoc($res);
                                    echo "Welcome back, <a href=\"./forum.php?act=profile&id=".$row['id']."\">".$row['username']."</a>! <a href=\"./logout.php\" onClick=\"return confirmLogout()\">Logout</a>\n";
                                    echo "<br>\n";
                                    echo "<a href=\"./forum.php\">Forum Index</a>\n";
                                    if($row['admin'] == '1'){
                                        echo " | <a href=\"./admin.php\">Administrative Section</a>\n";
                                    }
                                }
                            }else {
                                echo "Please <a href=\"./login.php\">Login</a> to your account, or <a href=\"./register.php\">Register</a> a new account!\n";
                            }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="margin-bottom">
            <div id="content" class="box">
                <?php
                    if($_SESSION['uid']){
                        $sql3 = "SELECT admin FROM `users` WHERE `id`='".$_SESSION['uid']."'";
                        $res3 = mysql_query($sql3) or die(mysql_error());
                        if(mysql_num_rows($res) == 0){
                            echo "Please login to your account!\n";
                        }else {
                            $row2 = mysql_fetch_assoc($res3);
                            if($row2['admin'] != '1'){
                                echo "You are not allowed to be here!\n";
                            }else {
                                $act = @$_GET['act'];
                                $acts = array('create_cat','create_subcat');
                                $actions = array('create_cat' => 'Create Forum Category','create_subcat' => 'Create Forum Sub Category');
                                
                                $x=1;
                                $c = count($actions);
                                foreach($actions AS $url => $link){
                                    $bull = ($x == $c) ? "" : " &bull; ";
                                    
                                    echo "<a href=\"./admin.php?act=".$url."\">".$link."</a>" . $bull . "\n";
                                    
                                    $x++;
                                }
                                
                                echo "<br><br>\n";
                                
                                if(!$act || !in_array($act,$acts)){
                                    echo "Please choose an option from above to continue!\n";
                                }else {
                                    if($act == 'create_cat'){
                                        if(!@$_POST['submit']){
                                            echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
                                            echo "<form method=\"post\" action=\"./admin.php?act=create_cat\">\n";
                                            echo "<tr><td>Category Name</td><td><input type=\"text\" name=\"name\"></td></tr>\n";
                                            echo "<tr><td>Admin Only?</td><td><input type=\"checkbox\" name=\"admin\" value=\"1\"></td></tr>\n";
                                            echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Create Forum Category\"></td></tr>\n";
                                            echo "</form></table>\n";
                                        }else {
                                            $name = mss($_POST['name']);
                                            $admin = @$_POST['admin'];
                                            
                                            if($name){
                                                if(strlen($name) < 3 || strlen($name) > 32){
                                                    echo "The category name must be between 3 and 32 characters!\n";
                                                }else {
                                                    $sql4 = "SELECT * FROM `forum_cats` WHERE `name`='".$name."'";
                                                    $res4 = mysql_query($sql4) or die(mysql_error());
                                                    if(mysql_num_rows($res4) > 0){
                                                        echo "The category name already exists!\n";
                                                    }else {
                                                        $admin_check = ($admin == '1') ? "1" : "0";
                                                        $sql5 = "INSERT INTO `forum_cats` (`name`,`admin`) VALUES('".$name."','".$admin_check."')";
                                                        $res5 = mysql_query($sql5) or die(mysql_error());
                                                        echo "The forum category <b>" . $name ."</b> has been successfully added!\n";
                                                    }
                                                }
                                            }else {
                                                echo "You must supply a category name!\n";
                                            }
                                        }
                                    }
                                    
                                    if($act == 'create_subcat'){
                                        if(!@$_POST['submit']){
                                            echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">\n";
                                            echo "<form method=\"post\" action=\"./admin.php?act=create_subcat\">\n";
                                            echo "<tr><td>Forum Category</td><td><select name=\"cat\"><option value=\"0\">Please choose...</option>\n";
                                            
                                            $sql6 = "SELECT * FROM `forum_cats` ORDER BY id ASC";
                                            $res6 = mysql_query($sql6) or die(mysql_error());
                                            if(mysql_num_rows($res6) == 0){
                                                echo "</select><br>No categories exist\n";
                                            }else {
                                                while($row3 = mysql_fetch_assoc($res6)){
                                                    echo "<option value=\"".$row3['id']."\">".$row3['name']."</option>\n";
                                                }
                                            }
                                            echo "</select></td></tr>\n";
                                            echo "<tr><td>Sub Cat. Name</td><td><input type=\"text\" name=\"name\"></td></tr>\n";
                                            echo "<tr><td>Description</td><td><textarea name=\"desc\" style=\"width:300px;height:60px;\"></textarea></td></tr>\n";
                                            echo "<tr><td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"submit\" value=\"Add Forum Sub Category\"></td></tr>\n";
                                            echo "</form></table>\n";
                                        }else {
                                            $cat = mss($_POST['cat']);
                                            $name = mss($_POST['name']);
                                            $desc = mss($_POST['desc']);
                                            
                                            if($cat && $name && $desc){
                                                $sql7 = "SELECT * FROM `forum_cats` WHERE `id`='".$cat."'";
                                                $res7 = mysql_query($sql7) or die(mysql_error());
                                                if(mysql_num_rows($res7) == 0){
                                                    echo "The forum category you supplied does not exist!\n";
                                                }else {
                                                    $sql8 = "SELECT * FROM `forum_sub_cats` WHERE `name`='".$name."' AND `cid`='".$cat."'";
                                                    $res8 = mysql_query($sql8) or die(mysql_error());
                                                    if(mysql_num_rows($res8) > 0){
                                                        echo "The forum sub category already exists within the main category!\n";
                                                    }else {
                                                        if(strlen($desc) > 255){
                                                            echo "The description must be under 255 characters!\n";
                                                        }else {
                                                            $row4 = mysql_fetch_assoc($res7);
                                                            $sql9 = "INSERT INTO `forum_sub_cats` (`cid`,`name`,`desc`,`admin`) VALUES('".$cat."','".$name."','".$desc."','".$row4['admin']."')";
                                                            $res9 = mysql_query($sql9) or die(mysql_error());
                                                            echo "The forum sub category, <b>".$name."</b> has been added under the main category of <b>".$row4['name']."</b>!\n";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </center>
    </section>
    <!-- FOOTER -->
      <footer class="line">
         <div class="box">
            <div class="s-12 l-6">
               <p>Copyright 2015, Vision Design - graphic zoo</p>
            </div>
            <div class="s-12 l-6">
               <a class="right" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Responsee Team</a>
            </div>
         </div>
      </footer>
    </body>

</html>