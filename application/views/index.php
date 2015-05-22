<div class="line">
	<div id="owl-demo" class="owl-carousel owl-theme  margin-bottom" style="height:100vh">
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-2.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-3.jpg" alt=""></div>
	</div>
</div>
<!-- END OF CAROUSEL -->
<!-- section 1 -->
<?php  
         foreach ($h->result() as $row)  
         {  
            ?>
			<?php if(($row->id_posting%2)==1)
			{
				?>
<div class="marg line">
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/gambar_home/<?php echo $row->id_posting;?>.jpg);">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news">
		<h2 style="font-style:italic; font-weight:900"><span class="awal-judul"></span><?php echo $row->judul;?></h2>
		<span class="span"><i class="icon-user"></i> Didit</span><span class="span"><i class="icon-calendar"></i> 13-12-2014</span>
		<div class="divider"></div>
			<p><div class="awal-paragraf"></div><?php echo $row->isi;?></p>
		</div>
	</div>
</div>
<?php } else {?>
<div class="marg line">
	<div class="s-12 l-6">
	<div class="box news">
		<h2 style="font-style:italic; font-weight:900"><span class="awal-judul"></span><?php echo $row->judul;?></h2>
		<span class="span"><i class="icon-user"></i> Didit</span><span class="span"><i class="icon-calendar"></i> 13-12-2014</span>
		<div class="divider"></div>
			<p><div class="awal-paragraf"></div><?php echo $row->isi;?></p>
		</div>
		
	</div>
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/gambar_home/<?php echo $row->id_posting;?>.jpg);">
		</div>
	</div>
</div>
<?php }}
									?>
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