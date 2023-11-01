<!DOCTYPE html>

<div id="layoutAuthentication" style="background-color: darkred;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                  <div class="p-2">
                                    <div class="text-center">
                                        <h3 class="text-center font-weight-light my-4"><b>Create Account</b></h3>
                                    </div>
                                  </div>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?= base_url('auth/register')?>">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="username" name="username" type="text" placeholder="Username For Login" />
                                                        <label for="username" style="font-size:12px;">.:: Username For Login ::.</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Your Name" />
                                                        <label for="nama" style="font-size: 12px;">.:: Your Name ::.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telpon" name="telpon" type="text" placeholder="" />
                                                <label for="telpon" style="font-size: 12px;">.:: No. Telp ::.</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                                                <label for="email" style="font-size: 12px;">.:: Email address ::.</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password1" name="password1" type="password" placeholder="Create a password" />
                                                        <label for="password" style="font-size: 12px;">.:: Password ::.</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                        <label for="password2" style="font-size: 12px;">.:: Confirm Password ::.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-danger btn-sm btn-user btn-block">
                                                    <b>Register Account</b>
                                                </button>
                                            </center>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('auth'); ?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>