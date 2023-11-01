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
                                            <img class="w-30" style="height:60px;" src="<?php echo base_url('assets/home/img/logo1.png') ?>" alt="Image"></h1>
                                        </a>
                                        <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                    </div>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                        <form class="user" method="post" action="<?= base_url('auth/forgotPassword/');?>">
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                        
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="<?= base_url('auth/'); ?>">Return to login</a>
                                                <button type="submit" class="btn btn-danger btn-sm btn-user btn-block" style="width:100px;">
                                                    <b>Reset Password</b>
                                                </button>
                                            </div>
                                    </div>
                                        </form>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('auth/register'); ?>">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
</div>