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
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>uploads/<?php echo $row->id_posting;?>.jpg);">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news">
		<h2 style="font-style:italic; font-weight:900"><span class="awal-judul"></span><?php echo $row->judul;?></h2>
		<span class="span"><i class="icon-user"></i> <?php echo $row->user;?></span><span class="span"><i class="icon-calendar"></i>    <?php echo $row->tanggal;?></span>
		<div class="divider"></div>
			<p><div class="awal-paragraf"></div><?php echo $row->isi;?></p>
			<span class="span_link"><a href="<?php echo base_url();?>halaman/berita/<?php echo $row->id_posting;?>">Read more ...</a></span>
		</div>
	</div>
</div>
<?php } else {?>
<div class="marg line">
	<div class="s-12 l-6">
	<div class="box news">
		<h2 style="font-style:italic; font-weight:900"><span class="awal-judul"></span><?php echo $row->judul;?></h2>
		<span class="span"><i class="icon-user"></i> <?php echo $row->user;?></span><span class="span"><i class="icon-calendar"></i>      <?php echo $row->tanggal;?></span>
		<div class="divider"></div>
			<p><div class="awal-paragraf"></div><?php echo $row->isi;?></p>
			<span class="span_link"><a href="<?php echo base_url();?>halaman/berita/<?php echo $row->id_posting;?>">Read more ...</a></span>
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>uploads/<?php echo $row->id_posting;?>.jpg);">
		</div>
	</div>
</div>
<?php }}
									?>
									<div class="s-12 l-2 center">
									<br />
									<a href="<?php echo base_url();?>welcome/home/<?php print_r($c); ?>">
									<button style=" width: 100%;
 background: none repeat scroll 0 0 #444444;
 border: 0 none;
 color: #FFFFFF;
 height: 2.7em;
 padding: 0.625em;
 cursor:pointer;
 width: 100px;
 transition: background 0.20s linear 0s;
 -o-transition: background 0.20s linear 0s;
 -ms-transition: background 0.20s linear 0s;
 -moz-transition: background 0.20s linear 0s;
 -webkit-transition: background 0.20s linear 0s;">Back</button>
 </a>
 
 <a href="<?php echo base_url();?>welcome/home/<?php print_r($b); ?>">
 <button style=" width: 100%;
 background: none repeat scroll 0 0 #444444;
 border: 0 none;
 color: #FFFFFF;
 height: 2.7em;
 padding: 0.625em;
 cursor:pointer;
 width: 100px;
 transition: background 0.20s linear 0s;
 -o-transition: background 0.20s linear 0s;
 -ms-transition: background 0.20s linear 0s;
 -moz-transition: background 0.20s linear 0s;
 -webkit-transition: background 0.20s linear 0s;">Next</button></a><br />

<br />
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