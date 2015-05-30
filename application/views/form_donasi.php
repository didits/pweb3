  <?php foreach ($b->result() as $row) {?>
 <div class="s-12 l-6">
 <div style=" border:5px solid #FFF;height:400px; width:100%; background-image:url(<?php echo base_url();?>uploads/donasi/<?php echo $row->id_list;?>.jpg); background-position:center; background-size:cover"></div> 
 <div class="box">
 <h2><?php echo $row->nama_donasi;?></h2>
 <p><?php echo $row->deskripsi;?></p>
 </div>
 </div>
 <?php }?>
  <div class="s-12 l-6">
 <?php foreach ($h->result() as $row) {?>
 <form class="customform" action="<?php echo base_url();?>donasi/submit_donasi" method="post">
         <div class="line">
            <div class="box margin-bottom">
			<p>Username : <?php echo $row->username;?></p>
			 <div class="s-12"><input name="username" value="<?php echo $row->username;?>" type="text"  hidden="hidden" /></div>
			<br />
			<?php foreach ($b->result() as $row) {?>
			<div class="s-12"><input name="id" value="<?php echo $row->id_list;?>" placeholder="<?php echo $row->id_list;?>" type="text"  hidden="hidden" /></div>
			<?php }?>
			   <?php }?>
               <div class="s-12"><input name="program" placeholder="Program" type="text" /></div>
               <div class="s-12"><input name="dana" placeholder="Rp ..." type="text" /></div>
			   <div class="s-12"><input name="tanggal" placeholder="Tanggal Pelaksanaan" type="date" /></div>
               <div class="s-12"><textarea placeholder="Deskripsi Program" name="deskrip" rows="5"></textarea></div>
               <div class="s-12 l-5 right"><button type="submit">Submit donasi</button></div>
            </div>
         </div>
      </form>
	  </div>