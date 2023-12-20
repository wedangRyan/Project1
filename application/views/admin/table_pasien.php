<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Lihat Data pasien</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix">
				</div>
			</div>

			<div class="x_content">
				<?php if($this->session->flashdata('pasien_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('pasien_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>

				<a href="<?php echo base_url('admin/form_pasien') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Data Pasien </button></a>
				
				
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>NIK</th>
							<th>Nama Pasien</th>
							<th>Umur</th>
							<th>alamat</th>
							<th>No HP</th>
							<th>Tanggal Lahir</th>
							<th>Tanggal Input</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($table_pasien as $m){ ?>
						<tr>
							<td><?php echo $m->nik ?></td>
							<td><?php echo $m->nama_pasien ?></td>
							<td><?php echo $m->umur ?></td>
							<td><?php echo $m->alamat ?></td>
							<td><?php echo $m->no_hp ?></td>
							<td><?php echo date('j F Y',strtotime($m->tanggal_lahir)); ?></td>
							<td><?php echo date('j F Y',strtotime($m->tanggal_input)); ?></td>
							<td style=" text-align: center;">
								<?php echo anchor('admin/edit_form_pasien/'.$m->id_pasien, '<button class="btn btn-info btn-xs" type="button"><span class="fa fa-pencil"></span></button>'); ?>
								<?php echo anchor('admin/remove_pasien/'.$m->id_pasien, '<button class="btn btn-danger btn-xs" type="button"><span class="fa fa-trash"></span></button>');?>
								<?php echo anchor('admin/form_check/'.$m->id_pasien, '<button class="btn btn-success btn-xs" type="button">CHECK UP</span></button>');?>
						</tr>

						<?php } ?>
					</tbody>

				</table>
		</div>
	</div>
</div>

</div>


	


