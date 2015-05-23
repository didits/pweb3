        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pendaftar Belum Terverifikasi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Tables
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
							
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>User</th>
										<th>Isi</th>
										<th>Tanggal</th>
										<th>Tipe</th>
                                    </tr>
                                </thead>
								<?php  
         foreach ($h->result() as $row)  
         {  
            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row->id_posting;?></td>
										<td><?php echo $row->user;?></td>
                                        <td><?php echo $row->judul;?></td>
                                        <td><?php echo $row->isi;?></td>
                                        <td><?php echo $row->tanggal;?></td>
                                        <td><?php echo $row->tipe_posting;?></td>
										<td><button type="button" class="btn btn-xs btn-success">Edit</button></td>
                                    </tr>
                                </tbody>
								<?php }
									?>
                            </table>
                        </div>
                    </div>
                 </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>

</body>

</html>
