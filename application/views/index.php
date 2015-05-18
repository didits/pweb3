<div class="line">
	<div id="owl-demo" class="owl-carousel owl-theme  margin-bottom">
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-2.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-3.jpg" alt=""></div>
	</div>
</div>
<!-- END OF CAROUSEL -->
<!-- section 1 -->
<div class="marg line">
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/img/940x380.jpg);">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news">
			<p>Copyright 2015, Vision Design - graphic zoo</p>
		</div>
	</div>
</div>
<!-- section 2 -->
<div class="marg line">
	<div class="s-12 l-6">
		<div class="box news">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/img/940x380.jpg);">
			<p>Copyright 2015, Vision Design - graphic zoo</p>
		</div>
	</div>
</div>
<div class="line">
	<div class="box" style="height:300px; background-color:#37001C; margin-bottom:-10px">
	</div>
	<div class="box" style="height:20px; background-color:#201; margin-bottom:-15px">
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/owl-carousel/owl.carousel.js"></script> 
<script type="text/javascript">
         jQuery(document).ready(function($) {	  
           $("#owl-demo").owlCarousel({		
         	navigation : true,
         	slideSpeed : 300,
         	paginationSpeed : 400,
         	autoPlay : true,
         	singleItem:true
           });
         });	 
      </script>
</body>
</html>