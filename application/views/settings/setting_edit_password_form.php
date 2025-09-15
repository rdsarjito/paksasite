<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content">
			<!-- general form elements -->
			<div class="card card-primary mt-4">
              <div class="card-header">
                <h2 class="card-title">Update Password</h2>
              </div>
              <!-- /.card-header -->
              
              <?php
                if ($this->session->flashdata('pass_beda')) {
              ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <!-- <?php echo validation_errors(); ?> -->
                <?php echo $this->session->flashdata('pass_beda'); ?>
              </div>
              <?php } ?>
              <script>
                var check = function() {
                  if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Matching';
                  } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Not matching';
                  }
                }
              </script>
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?> form-control" 
                    value="<?= set_value("password") ?>" onkeyup='check();' required/>
                    <div class="invalid-feedback">
                      <?= form_error('password') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password_confirm">Konfirmasi Password Baru</label>
                    <input id="confirm_password" type="password" name="password_confirm" class="<?= form_error('password_confirm') ? 'invalid' : '' ?> form-control"
                    value="<?= set_value("password_confirm") ?>" onkeyup='check();' required/>
                    <span id='message'></span>
                    <div class="invalid-feedback">
                      <?= form_error('password_confirm') ?>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div>
                  <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
		</div>
</div>