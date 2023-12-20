<div class="col-md-3 left_col menu_fixed">
	<div class="left_col scroll-view">
 		<div class="navbar nav_title" style="border: 0;">
 			<!-- logo info -->
 			<div class="logo_pic">
 				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/logo.png') ?>" alt="..." class="img-circle logo_img"></a>
 			</div>
			
		</div>
		<div class="profile">
		<a href="<?php echo base_url(); ?>" class="site_title"><span style="font-size: 20px;"><?php echo 'Rumah Sehat Yakpermas' ?></span></a>
		</div>

		
		<div class="clearfix"></div>

		
		<!-- /menu profile quick info -->
		<br>
		<!-- Sidebar Menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3></h3>
				<ul class="nav side-menu">

					<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Beranda </a></li>
					<li><a><i class="fa fa-user"></i> Data Master <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('admin/table_karyawan') ?>">Data Karyawan</a></li>
							<li><a href="<?php echo base_url('admin/table_pasien') ?>">Data Pasien</a></li>
							
						</ul>
					</li>
					<li><a><i class="fa fa-medkit"></i> Obat <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('admin/form_med') ?>">Tambah Obat</a></li>
							<li><a href="<?php echo base_url('admin/table_med') ?>">Lihat Obat</a></li>
							<li><a href="<?php echo base_url('admin/table_exp') ?>">Obat Kedaluwarsa</a></li>
							<li><a href="<?php echo base_url('admin/table_stock') ?>">Obat Habis</a></li>
							
						</ul>
					</li>
					<li><a><i class="fa fa-hospital-o"></i> Kategori & Unit <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('admin/form_cat') ?>">Tambah Kategori</a></li>
							<li><a href="<?php echo base_url('admin/table_cat') ?>">Lihat Kategori</a></li>
							<li><a href="<?php echo base_url('admin/form_unit') ?>">Tambah Unit</a></li>
							<li><a href="<?php echo base_url('admin/table_unit') ?>">Lihat Unit</a></li>
							
						</ul>
					</li>

					<li><a><i class="fa fa-users"></i> Pemasok <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('admin/form_sup') ?>">Tambah Pemasok</a></li>
                    		<li><a href="<?php echo base_url('admin/table_sup') ?>">Lihat Pemasok</a></li>
						</ul>
					</li>

				
					<li><a><i class="fa fa-edit"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="<?php echo base_url('admin/table_check') ?>">Check Up</a></li>
                    	<li><a href="<?php echo base_url('admin/form_invoice') ?>">Tambah Penjualan</a></li>
                    	<li><a href="<?php echo base_url('admin/table_invoice') ?>">Lihat Penjualan</a></li>
                    	<li><a href="<?php echo base_url('admin/invoice_report') ?>">Grafik Penjualan</a></li>
                    </ul>
                  </li>


                  <li><a><i class="fa fa-shopping-cart"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('admin/form_purchase') ?>">Tambah Pembelian</a></li>
							<li><a href="<?php echo base_url('admin/table_purchase') ?>">Lihat Pembelian</a></li>
							<li><a href="<?php echo base_url('admin/purchase_report') ?>">Grafik Pembelian</a></li>
							
							
						</ul>
					</li>


					<li><a href="<?php echo base_url('admin/report') ?>"><i class="fa fa-bar-chart"></i> Laporan Obat </a></li>
					<li><a href="<?php echo base_url('admin/reporttotal') ?>"><i class="fa fa-bar-chart"></i> Laporan Total </a></li>
				</ul>
			</div>
		</div>
		

	</div>
</div>