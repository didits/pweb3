<!-- section 1 -->
<div class="marg line">
<?php  
         foreach ($h->result() as $row)  
         {  
            ?>
	<div class="s-12 l-12">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/gambar_home/<?php echo $row->id_posting;?>.jpg);">
		</div>
	</div>
	<div class="s-12 l-9">
		<div class="box">
		<h2 style="font-style:italic; font-weight:900"><span class="awal-judul"></span><?php echo $row->judul;?></h2>
		<span class="span"><i class="icon-user"></i> Didit</span><span class="span"><i class="icon-calendar"></i> 13-12-2014</span>
		<div class="divider"></div>
			<p><div class="awal-paragraf"></div><?php echo $row->isi;?> </p>
			
		</div>
	</div>
	<div class="s-12 l-3">
		<div class="box" style="border-left:2px #CCCCCC dashed; margin-top:10px">
		<h3 style="font-style:italic; font-weight:900">Berita Terkait</h3>
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/gambar_home/1.jpg); height:200px">
		</div>
		</div>
	</div>
	<?php }
									?>
</div>

