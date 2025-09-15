<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/img_properties/logoNew.png">
  <title>Sign in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
  .my-login-page .h-100 {
    height: 100vh;
  }
  .my-login-page .card-wrapper {
    width: 400px;
  }
  .my-login-page .brand {
    text-align: center;
  }
  .my-login-page .brand img {
    width: 100px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .my-login-page .card.fat {
    padding: 10px;
  }
  .my-login-page .card .card-title {
    margin-bottom: 30px;
  }
  .my-login-page .footer {
    margin: 40px 0;
    text-align: center;
  }
  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
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
</style>

</head>
<body class="my-login-page">
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
                  <a href="#" class="h1">Sign In to <b>PaKSa</b></a>
                </div>
              </div>
              <?php if ($this->session->flashdata('message_login_error')): ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('message_login_error'); ?>
              </div>
              <?php endif; ?>
              <form action="<?php echo base_url(); ?>login_controller/login" method="post" class="my-login-validation" novalidate="">
                <!-- <div class="form-group">
                  <label for="email">Username</label>
                  <input id="email" type="text" name="username" class="form-control form-control-border border-width-2<?= form_error('username') ? ' is-invalid' : '' ?>" placeholder="Enter your username or email" value="<?= set_value('username') ?>" required autofocus>
                  <div class="invalid-feedback">
                    <?= form_error('username') ?>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="email">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="email" type="text" name="username" class="form-control border-width-2<?= form_error('username') ? ' is-invalid' : '' ?>" placeholder="Enter your username" value="<?= set_value('username') ?>" required autofocus>
                    <div class="invalid-feedback">
                      <?= form_error('username') ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password
                  </label>
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
                <!-- <div class="form-group">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                    <label for="remember" class="custom-control-label">Remember Me</label>
                  </div>
                </div> -->
                <div class="form-group mb-3">
                  <div class="recaptcha-container">
                    <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars(isset($recaptcha_site_key)?$recaptcha_site_key:'', ENT_QUOTES, 'UTF-8') ?>"></div>
                  </div>
                </div>
                <div class="form-group m-0">
                  <button type="submit" class="btn btn-success btn-block">
                    Login
                  </button>
                </div>
                <div class="mt-4 text-center">
                  Don't have an account? <a href="<?php echo base_url(); ?>register">Create One</a>
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
  <script src="<?php echo base_url()?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
	</script>
</body>
</html>
