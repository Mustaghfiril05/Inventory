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
        </style>
        <center>
            <div class="col-md-6">         

                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_password1">New Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_password2">Repeat Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">Change Password</button>
                    </div>
                </form>
             
            </div>
        </center>
    </div>
</div>