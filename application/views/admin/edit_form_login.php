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

        <?php foreach($table_login as $m){ ?>
        <form action="<?php echo base_url(). 'admin/update_login'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" readonly="readonly" class="form-control" value="<?php echo $m->id ?>" name="id"></td>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="username" name="username"  class="form-control col-md-7 col-xs-12" value="<?php echo $m->username ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="password" name="password"  class="form-control col-md-7 col-xs-12" value="">
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
         <?php } ?>
      </div>
    </div>
  </div>
</div>
