<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_title">
        <h2>Tambah Penjualan Baru</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <form action="<?php echo base_url() . 'admin/add_invoice'; ?>" method="post" class="form-horizontal form-label-left" novalidate>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pasien">Nama Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="id_pasien" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="id_pasien" required="required" type="text">
              <option disabled selected> Pilih </option>
              <?php foreach($tab_pasien as $pasien){ ?>
              <option value="<?php echo $pasien->id_pasien?>"><?php echo $pasien->id_pasien." | ".$pasien->nama_pasien;?></option>
              <?php } ?>
            </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_beli">Nama Kasir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div>
                <input type="text" name="nama" id="nama" value="<?= $this->session->login['nama'] ?>" class="form-control" required="required" readonly>
              </div>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_beli">Tanggal Transaksi</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div>
                <input type="text" name="tgl_beli" id="tgl_beli" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s'); ?>" class="form-control" required="required" readonly>
              </div>
            </div>
          </div>

          <table id="prod" class="table table-bordered">
            <thead>
              <tr>
                <th style="text-align: center">Obat yang dijual</th>
                <th style="text-align: center">Checkup</th>
                <th style="text-align: center">Unit obat</th>
                <th style="text-align: center">Stok</th>
                <th style="text-align: center">Harga satuan</th>
                <th style="text-align: center">Banyak</th>

                <th style="text-align: center">Subtotal</th>
                <th style="text-align: center">Aksi</th>

              </tr>
            </thead>

            <tfoot>
            <tr>
                <td style="text-align:right; vertical-align: middle" colspan="5"><b>Grandtotal</b></td>
                <td>
                  <input id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" readonly>
                </td>
              </tr>
                <td style="text-align:right; vertical-align: middle" colspan="5"><b>Cash</b></td>
                <td>
                  <input id="cash" name="cash" type="text" class="form-control cash">
                </td>
              </tr>
              </tr>
                <td style="text-align:right; vertical-align: middle" colspan="5"><b>Kembalian</b></td>
                <td>
                  <input id="kembalian" name="kembalian" type="text" class="form-control kembalian" readonly>
                </td>
              </tr>
            </tfoot>
          </table>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url('admin/table_invoice') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
              <button id='addRows' class="btn btn-info" type="button"><span class="fa fa-plus"></span> Tambah Produk</button>
              <button id='addRow' class="btn btn-info" type="button"><span class="fa fa-plus"></span> Tambah Produke</button>
              <button href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#tambahpasien"><span class="fa fa-plus"></span> Tambah Pasien</button>
              <button href="#" class="btn btn-info" type="button" data-toggle="modal" data-target="#tambahcheckup"><span class="fa fa-plus"></span> Tambah CHECKUP</button>
              <button id="send" type="submit" class="btn btn-success">Simpan</button>

            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- modal insert pasien -->
    <div class="example-modal">
      <div id="tambahpasien" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title">Registrasi User Baru</h3>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url() . 'admin/add_pasien_invoice'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_check">ID Pasien</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="id_pasien" name="id_pasien" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12" value="PSN<?php echo sprintf("%04s", $checkodepasien) ?>" readonly>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nama_obat" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" data-validate-words="1" name="nik" required="required" type="text">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pasien">Nama</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nama_pasien" name="nama_pasien" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="umur">umur</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="umur" name="umur" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_hp">NO HP</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="no_hp" name="no_hp" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">tanggal_lahir</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' id='myDatepicker2'>
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <a href="<?php echo base_url('admin/form_invoice') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    <button id="send" type="submit" class="btn btn-success">Simpan</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- modal insert close -->


    <!-- modal insert checkup -->
    <div class="example-modal">
      <div id="tambahcheckup" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title">Registrasi User Baru</h3>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url() . 'admin/add_check_invoice'; ?>" method="post" class="form-horizontal form-label-left" novalidate>
                
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_check">ID Checkup</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="id_check" name="id_check" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12" value="CHK<?php echo sprintf("%04s", $checkode) ?>" readonly>
                  </div>
                </div>


                <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pasien">Nama Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="id_pasien" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="id_pasien" required="required" type="text">
              <option disabled selected> Pilih </option>
              <?php foreach($tab_pasien as $pasien){ ?>
              <option value="<?php echo $pasien->id_pasien?>"><?php echo $pasien->id_pasien." | ".$pasien->nama_pasien; $coba = $pasien->nama_pasien;?></option>
              <?php } ?>
            </select>
            </div>
          </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keadaan">Keadaan</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="keadaan" name="keadaan" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resep">Resep</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="resep" name="resep" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga">Harga</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="harga_jual" name="harga_jual" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <a href="<?php echo base_url('admin/form_invoice') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    <button id="send" type="submit" class="btn btn-success">Simpan</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- modal insert close -->




  </div>
</div>