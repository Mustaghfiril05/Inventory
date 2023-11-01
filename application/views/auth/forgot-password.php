<div id="layoutAuthentication"  style="background-color:darkred;">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="p-2">
                            <div class="text-center">
                                <a href="<?= base_url(); ?>">
                                    <img class="w-30" style="height:60px;" src="<?php echo base_url('assets/home/img/logo2.png') ?>" alt="Image"></h1>
                                </a>
                                <h3 class="text-center font-weight-light my-4">Change Password</h3>
                            </div>
                            </div>
                             <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="post" action="<?= base_url('auth/changePassword/');?>">
                                <div class="card-body">
                                    <div class="small mb-3 text-muted"><b>Change Password for : <?= $this->session->userdata('reset_email')?></b></div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-control-user" id="password1"  name="password1" placeholder="Enter new password">
                                            <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                                            <label for="email" style="font-size: 12px;">Enter New Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-control-user" id="password2"  name="password2" placeholder="Repeat password">
                                            <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                                            <label for="email" style="font-size: 12px;">Repeat Password</label>
                                        </div>  
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="<?= base_url('auth/'); ?>">Return to login</a>
                                            <button type="submit" class="btn btn-danger btn-sm btn-user btn-block" style="width:100px;">
                                                <b>Change</b>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                            <div class="card-footer text-center py-3">
                                <!-- <div class="small"><a href="<?= base_url('auth/register'); ?>">Need an account? Sign up!</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>