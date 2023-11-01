<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Submenu</a>
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
        <?= form_error('menu','<div class="alert alert-danger" rule="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <h6 class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#newdatauserModal">Add New SubMenu</h6>
            <div class="card shadow mb-4">
            <div class="card-body" style="height: 30rem;">
                <div class="table-responsive" style="height: 28rem;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th scope="col" class='text-center'>No</th>
                            <th scope="col" class='text-center'>Submenu</th>
                            <th scope="col" class='text-center'>Menu</th>
                            <th scope="col" class='text-center'>Url</th>
                            <th scope="col" class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <th class='text-center' scope="row"><?= $i; ?></th>
                                <td class='text-center'><?= $sm['judul']; ?></td>
                                <td class='text-center'><?= $sm['menu']; ?></td>
                                <td class='text-center'><?= $sm['url']; ?></td>
                                <td class='text-center'>
                                    <a href="<?= base_url('menu/edit_submenu/') . $sm['id']; ?>" class="badge badge-info"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('menu/hapus_submenu/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus SubMenu Tersebut?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>	
                </div>
            </div>
            </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="newdatauserModal" tabindex="-1" role="dialog" aria-labelledby="newdatauserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newdatauseModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('menu/submenu'); ?>" method="post">
      	<div class="modal-body">

        <label>Nama Sub Menu</label>
        <div class="form-group">
    		<input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Sub Menu">
  		</div>
        <label>Pilih Menu</label>
        <div class="form-group">
          <select name="menu_id" id="menu_id" class="form-control">
            <option value="">Select Menu</option>
            <?php foreach ($menu as $m) : ?>
              <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

          <label>URL Sub Menu</label>
          <div class="form-group">
             <input type="text" class="form-control" id="url" name="url" placeholder="Contoh : admin/index">
          </div>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                <label class="form-check-label" for="is_active">
                  Active?
                </label>
            </div>
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