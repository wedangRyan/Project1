<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
    <div class="row">
            <div class="col-xs-12 table">
              <table class="table table-striped">
                <thead>
                  <tr>
                    
                    <th>Nama Obateee</th>
                    <th>CheckUpeee</th>
                    <th>Hargaeee satuaneeeeeeee</th>
                    <th>Banyakeee</th>
                    <th>Subtotalee</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($show_invoice as $si){ ?>
                  <tr>
                    <td><?php echo $si->nama_obat ?></td>
                    <td><?php echo $si->id_check ?></td>
                    <td>Rp <?php echo number_format($si->harga_jual) ?></td>
                    <td><?php echo $si->banyak ?></td>
                    
                    <td>Rp <?php echo number_format($si->subtotal) ?></td>
                  </tr>
                  
                  <?php } ?>
                </tbody>
                <tfoot>
                  <?php foreach($table_invoice as $i){ ?>
                    <tr>
          <td style="text-align:center; vertical-align: middle" colspan="4"><b>Grand Total</b></td>
          <td>
            <b>Rp <?php echo number_format($i->grandtotal) ?></b>
          </td>
        </tr>
        <?php } ?>
                  </tfoot>

              </table>
            </div>
            <!-- /.col -->
          </div>
    </body>
</html>