<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Data</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <?php foreach($table_pasien as $m){ ?>
        <form action="<?php echo base_url(). 'admin/update_pasien'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="hidden" name="id_pasien" value="<?php echo $m->id_pasien ?>">
              <input type="text" id="nik" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="nik" required="required" value="<?php echo $m->nik ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nama_pasien" name="nama_pasien" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->nama_pasien ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Umur</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="umur" name="umur" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->umur ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Alamat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->alamat ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class='input-group date' id='myDatepicker2'>
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required="required"value="<?php echo date('d-m-Y',strtotime($m->tanggal_lahir)); ?>">
                  
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_hp">NO HP</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="no_hp" name="no_hp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->no_hp ?>">
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url('admin/table_pasien') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
              <button id="send" type="submit" class="btn btn-success">Simpan</button>
              
            </div>
          </div>
        </form>
         <?php } ?>
      </div>
    </div>
  </div>
</div>
