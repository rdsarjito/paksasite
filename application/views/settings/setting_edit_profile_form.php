<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<div class="content">
			<!-- general form elements -->
			<div class="card card-primary mt-4">
              <div class="card-header">
                <h2 class="card-title">Update Profile</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
				  	<label for="nama_lengkap">Nama</label>
					<input type="text" name="nama_lengkap" class="<?= form_error('nama_lengkap') ? 'invalid' : '' ?> form-control"
					value="<?= form_error('nama_lengkap') ? set_value('nama_lengkap') : $current_user->nama_lengkap ?>" 
					required maxlength="32"/>
					<div class="invalid-feedback">
						<?= form_error('nama_lengkap') ?>
					</div>
                </div>
                  <div class="form-group">
				  	<label for="email">Email</label>
					<input type="text" name="email" class="<?= form_error('email') ? 'invalid' : '' ?> form-control"
					value="<?= form_error('email') ? set_value('email') : $current_user->email ?>" 
					required maxlength="32"/>
					<div class="invalid-feedback">
						<?= form_error('email') ?>
					</div>
                </div>
				  <div class="form-group">
				  	<label for="username">Username</label>
					<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?> form-control"
					value="<?= form_error('username') ? set_value('username') : $current_user->username ?>" 
					required maxlength="32"/>
					<div class="invalid-feedback">
						<?= form_error('username') ?>
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
