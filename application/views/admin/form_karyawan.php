<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah Karyawan</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <form action="<?php echo base_url(). 'admin/add_karyawan'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama_obat" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1" name="nik" required="required" type="text">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="umur">umur</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="umur" name="umur" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tempat_lahir" name="tempat_lahir" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class='input-group date' id='myDatepicker2'>
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_tinggal">Tempat Tinggal</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="tempat_tinggal" name="tempat_tinggal" class="form-control col-md-7 col-xs-12"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="foto" name="foto" class="form-control col-md-7 col-xs-12"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="role" id="role" class="select2_single form-control" tabindex="-1" required="required">
                <option selected="true" value="" disabled ></option> 
                  <option value="admin">Admin</option>
                  <option value="karyawan">Karyawan</option>
                  <option value="pimpinan">Pimpinan</option>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url('admin/table_karyawan') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
              <button id="send" type="submit" class="btn btn-success">Simpan</button>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
