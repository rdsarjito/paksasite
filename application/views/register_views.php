<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/img_properties/logoNew.png">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- AdminLTE App -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    .my-register-page {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f7f7f7;
    }
    .card-wrapper {
      width: 400px;
    }
    .card.fat {
      padding: 10px;
    }
    .card-title {
      margin-bottom: 30px;
    }
    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }
    .my-register-page .brand {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .my-register-page .brand img {
        width: 100px;
    }
    .recaptcha-container {
      width: 100%;
      display: flex;
      justify-content: center;
    }
    
    .g-recaptcha {
      transform: scale(1);
      transform-origin: 0 0;
    }
    .form-group {
      position: relative;
    }
    .form-group .input-group-text {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
    }
    .my-register-page .footer {
        margin: 40px 0;
        text-align: center;
    }
  </style>
</head>
<body class="my-register-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="<?php echo base_url()?>assets/img/img_properties/logoNeww.png" alt="logo">
          </div>
          <div class="card fat">
            <div class="card-body">
              <div class="text-center mb-5">
                <div class="login-title">
                  <h1>Register to <b>PaKSa</b></h1>
                </div>
              </div>
              <?php if ($this->session->flashdata('message_register_error')): ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('message_register_error'); ?>
              </div>
              <?php endif; ?>
              <form action="<?php echo base_url(); ?>register_controller/register" method="post" class="my-register-validation" novalidate="">
                <div class="form-group">
                  <label for="fullname">Full Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="fullname" type="text" name="fullname" class="form-control border-width-2<?= form_error('fullname') ? ' is-invalid' : '' ?>" placeholder="Enter your full name" value="<?= set_value('fullname') ?>" required autofocus>
                    <div class="invalid-feedback">
                      <?= form_error('fullname') ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input id="username" type="text" name="username" class="form-control border-width-2<?= form_error('username') ? ' is-invalid' : '' ?>" placeholder="Enter your username" value="<?= set_value('username') ?>" required>
                      <div class="invalid-feedback">
                          <?= form_error('username') ?>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input id="email" type="email" name="email" class="form-control border-width-2<?= form_error('email') ? ' is-invalid' : '' ?>" placeholder="Enter your email" value="<?= set_value('email') ?>" required>
                    <div class="invalid-feedback">
                      <?= form_error('email') ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" name="password" class="form-control border-width-2<?= form_error('password') ? ' is-invalid' : '' ?>" placeholder="Enter your password" value="<?= set_value('password') ?>" required data-eye>
                        <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePasswordVisibility()"><i id="toggleIcon" class="fas fa-eye"></i></span>
                        </div>
                        <div class="invalid-feedback">
                        <?= form_error('password') ?>
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password_confirm" type="password" name="password_confirm" class="form-control border-width-2<?= form_error('password_confirm') ? ' is-invalid' : '' ?>" placeholder="Confirm your password" value="<?= set_value('password_confirm') ?>" required data-eye>
                        <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePasswordVisibilityConfirm()"><i id="toggleIconConfirm" class="fas fa-eye"></i></span>
                        </div>
                        <div class="invalid-feedback">
                        <?= form_error('password_confirm') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                  <div class="recaptcha-container">
                    <div class="g-recaptcha" data-sitekey="6LdAhOIpAAAAAC3H8Gm4-fEhLNGMhdtRdcVSs29M"></div>
                  </div>
                </div>
                <div class="form-group m-0">
                  <button type="submit" class="btn btn-success btn-block">
                    Register
                  </button>
                </div>
                <div class="mt-4 text-center">
                  Already have an account? <a href="<?php echo base_url(); ?>login">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer">
            Copyright &copy; 2024 &mdash; PaKSa
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- jQuery -->
  <script src="<?php echo base_url()?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
  <script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password');
        var toggleIcon = document.getElementById('toggleIcon');
        if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
        } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
        }
    }

    function togglePasswordVisibilityConfirm() {
        var passwordField = document.getElementById('password_confirm');
        var toggleIcon = document.getElementById('toggleIconConfirm');
        if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
        } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
        }
    }
</script>
</body>
</html>
