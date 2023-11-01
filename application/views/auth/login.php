<div id="layoutAuthentication"  style="background-color:darkred;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                 <div class="p-2">   
                                    <div class="text-center">
                                        <h4 class="text-center font-weight-light my-4"><b>Inventory - Login</b></h4>
                                    </div>
                                 </div>
                                    <div class="card-body">
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth');?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text"/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-danger btn-sm btn-user btn-block" style="width:100px;">
                                                    <b>Login</b>
                                                </button>
                                            </center>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            <a href="<?= base_url('auth/register'); ?>">Need an account? Sign up!</a>
                                            <!-- <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a> -->
                                            <a class="small" href="<?= base_url(); ?>">Back To Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>