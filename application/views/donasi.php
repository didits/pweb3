   
         <div class="line">
			<?php foreach ($h->result() as $row) {?>
               <div class="s-12 l-4">
                     <a href="#popup<?php echo $row->id_list;?>"><div style=" border:5px solid #FFF;height:300px; width:100%; background-image:url(<?php echo base_url();?>uploads/donasi/<?php echo $row->id_list;?>.jpg); background-position:center; background-size:cover"></div></a>
               </div>
      		<?php }?>
         </div>
		 <?php foreach ($h->result() as $row) {?>
         <div id="popup<?php echo $row->id_list;?>" class="overlay">
            <div class="popup">
               <h2><?php echo $row->nama_donasi;?></h2>
               <a class="close" href="#">&times;</a>
               <div class="content"><?php echo $row->deskripsi;?></div>
               <br>
               <br>
               <a href="<?php echo base_url();?>donasi/form_donasi/<?php echo $row->id_list;?>"><i class="icon-arrow_big_up"></i> Donate</a>
            </div>
         </div>
         <?php }?>

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
           $("#owl-demo2").owlCarousel({
            items : 4,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,
            pagination : false
           });
         });    
      </script>
