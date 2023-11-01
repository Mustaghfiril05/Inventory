<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Main Menu</a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>
<style>
    /* .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 18.5px;
    padding-left: 272.5px;
    padding-top: 95px ;
    margin-right: auto;
    margin-left: auto;
    } */

    .badge-info1 {
    color: #0016ff;
    background-color: #17a2b85c;
    }
    .badge-success1 {
    color: #165300;
    background-color: #28a7457d;
    }
    table {
    border-radius: 1em;
    }
</style>
        <?= form_error('Inventory','<div class="alert alert-danger" rule="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <form class="form-inline" method="get" action="">
        <div class="navbar-form navbar-left">
            <a class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#newInventoryModal" style="color: white;">New Inventory</a>
        </div>
          <div class="col text-right">
          <select name="filter" id="filter" class="form-control">
                <option value="">--Pilih Berdasarkan--</option>
                <option value="1">Per Tanggal</option>
                <option value="2">Per Bulan</option>
                <option value="3">Per Tahun</option>
                <option value="4">Per Kategori</option>
            </select>
            <input style="display:none" type="date" id="form-tanggal" name="tanggal" class="form-control datepicker" autocomplete="off" />
            <select  style="display:none" id="form-bulan" name="bulan" class="form-control">
		        <option value="">--Pilih Bulan--</option>
		        <option value="1">Januari</option>
		        <option value="2">Februari</option>
		        <option value="3">Maret</option>
		        <option value="4">April</option>
		        <option value="5">Mei</option>
		        <option value="6">Juni</option>
		        <option value="7">Juli</option>
		        <option value="8">Agustus</option>
		        <option value="9">September</option>
		        <option value="10">Oktober</option>
		        <option value="11">November</option>
		        <option value="12">Desember</option>
		    </select>
            <select style="display:none" name="tahun" class="form-control" id="form-tahun">
		        <option value="">--Pilih Tahun--</option>
		            <?php
						foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
							echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
						}
		            ?>
		    </select>
            <select style="display:none" class="form-control" id="form-kategori" name="kategori">
                                <option value=>-- Pilih Kategori --</option>
                                <option value="Retail">Retail</option>
                                <option value="Industry">Industry</option>
                                <option value="Transport">Transport</option>
                                <option value="Marine">Marine</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-search"></i></button>
          <!-- <a href="list_laporan/listall" class="btn btn-success btn-sm" style="background-color:indianred;">List all ALP Peduli</a> -->
          <!-- <a href="list_laporan" class="btn btn-success btn-sm">Reset Filter</a> -->
          <!-- <a href="<?php echo $url_export; ?>" class="btn btn-success btn-sm"><i class="fas fa-download"></i>&nbsp;Excel</a> -->
          </div>
    </form>
        <!-- <h6 class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#newInventoryModal">Add New Inventory</h6> -->
            <div class="card shadow mb-4">
            <div class="card-body" style="height: 30rem;">
                <div class="table-responsive" style="height: 28rem;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th scope="col" class='text-center'>Kode</th>
                            <th scope="col" class='text-center'>Nama Barang</th>
                            <th scope="col" class='text-center'>Stock</th>
                            <th scope="col" class='text-center'>Satuan</th>
                            <th scope="col" class='text-center'>Kategori</th>
                            <th scope="col" class='text-center'>Pengirim</th>
                            <th scope="col" class='text-center'>Tanggal Pengiriman</th>
                            <th scope="col" class='text-center'>Harga</th>
                            <th scope="col" class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventory as $m) : ?>
                            <tr>
                                <td class='text-center'><?= $m['id_barang']; ?></td>
                                <td class='text-center'><?= $m['nama_barang']; ?></td>
                                <td class='text-center'><?= $m['stock']; ?></td>
                                <td class='text-center'><?= $m['satuan']; ?></td>
                                <td class='text-center'>
                                        <?php if($m['kategori'] == 'Retail') { ?> 
                                            <span class="badge badge-success" style="color: #000000;"><b>Retail</b></span>
                                        <?php }?>
                                        <?php if($m['kategori'] == 'Industry') { ?> 
                                            <span class="badge badge-warning" style="color: #000000;"><b>Industry</b></span>
                                        <?php }?>
                                        <?php if($m['kategori'] == 'Transport') { ?> 
                                            <span class="badge badge-danger" style="color: #000000;"><b>Transport</b></span>
                                        <?php }?>
                                        <?php if($m['kategori'] == 'Marine') { ?> 
                                            <span class="badge badge-info" style="color: #000000;"><b>Marine</b></span>
                                        <?php }?>
                                </td>
                                <td class='text-center'><?= $m['pengirim']; ?></td>
                                <td class='text-center'><?= date('d F Y',strtotime( $m ['tanggal_pengiriman'])); ?></td>
                                <td class='text-center'><?= $m['harga']; ?></td>
                                <td class='text-center'>
                                    <a href="<?= base_url('inventory/edit_inventory/') . $m['id_barang']; ?>" class="badge badge-info"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('inventory/hapus_inventory/') . $m['id_barang']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus User Tersebut?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>	
                </div>
            </div>
            </div>
</div>
                        </div>
<!-- Modal -->
<div class="modal fade" id="newInventoryModal" tabindex="-1" role="dialog" aria-labelledby="newdatauserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 12px;">
      <div class="modal-header">
        <h5 class="modal-title" id="newdatauseModalLabel">Add New Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('inventory'); ?>" method="post">
      	<div class="modal-body">

            <div class="form-group">
            <label for="tanggal_pengiriman"> Nama Barang</label>
    			<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder=".:: Nama Barang ::.">   
  			</div>

            <div class="form-group">
            <label for="tanggal_pengiriman"> Stock</label>
    			<input type="number" class="form-control" id="stock" name="stock" placeholder=".:: Stock ::.">
  			</div>

            <div class="form-group">
            <label for="tanggal_pengiriman"> Satuan</label>
                <select class="form-control form-control-user" id="satuan" name="satuan">
                        <option value="">.:: Satuan ::.</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Drum">Drum</option>
                        <option value="Pail">Pail</option>
                        <option value="IBC">IBC</option>
                </select>
  			</div>

            <div class="form-group">
            <label for="tanggal_pengiriman"> Kategori</label>
                <select class="form-control form-control-user" id="kategori" name="kategori">
                        <option value="">.:: Kategori ::.</option>
                        <option value="Retail">Retail</option>
                        <option value="Industry">Industry</option>
                        <option value="Transport">Transport</option>
                        <option value="Marine">Marine</option>
                </select>
  			</div>

            <div class="form-group">
            <label for="tanggal_pengiriman"> Pengirim</label>
    			<input type="text" class="form-control" id="pengirim" name="pengirim" placeholder=".:: Pengirim ::.">
  			</div>

            <div class="form-group">
            <label for="tanggal_pengiriman"> Penerima</label>
    			<input type="text" class="form-control" id="penerima" name="penerima" placeholder=".:: Penerima ::.">
  			</div>

            <div class="form-group">
                <label for="tanggal_pengiriman"> Tanggal Pengiriman</label>
    			<input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder=".:: Tanggal Pengiriman ::.">
  			</div>
            <div class="form-group">
                <label for="tanggal_penerimaan"> Tanggal Penerimaan</label>
    			<input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan" placeholder=".:: Tanggal Penerimaan ::.">
  			</div>

              <div class="form-group">
                <label for="tanggal_pengiriman"> Harga</label>
    			<input type="text" class="form-control" id="harga" name="harga" placeholder=".:: Harga ::.">
  			</div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<script src="<?= base_url('assets/'); ?>js/jquery-1.8.3.min.js"></script>
<script src="<?= base_url('assets/'); ?>home/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $("#form-tanggal, #form-bulan, #form-tahun, #form-kategori").hide();
		$("body").on("change", "#filter", function(e) {

      if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
        $('#form-bulan, #form-tahun , #form-kategori').hide(); // Sembunyikan form bulan dan tahun
        $('#form-tanggal').show(); // Tampilkan form tanggal
      }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
        $('#form-tanggal, #form-kategori').hide(); // Sembunyikan form tanggal
        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
      }else if($(this).val() == '3'){ // Jika filternya 3 (per tahun)
        $('#form-tanggal, #form-bulan, #form-kategori').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-tahun').show(); // Tampilkan form tahun
      }else {
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-kategori').show(); // Tampilkan form tahun
      }

      $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
	});
</script>