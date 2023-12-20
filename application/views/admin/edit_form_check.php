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

        <?php foreach($table_check as $m){ ?>
        <form action="<?php echo base_url(). 'admin/update_check'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pasien">ID Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="hidden" name="id_check" value="<?php echo $m->id_check ?>">
              <input type="text" id="id_pasien" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="id_pasien" required="required" value="<?php echo $m->id_pasien ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nama_pasien" name="nama_pasien" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->nama_pasien ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Keadaan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="keadaan" name="keadaan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->keadaan ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Resep</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="resep" name="resep" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->resep ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Harga</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="harga_jual" name="harga_jual" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->harga_jual ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_tindakan">Tanggal Tindakan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class='input-group date' id='myDatepicker2'>
                  <input type="text" name="tanggal_tindakan" id="tanggal_tindakan" class="form-control" required="required"value="<?php echo date('d-m-Y',strtotime($m->tanggal_tindakan)); ?>">
                  
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
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
