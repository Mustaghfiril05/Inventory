<div class="content-wrapper">
    <div class="container-fluid" style="background-color: white; height: 700px;">
            <ol class="breadcrumb" style="background-color: #3a3a3a;">
                    <li class="breadcrumb-item">
                        <a href="" style="color: white;">Edit Profile</a>
                    </li>
                <li class="breadcrumb-item active" style="color: white;">Overview</li>
            </ol>
        <style>
        /* .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
            width: 100%;
            padding-right: 7.5px;
            padding-left: 257.5px;
            padding-top: 95px ;
            margin-right: auto;
            margin-left: auto;
            } */
            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -73.5px;
                margin-left: -7.5px;
            }
        </style>
        <center>
            <div class="col-md-6">         
                <div class="card-body" style="height:38rem; width:auto;">
                    <div class="row">
                        <div class="col-lg-10">
                            <?= $this->session->flashdata('message'); ?>
                            <?= form_open_multipart('user/edit'); ?>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telpon" class="col-sm-2 col-form-label">No Telpon :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $user['telpon']; ?>">
                                    <?= form_error('telpon','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">FullName :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                    <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Photo Profile :</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail">
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
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>