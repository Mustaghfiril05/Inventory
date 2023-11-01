<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
            <ol class="breadcrumb" style="background-color: #3a3a3a;">
                    <li class="breadcrumb-item">
                        <a href="" style="color: white;">Rule</a>
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
        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
            border-radius: 2rem;
            background-color: #ffffff;
        }
        table {
            border-radius: 1em;
        }
    </style>
     <?= form_error('menu','<div class="alert alert-danger" rule="alert">', '</div>'); ?>

<?= $this->session->flashdata('message'); ?>
      <h6 class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#newRuleModal">Add New Rule</h6>
<div class="card shadow mb-4">
  <div class="card-body" style="height: 27rem;">
    <div class="table-responsive" style="height: 25rem;">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead">
                    <tr>
                        <th scope="col" class='text-center'>No</th>
                        <th scope="col" class='text-center'>Rule</th>
                        <th scope="col" class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rule as $r) : ?>
                    <tr>
                          <th class='text-center' scope="row"><?= $i; ?></th>
                          <td class='text-center'><?= $r['rule']; ?></td>
                          <td class='text-center'>
                              <a href="<?= base_url('admin/ruleaccess/') . $r['id_rule']; ?>" class="badge badge-success">Access</a>
                              <a href="<?= base_url('admin/edit_rule/') . $r['id_rule']; ?>" class="badge badge-info"><i class="fas fa-pen"></i></a>
                              <a href="<?= base_url('admin/hapus_rule/') . $r['id_rule']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus rule?');"><i class="fas fa-trash"></i></a>
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
<!-- modal -->
<div class="modal fade" id="newRuleModal" tabindex="-1" rule="dialog" aria-labelledby="newRuleModalLabel" aria-hidden="true">
  <div class="modal-dialog" rule="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRuleModalLabel">Add New rule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('admin/rule'); ?>" method="post">
      	<div class="modal-body">
        	<div class="form-group">
    			<input type="text" class="form-control" id_rule="rule" name="rule" placeholder="Nama rule">
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