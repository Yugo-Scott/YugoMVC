<?php require APPROOT.'/views/includes/header.php'; ?>
<body class="bg-primary">
        <!-- <div id="layoutAuthentication">
            <div id="layoutAuthentication_content"> -->
            <div class="container"> 
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="inputEmail" name="email" type="email" placeholder="
                                                Enter email address" name="email" value="<?php echo $data['email']; ?>" />
                                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                                <label for="inputEmail">Email address<sup>*</sup></label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="inputPassword" name="password" type="password" placeholder="Enter password" name="password" value="<?php echo $data['password']; ?>" />
                                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                                <label for="inputPassword">Password<sup>*</sup></label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#">Forgot Password?</a>
                                                <button class="btn btn-primary" name="login" type="submit" value="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?php echo URLROOT; ?>/users/register">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            <!-- </div> -->
            
            <?php require APPROOT.'/views/includes/footer.php'; ?>