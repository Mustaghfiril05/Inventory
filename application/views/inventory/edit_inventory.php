<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Edit Inventory</a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>
<style>
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -339.5px;
        margin-left: -7.5px;
    }
</style>
    <center>
        <h4><b>.:: Edit Inventory ::.</b></h4>
              <?= $this->session->flashdata('message'); ?>
              <?= form_open_multipart('inventory/edit_inventory'); ?>
              <div class="col-lg-6 col-md-6">
                <div class="form-group row">
                  <label for="Kode_barang" class="col-sm-2 col-form-label">Kode Barang :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $inventory['id_barang']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $inventory['nama_barang']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stock :</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control" id="stock" name="stock" value="<?= $inventory['stock']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="satuan" class="col-sm-2 col-form-label">Satuan :</label>
                  <div class="col-sm-6">
                  <select class="form-control form-control-user" id="satuan" name="satuan">
                        <?php if($inventory['satuan'] == 'Pcs') {?>
                            <option value="Pcs" selected>Pcs</option>
                            <option value="Drum">Drum</option>
                            <option value="Pail">Pail</option>
                            <option value="IBC">IBC</option>
                        <?php } elseif ($inventory['satuan'] == 'Drum') { ?>
                            <option value="Pcs">Pcs</option>
                            <option value="Drum" selected>Drum</option>
                            <option value="Pail">Pail</option>
                            <option value="IBC">IBC</option>
                        <?php } elseif ($inventory['satuan'] == 'Pail') { ?>
                            <option value="Pcs">Pcs</option>
                            <option value="Drum" >Drum</option>
                            <option value="Pail" selected>Pail</option>
                            <option value="IBC">IBC</option>
                        <?php } else { ?>
                            <option value="Pcs">Pcs</option>
                            <option value="Drum" >Drum</option>
                            <option value="Pail">Pail</option>
                            <option value="IBC"  selected>IBC</option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kategori" class="col-sm-2 col-form-label">Kategori :</label>
                  <div class="col-sm-6">
                  <select class="form-control form-control-user" id="kategori" name="kategori">
                        <?php if($inventory['kategori'] == 'Retail') {?>
                            <option value="Retail" selected>Retail</option>
                            <option value="Industry">Industry</option>
                            <option value="Transport">Transport</option>
                            <option value="Marine">Marine</option>
                        <?php } elseif ($inventory['kategori'] == 'Industry') { ?>
                            <option value="Retail" >Retail</option>
                            <option value="Industry" selected>Industry</option>
                            <option value="Transport">Transport</option>
                            <option value="Marine">Marine</option>
                        <?php } elseif ($inventory['kategori'] == 'Transport') { ?>
                            <option value="Retail" >Retail</option>
                            <option value="Industry">Industry</option>
                            <option value="Transport" selected>Transport</option>
                            <option value="Marine">Marine</option>
                        <?php } else { ?>
                            <option value="Retail" >Retail</option>
                            <option value="Industry">Industry</option>
                            <option value="Transport">Transport</option>
                            <option value="Marine" selected>Marine</option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="form-group row">
                  <label for="pengirim" class="col-sm-2 col-form-label">Pengirim :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $inventory['pengirim']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tanggal_pengiriman" class="col-sm-2 col-form-label">Tanggal Pengiriman :</label>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" value="<?= $inventory['tanggal_pengiriman']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="penerima" class="col-sm-2 col-form-label">Penerima :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="penerima" name="penerima" value="<?= $inventory['penerima']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tanggal_penerimaan" class="col-sm-2 col-form-label">Tanggal Penerimaan :</label>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan" value="<?= $inventory['tanggal_penerimaan']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="harga" class="col-sm-2 col-form-label">Harga :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $inventory['harga']; ?>">
                  </div>
                </div>
              </div>

                <hr>
                  <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <a href="<?= base_url('inventory'); ?>" type="submit" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </center>
</div>
</div>