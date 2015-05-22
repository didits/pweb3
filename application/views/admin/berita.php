 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Berita
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Tambah Berita
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
				

                    <div class="col-lg-6">
					
						<h1>
                            Tambah Berita
                        </h1>

                        <form role="form" action="<?php echo base_url();?>admin/submit_isi" method="post">

                            <div class="form-group">
                                <label>Judul</label>
                                <input class="form-control" name="judul">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
							
							<div class="form-group">
                                <label>Isi</label>
                                <textarea class="form-control" rows="3" name="isi"></textarea>
                            </div>
							<div class="form-group">
                                <label>Tipe Posting</label>
                                <select class="form-control" name="tipe_posting">
                                    <option value="1">Penting</option>
                                    <option value="2">Biasa</option>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="userfile" size="20">
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>

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
