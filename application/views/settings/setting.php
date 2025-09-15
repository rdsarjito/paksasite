<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 text-dark">Setting</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	<div class="content">
		<div class="card">
			<div class="card-header">
				<b>Avatar</b>
				<div style="display: flex; gap: 1em">
					<a href="<?= site_url('setting/remove_avatar') ?>" class="txt-red">Remove Avatar</a>
					<a href="<?= site_url('setting/upload_avatar') ?>">Change Avatar</a>
				</div>
			</div>
			<div class="card-body">
				<?php
				$avatar = $current_user->avatar ?
					base_url('upload/avatar/' . $current_user->avatar)
					: get_gravatar($current_user->email)
				?>
				<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->nama_lengkap, TRUE) ?>" height="80" width="80">
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header">
				<b>Profile Settings</b>
				<a href="<?= site_url('setting/edit_profile') ?>">Edit Profile</a>
			</div>
			<div class="card-body">
				Nama: <span class="text-gray"><?= html_escape($current_user->nama_lengkap) ?></span>
				<br>
				Email: <span class="text-gray"><?= html_escape($current_user->email) ?></span>
				<br>
				Username: <span class="text-gray"><?= html_escape($current_user->username) ?></span>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header">
				<b>Security & Password</b>
				<a href="<?= site_url('setting/edit_password') ?>">Edit Password</a>
			</div>
			<div class="card-body">
				Your Password: <span class="text-gray">******</span>
				<br>
				Last Changed: <span class="text-gray"><?= $current_user->password_updated_at ?></span>
			</div>
		</div>
	</div>

</div>


<?php if ($this->session->flashdata('message')) : ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: '<?= $this->session->flashdata('message') ?>'
	})
</script>
<?php endif ?>