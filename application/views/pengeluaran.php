<!DOCTYPE html>
<html>
<head>
  <title>Pengeluaran</title>
  <style>
    .btn-custom {
      background-color: #01bf63;
      border-color: #01bf63;
      color: white; /* Menambahkan warna font putih */
    }

    .btn-custom:hover {
      background-color: #019f53; /* Warna ketika tombol dihover */
      border-color: #019f53;
      color: white; /* Menambahkan warna font putih */
	  }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 text-dark">Pengeluaran</h1>
          </div><!-- /.col -->
          <div class="col-sm text-right">
            <?php if ($current_user->id_user !== '0'): ?>
              <button class="btn btn-custom" data-toggle="modal" data-target="#tambahPengeluaranModal"><i class="fas fa-fw fa-plus"></i> Tambah Pengeluaran</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="tambahPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="tambahPengeluaranModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form method="post" action="<?php echo base_url().'pengeluaran/tambah_pengeluaran' ?>">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tambahPengeluaranModalLabel">Tambah Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                              <label for="id_bulan_pembayaran">Pilih Bulan</label>
                              <select name="id_bulan_pembayaran" id="id_bulan_pembayaran" class="form-control">
                                <?php foreach ($bulan as $db): ?>
                                  <option value="<?= $db['id_bulan_pembayaran']; ?>"><?= $db['nama_bulan']; ?> | <?= $db['tahun']; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                        <div class="form-group">
                          <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                          <input type="hidden" name="id_user" class="form-control" value="<?php echo $current_user->id_user?>">
                          <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" required class="form-control" placeholder="Rp.">
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea name="keterangan" id="keterangan" required class="form-control"></textarea>
                          <input type="hidden" name="tanggal_pengeluaran" class="form-control" value="<?php echo $tanggal_pengeluaran = time();?>">
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                        <button type="submit" name="btnAddPengeluaran" class="btn btn-custom"><i class="fas fa-fw fa-save"></i> Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php endif ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="table_id">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Bulan</th>
                    <th>Keterangan</th>
                    <th>Terakhir Diubah</th>
                    <th>Jumlah Pengeluaran</th>
                    <?php if ($current_user->id_user !== '0'): ?>
                      <th>Aksi</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($pengeluaran as $dp): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $dp['nama_bulan']; ?> | <?= $dp['tahun']; ?></td>
                      <td><?= $dp['keterangan']; ?></td>
                      <td><?= date("d-m-Y, H:i:s", $dp['tanggal_pengeluaran']); ?></td>
                      <td>Rp. <?= number_format($dp['jumlah_pengeluaran']); ?></td>
                      <?php if ($current_user->id_user !== '0'): ?>
                        <td>
                          <a href="<?= site_url('pengeluaran/edit_pengeluaran/'.$dp['id_pengeluaran']); ?>" class="badge badge-success" data-toggle="modal" data-target="#editPengeluaranModal<?= $dp['id_pengeluaran']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah</a>
                          <div class="modal fade text-left" id="editPengeluaranModal<?= $dp['id_pengeluaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPengeluaranModalLabel<?= $dp['id_pengeluaran']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <form action="<?php echo base_url().'pengeluaran/edit_pengeluaran/';?>" method="post">
                                <input type="hidden" name="id_pengeluaran" value="<?= $dp['id_pengeluaran']; ?>">
                                <input type="hidden" name="id_user" class="form-control" value="<?php echo $current_user->id_user?>">
                                <input type="hidden" name="tanggal_pengeluaran" class="form-control" value="<?php echo $tanggal_pengeluaran = time();?>">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editPengeluaranModalLabel<?= $dp['id_pengeluaran']; ?>">Ubah Pengeluaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="jumlah_pengeluaran<?= $dp['id_pengeluaran']; ?>">Jumlah Pengeluaran</label>
                                      <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran<?= $dp['id_pengeluaran']; ?>" required class="form-control" placeholder="Rp." value="<?= $dp['jumlah_pengeluaran']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="keterangan<?= $dp['id_pengeluaran']; ?>">Keterangan</label>
                                      <textarea name="keterangan" id="keterangan<?= $dp['id_pengeluaran']; ?>" required class="form-control"><?= $dp['keterangan']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                    <button type="submit" class="btn btn-custom"><i class="fas fa-fw fa-save"></i> Save</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <?php if ($current_user->id_user != '0'): ?>
                            <a href="<?= site_url('pengeluaran/hapus_pengeluaran/'.$dp['id_pengeluaran']); ?>" class="badge badge-danger btn-delete" data-nama="Pengeluaran : Rp. <?= number_format($dp['jumlah_pengeluaran']); ?> | <?= $dp['keterangan']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                          <?php endif ?>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
</body>
</html>