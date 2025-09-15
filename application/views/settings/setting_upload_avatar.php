<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 text-dark">Change Avatar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
			<?php
				$avatar = $current_user->avatar ?
					base_url('upload/avatar/' . $current_user->avatar)
					: get_gravatar($current_user->email)
			?>

			<form action="" method="POST" enctype="multipart/form-data">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->nama_lengkap, TRUE) ?>" id="wizardPicturePreview" title="" width="100px">
							<input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg, image/gif" id="wizard-picture" class="">
						</div>
						<h6 class="mt-2">Pilih Gambar</h6>
					</div>
				</div>

				<?php if (isset($error)) : ?>
					<div class="invalid-feedback"><?= $error ?></div>
				<?php endif; ?>

				<div class="text-center mt-4">
					<button type="submit" name="save" class="btn btn-primary">Simpan</button>
				</div>
			</form>

		</div>
    </div>
</div>