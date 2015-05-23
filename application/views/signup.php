<style> 
.top-nav li a:hover, .top-nav li.active-item a, .top-nav .logo.active-item a:hover {
	background-color:transparent;
	opacity:.6;
}
h2 {
line-height: normal;
font-size:24px;
}
h3{
color:#363;
font-size:16px;
}
.pemisah{
border-bottom:#666 1px dashed;
}
/* Custom forms */
form input, form select, form textarea, form button {
 font-size:0.9em;
 font-family:inherit;
 margin-bottom:1.25em;
} 
form input, form select {height: 2.7em;}
form input, form textarea, form select { 
 background: none repeat scroll 0 0 #F5F5F5;
 transition: background 0.20s linear 0s;
 -o-transition: background 0.20s linear 0s;
 -ms-transition: background 0.20s linear 0s;
 -moz-transition: background 0.20s linear 0s;
 -webkit-transition: background 0.20s linear 0s;
}
form input:hover, form textarea:hover, form select:hover, form input:focus, form textarea:focus, form select:focus {background: none repeat scroll 0 0 #fff;}
form input, form textarea, form select {
 background: none repeat scroll 0 0 #F5F5F5;
 border: 1px solid #E0E0E0;
 padding: 0.625em;
 width: 100%;
}
form input[type="file"] {
 border: 1px solid #E0E0E0;
 height: auto;
 max-height: 2.7em;
 min-height: 2.7em;
 padding: 0.4em;
 width: 100%;
}
form input[type="radio"], form input[type="checkbox"] {
 margin-right: 0.625em;
 width:auto;
 padding:0;
 height:auto;
}
form option {padding: 0.625em;}
form select[multiple="multiple"] {height: auto;}
.button {
 width: 100%;
 background: none repeat scroll 0 0 #444444;
 border: 0 none;
 color: #FFFFFF;
 height: 2.7em;
 padding: 0.625em;
 cursor:pointer;
 width: 100%;
 transition: background 0.20s linear 0s;
 -o-transition: background 0.20s linear 0s;
 -ms-transition: background 0.20s linear 0s;
 -moz-transition: background 0.20s linear 0s;
 -webkit-transition: background 0.20s linear 0s;
}	
.button:hover {background: none repeat scroll 0 0 #666666;}
</style>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body style="background-color:#354044">
<!-- HEADER -->
<section>
<br>
	<div class="topline margin-bottom" style="margin:10px">
		<div class="s-12 l-4 center" style="border:#666 1px solid; padding:5px">
					<div class="box">
						<div id="id">
						<h1>&nbsp;</h1>
							<h2>
								<center>
									Buat Akun
								</center>
							</h2>
							<h1>&nbsp;</h1>
							<?php echo validation_errors('<p class="error">'); ?>
							<?php echo form_open("user/registration"); ?>
							<h3>Username <span id="user_name_verify" class="verify" style="display:inline-block; width:16px; height:16px;"></span></h3>
							<input type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" required />
					<h3>Email <span id="email_verify" class="verify" style="display:inline-block; width:16px; height:16px;"></span></h3>
							<input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" required />
							<h3>Password <span id="password_verify" class="verify" style="display:inline-block; width:16px; height:16px;"></span></h3>
							<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" required />
							<h3>Verifikasi Password <span id="confrimpwd_verify" class="verify" style="display:inline-block; width:16px; height:16px;"></span></h3>
							<input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" required />
						</div>
						</div>
					<div class="box">
					<div class="s-12 l-6"> </div>
					<div class="s-12 l-4 center">
						<div class="box">
							<button type="submit" style="background-color:#06F" class="button">Sign Up</button>
							</div>
					</div>
					</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	</div>
	<br>
</section>
<script type="text/javascript">
$(document).ready(function(){
		
	$("#user_name").blur(function(){
        var user_name = $("#user_name").val();
        
        if(user_name != 0)
        {
         
            if(isValidUserName(user_name))
            {
               $("#user_name_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" });
               //email_con=true;
               //register_show();
            } else {
               
                $("#user_name_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" });
            }
 
        }
        else {
            $("#user_name_verify").css({ "background-image": "none" });
        }

    });
		
	$("#email_address").blur(function(){
        var email = $("#email_address").val();
        
        if(email != 0)
        {
         
            if(isValidEmailAddress(email))
            {
               $("#email_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" });
               email_con=true;
               //register_show();
            } else {
               
                $("#email_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" });
            }
 
        }
        else {
            $("#email_verify").css({ "background-image": "none" });
        }

    });
	
	$("#password").blur(function(){
        
        if($("#con_password").val().length >= 4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" });
                pwd=false;
                //register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" });
            }
        }
    });
    
    $("#con_password").blur(function(){
        
        if($("#password").val().length >=4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/no.png')" });
                pwd=false;
                //register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>assets/images/yes.png')" });

            }
        }
    });
});
function isValidUserName(user_name) {
 		var pattern = new RegExp(/^[a-z0-9]{4,100}$/i);
 		return pattern.test(user_name);
	}
function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(emailAddress);
	}
</script>
</body>
</html>