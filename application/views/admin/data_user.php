<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Data User</a>
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
        <h6 class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#newdatauserModal">Add New User</h6>
            <div class="card shadow mb-4">
            <div class="card-body" style="height: 30rem;">
                <div class="table-responsive" style="height: 28rem;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            <th scope="col" class='text-center'>No</th>
                            <th scope="col" class='text-center'>Name</th>
                            <th scope="col" class='text-center'>Username</th>
                            <th scope="col" class='text-center'>Email</th>
                            <th scope="col" class='text-center'>No. Hp</th>
                            <th scope="col" class='text-center'>Rule</th>
                            <th scope="col" class='text-center'>Date Created</th>
                            <th scope="col" class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($userr as $r) : ?>
                            <tr>
                                <th class='text-center' scope="row"><?= $i; ?></th>
                                <td class='text-center'><?= $r['nama']; ?></td>
                                <td class='text-center'><?= $r['username']; ?></td>
                                <td class='text-center'><?= $r['email']; ?></td>
                                <td class='text-center'><?= $r['telpon']; ?></td>
                                <td class='text-center'>
                                    <?php
                                        if($r['rule'] == 'admin') {
                                        ?>
                                        <span class="badge badge-info1">Admin</span>
                                    <?php }?>

                                    <?php
                                        if($r['rule'] == 'user') {
                                        ?>
                                        <span class="badge badge-success1">User</span>
                                    <?php }?>
                                </td>
                                <td class='text-center'><?= date('d F Y', $r['tanggal_pembuatan']); ?></td>
                                <td class='text-center'>
                                    <a href="<?= base_url('admin/edit_data_user/') . $r['id_user']; ?>" class="badge badge-info"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('admin/hapus_data_user/') . $r['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus User Tersebut?');"><i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title" id="newdatauseModalLabel">Add New Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('admin/data_user'); ?>" method="post">
      	<div class="modal-body">

            <div class="form-group">
    			<input type="text" class="form-control" id="username" name="username" placeholder="Username">   
  			</div>

            <div class="form-group">
    			<input type="text" class="form-control" id="nama" name="nama" placeholder="Fullname">
  			</div>

            <div class="form-group">
    			<input type="text" class="form-control" id="telpon" name="telpon" placeholder="No. Hp">
  			</div>

			<div class="form-group">
    			   <input type="password" class="form-control" id="password" name="password" placeholder="Password">   
  			</div>

			<div class="form-group">
    			   <input type="text" class="form-control" id="email" name="email" placeholder="Email">   
  			</div>

        	<label>Rule</label>
       		<div class="form-group">
          		<select name="id_rule" id="id_rule" class="form-control select2">
            		<option value="">Select Rule</option>
            			<?php foreach ($rule as $r) : ?>
              		<option value="<?= $r['id_rule']; ?>"><?= $r['rule'];  ?></option>
            			<?php endforeach; ?> 
          		</select>
        	</div>

            <div class="form-group">
                <div class="form-check">
                   <input class="form-check-input" type="checkbox" value="1" name="aktif" id="aktif" checked>
                   <label class="form-check-label" for="aktif">Active?</label>
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