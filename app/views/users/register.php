<?php require APPROOT.'/views/includes/header.php'; ?>
<body class="bg-primary">
        <!-- <div id="layoutAuthentication">
            <div id="layoutAuthentication_content"> -->
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                    <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" value="<?php echo $data['firstname']; ?>"/><span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
                                                        <label for="inputFirstName">First name<sup>*</sup></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" id="inputLastName" name="lastname" type="text" placeholder="Enter your last name" value="<?php echo $data['lastname']; ?>"/><span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
                                                        <label for="inputLastName">Last name<sup>*</sup></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="inputEmail" name="email" type="email" placeholder="Enter email address" value="<?php echo $data['email']; ?>"/><span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                                <label for="inputEmail">Email address<sup>*</sup></label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="inputPassword" name="password" type="password" placeholder="Create a password" value="<?php echo $data['password']; ?>"/><span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                                        <label for="inputPassword">Password<sup>*</sup></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="inputConfirmPassword" name="confirm_password" type="password" placeholder="Confirm password" value="<?php echo $data['confirm_password']; ?>"/><span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                                                        <label for="inputConfirmPassword">Confirm Password<sup>*</sup></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                              <div class="d-grid">
                                                  <button class="btn btn-primary btn-block" name="register" type="submit" value="register">Create Account</button>
                                              </div>
                                          </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?php echo URLROOT; ?>/users/login">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            <!-- </div> -->
            
<?php require APPROOT.'/views/includes/footer.php'; ?>