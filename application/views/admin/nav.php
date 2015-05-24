<body>

    <div id="wrapper">     
	    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin OpenEye.com</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url();?>user/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url();?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">Berita <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/tambah_berita">Tambah Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/edit_berita">Edit Berita</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1">Posting Penting <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/tambah_berita">Tambah Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/edit_berita">Edit Berita</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">Posting Biasa <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/tambah_berita">Tambah Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/berita">Edit Berita</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>