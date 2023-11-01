<div class="content-wrapper">
<div class="container-fluid" style="background-color: white; height: 700px;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;">
        <li class="breadcrumb-item">
            <a href="" style="color: white;">Edit Data User</a>
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
</style>
<center>
<div class="col-md-10"> 
    <?= form_open_multipart('admin/edit_data_user'); ?>
	  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $datauser['id_user']; ?>">
		  <div class="form-group row">
			  <label for="username" class="col-sm-2 col-form-label">Username</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="username" name="username" value="<?= $datauser['username']; ?>" readonly>
			  </div>
		  </div>

		  <div class="form-group row">
			  <label for="email" class="col-sm-2 col-form-label">Email</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="email" name="email" value="<?= $datauser['email']; ?>">
				<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
			  </div>
		  </div>

		  <div class="form-group row">
			  <label for="nama" class="col-sm-2 col-form-label">Fullname</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="nama" name="nama" value="<?= $datauser['nama']; ?>">
				<?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
			  </div>
		  </div>

		  <div class="form-group row">
		  <label for="id_rule" class="col-sm-2 col-form-label">Rule</label>
		  <div class="col-sm-10">
			<select name="id_rule" id="id_rule" class="form-control">
			  <?php foreach ($rule as $r) : ?>
				<?php if( $r['id_rule'] == $datauser['id_rule'] ) : ?>
				  <option value="<?= $r['id_rule']; ?>" selected> <?= $r['rule']; ?></option>>
				<?php else : ?>
				  <option value="<?= $r['id_rule']; ?>"><?= $r['rule']; ?></option>
				<?php endif ; ?>
			  <?php endforeach; ?> 
			</select>
		  </div>
		  </div>

		  <div class="form-group row">
			  <div class="col-sm-2">Gambar</div>
			  <div class="col-sm-10">
				  <div class="row">
					  <div class="col-sm-3">
						  <img src="<?= base_url('assets/img/profile/') . $datauser['gambar']; ?>" class="img-thumbnail">
					  </div>
					  <div class="col-sm-9">
						  <div class="custom-file">
								<input type="file" class="custom-file-input" id="gambar" name="gambar">
								<label class="custom-file-label" for="gambar">Choose file</label>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
                    <hr>
		  <div class="form-group row justify-content-end">
			  <div class="col-sm-10">
				  <button type="submit" class="btn btn-success btn-sm">Save</button>
			  </div>
		  </div>
	</form>
</div>
</center>
</div>
</div>