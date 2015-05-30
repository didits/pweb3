<!DOCTYPE html>
<?php
error_reporting(0);
ob_start();
session_start();
include "connect.php";

$action = @$_GET['act'];
$actions_array = array('forum','create','topic','reply','mod');
?>
<html lang="en-US">
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
                     <li><a href="http://localhost/openeye/welcome"><i class="icon-home"></i> HOME</a></li>
					<li><a href="http://localhost/openeye/donasi"><i class="icon-heart"></i> DONASI</a></li>
					<li><a href="http://localhost/openeye/Forum"><i class="icon-discussion"></i> FORUM</a></li>
					<li><a href="http://localhost/openeye/user/signup"><i class="icon-new_user"></i> SIGN UP</a></li>
					<li><a href="http://localhost/openeye/user/LOGOUT"><i class="icon-signin"></i> LOGOUT</a></li>

                  </ul>
               </div>
               <div class=" hide-s l-2">
                  <i class="icon-facebook_circle icon2x right padding"></i>
               </div>
            </nav>
         </div>
      </header>
      <section>
        <div class="line">
          <div class="margin">
            <div class="s-12 margin-bottom">
              <div class="box">
               <?php
                
                    if(@$_SESSION['uid']){
                        $sql = "SELECT * FROM `users` WHERE `id`='".$_SESSION['uid']."'";
                        $res = mysql_query($sql) or die(mysql_error());
                        
                        if(mysql_num_rows($res) == 0){
                            session_destroy();
                            echo "Please <a href=\"./login.php\">Login</a> to your account, or <a href=\"./register.php\">Register</a> a new account!\n";
                        }else {
                            $row = mysql_fetch_assoc($res);
                            echo "Welcome back, <a href=\"./index.php?act=profile&id=".$row['id']."\">".$row['username']."</a>! <a href=\"./logout.php\" onClick=\"return confirmLogout()\">Logout</a>\n";
                            echo "<br>\n";
                            echo "<a href=\"./index.php\">Forum forum</a>\n";
                            if($row['admin'] == '1'){
                                echo " | <a href=\"./admin.php\">Administrative Section</a>\n";
                            }
                        }
                    }else {
                        echo "Please <a href=\"./login.php\">Login</a> to your account, or <a href=\"./register.php\">Register</a> a new account!\n";
                    }
                    echo $row['admin'];
                    $admin_user_level = $row['admin'];
                ?>
              </div>
              <div class="box" id="forum-content">
                <?php
                if(@$_SESSION['uid'])
                {
                    $sql = "SELECT * FROM `users` WHERE `id`='".$_SESSION['uid']."'";
                    $res = mysql_query($sql) or die(mysql_error());
                    $row = mysql_fetch_assoc($res);
                if(!$action || !in_array($action,$actions_array)){
                    $sql1 = "SELECT * FROM `forum_cats` WHERE 'admin' < ".$row['admin']."+1";
                    $res1 = mysql_query($sql1) or die(mysql_error());
                    
                    $i=1;
                    while($row2 = mysql_fetch_assoc($res1)){
                        echo "<div id=\"fcontent\">\n";
                        echo "    <div class=\"header\" id=\"header_".$i."\" onMouseOver=\"this.className='headerb'\" onMouseOut=\"this.className='header'\">".$row2['name']."</div>\n";
                        
                        $sql2 = "SELECT * FROM `forum_sub_cats` WHERE `cid`='".$row2['id']."' AND `admin` < ".$row['admin']."+1";
                        $res2 = mysql_query($sql2) or die(mysql_error());
                        
                        while($row3 = mysql_fetch_assoc($res2)){
                            echo "    <div id=\"content\">\n";
                            echo "    <a href=\"./index.php?act=forum&id=".$row3['id']."\">".$row3['name']."</a><br>\n";
                            echo "    " . $row3['desc'] . "\n";
                            echo "    </div>\n";
                        }
                        
                        echo "</div>\n";
                        $i++;
                    }
                }else {
                    if($action == 'forum'){
                        include "./includes/index.php";
                    }
                    
                    if($action == 'create'){
                        if(!$_SESSION['uid']){
                            header("Location: login.php");
                        }else {
                            include "./includes/create.php";
                        }
                    }
                    
                    if($action == 'topic'){
                        include "./includes/topic.php";
                    }
                    
                    if($action == 'reply'){
                        if(!$_SESSION['uid']){
                            header("Location; login.php");
                        }else {
                            include "./includes/reply.php";
                        }
                    }
                    
                    if($action == 'mod'){
                        if(!$_SESSION['uid']){
                            header("Location; login.php");
                        }else {
                            include "./includes/mod.php";
                        }
                    }
                }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- FOOTER -->
      <div class="line">
	<div class="box" style="height:250px; background-color:#37001C; margin-bottom:-10px">
	<br />
	<br />
	<div class="s-12 l-4 center">
	<img src="<?php echo base_url();?>assets/img/logoo.png" />
	</div>
	</div>
	<div class="box" style="height:20px; background-color:#201; margin-bottom:-15px">
	</div>
</div>
</body>
</html>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>  
      <script type="text/javascript">
         jQuery(document).ready(function($) {     
           $("#owl-demo").owlCarousel({      
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            autoPlay : true,
            singleItem:true
           });
           $("#owl-demo2").owlCarousel({
            items : 4,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,
            pagination : false
           });
         });    
      </script>
   </body>
</html>
