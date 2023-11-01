<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Rule Access</a>
        </li>
        <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>
<style>
    .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 18.5px;
    padding-left: 272.5px;
    padding-top: 95px ;
    margin-right: auto;
    margin-left: auto;
    }
</style>
        <div class="col-lg-6">	

        <?= $this->session->flashdata('message'); ?>
        <h5> Rule : <b><?= $rule['rule']; ?></b> </h5>
        <div class="card shadow mb-4">
            <div class="card-body" style="height: 30rem;">
                <div class="table-responsive" style="height:27rem; width:35rem;">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="20%" >
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Access</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>
                <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= cek_akses($rule['id_rule'], $m['id']); ?> data-rule="<?= $rule['id_rule']; ?>" data-menu="<?= $m['id']; ?>">
                            </div>
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
</div>