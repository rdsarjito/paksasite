<?php 
 
 
  
  

  // if (isset($_POST['btnEditPembayaranUangKas'])) {
  //   if (editPembayaranUangKas($_POST) > 0) {
  //     setAlert("Pembayaran has been changed", "Successfully changed", "success");
  //     header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
  //   }
  // }

  // if (isset($_POST['btnTambahSiswa'])) {
  //   if (tambahSiswaUangKas($_POST) > 0) {
  //     setAlert("Siswa has been added", "Successfully added", "success");
  //     header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
  //   }
  // }

?>

<!DOCTYPE html>
<html>
<head>
  <?php foreach ($detail_bulan_pembayaran as $dbp): ?>
    <title>Detail Bulan Pembayaran : <?= ucwords($dbp['nama_bulan']); ?> <?= $dbp['tahun']; ?></title>
  <?php endforeach ?>
  
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
            <?php foreach ($detail_bulan_pembayaran as $dbp): ?>
              <h1 class="m-0 text-dark">Detail Bulan Pembayaran : <?= ucwords($dbp['nama_bulan']); ?> <?= $dbp['tahun']; ?></h1>
              <h4>Rp. <?= number_format($dbp['pembayaran_perminggu']); ?> / minggu</h4>
            <?php endforeach ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid bg-white p-3 rounded">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered" id="table_id">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Minggu ke 1</th>
                <th>Minggu ke 2</th>
                <th>Minggu ke 3</th>
                <th>Minggu ke 4</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($uang_kas as $duk): ?>
                <?php if ($current_user->id_user == '0'): ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= ucwords(htmlspecialchars_decode($duk['nama_siswa'])); ?></td>
                    <?php if ($duk['minggu_ke_1'] == $duk['pembayaran_perminggu']): ?>
                      <td class="text-success"><?= number_format($duk['minggu_ke_1']); ?></td>
                    <?php else: ?>
                      <td class="text-danger"><?= number_format($duk['minggu_ke_1']); ?></td>
                    <?php endif ?>

                    <?php if ($duk['minggu_ke_2'] == $duk['pembayaran_perminggu']): ?>
                      <td class="text-success"><?= number_format($duk['minggu_ke_2']); ?></td>
                    <?php else: ?>
                      <td class="text-danger"><?= number_format($duk['minggu_ke_2']); ?></td>
                    <?php endif ?>

                    <?php if ($duk['minggu_ke_3'] == $duk['pembayaran_perminggu']): ?>
                      <td class="text-success"><?= number_format($duk['minggu_ke_3']); ?></td>
                    <?php else: ?>
                      <td class="text-danger"><?= number_format($duk['minggu_ke_3']); ?></td>
                    <?php endif ?>

                    <?php if ($duk['minggu_ke_4'] == $duk['pembayaran_perminggu']): ?>
                      <td class="text-success"><?= number_format($duk['minggu_ke_4']); ?></td>
                    <?php else: ?>
                      <td class="text-danger"><?= number_format($duk['minggu_ke_4']); ?></td>
                    <?php endif ?>
                  </tr>
                <?php else: ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $duk['nama_siswa']; ?></td>
                    <?php if ($duk['minggu_ke_1'] == $duk['pembayaran_perminggu']): ?>
                      <?php if ($duk['minggu_ke_2'] !== "0"): ?>
                        <td>
                          <button type="button" class="badge badge-success" data-container="body" data-toggle="popover" data-placement="top" data-content="Tidak bisa mengubah minggu ke 1, kalau minggu ke 2 dan seterusnya sudah lunas, jika ingin mengubah, ubahlah minggu ke 2 atau ke 3 atau ke 4 terlebih dahulu menjadi 0.">
                            <i class="fas fa-fw fa-check"></i> Sudah bayar
                          </button>
                        </td>
                      <?php else: ?>
                        <td><a href="" data-toggle="modal" data-target="#editMingguKe1<?= $duk['id_uang_kas']; ?>" class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah bayar</a></td>
                      <?php endif ?>
                    <?php else: ?>
                      <td><a href="<?= site_url('detail_bulan_pembayaran/editPembayaranUangKas/'.$duk['id_uang_kas']); ?>" data-toggle="modal" data-target="#editMingguKe1<?= $duk['id_uang_kas']; ?>" class="badge badge-danger"><?= number_format($duk['minggu_ke_1']); ?></a></td>
                    <?php endif ?>
                    <?php if ($duk['minggu_ke_1'] !== $duk['pembayaran_perminggu']): ?>
                      <td><---</td>
                      <td><---</td>
                      <td><---</td>
                    <?php else: ?>
                      <?php if ($duk['minggu_ke_2'] == $duk['pembayaran_perminggu']): ?>
                      <?php if ($duk['minggu_ke_3'] !== "0"): ?>
                        <td><button type="button" class="badge badge-success" data-container="body" data-toggle="popover" data-placement="top" data-content="Tidak bisa mengubah minggu ke 2, jika minggu ke 3 dan seterusnya sudah lunas, jika ingin mengubah, ubahlah minggu ke 3 atau ke 4 terlebih dahulu menjadi 0."><i class="fas fa-fw fa-check"></i> Sudah bayar</button></td>
                      <?php else: ?>
                        <td><a href="" data-toggle="modal" data-target="#editMingguKe2<?= $duk['id_uang_kas']; ?>" class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah bayar</a></td>
                      <?php endif ?>
                      <?php else: ?>
                        <td><a href="" data-toggle="modal" data-target="#editMingguKe2<?= $duk['id_uang_kas']; ?>" class="badge badge-danger"><?= number_format($duk['minggu_ke_2']); ?></a></td>
                      <?php endif ?>
                      <?php if ($duk['minggu_ke_2'] !== $duk['pembayaran_perminggu']): ?>
                        <td><---</td>
                        <td><---</td>
                      <?php else: ?>
                        <?php if ($duk['minggu_ke_3'] == $duk['pembayaran_perminggu']): ?>
                          <?php if ($duk['minggu_ke_4'] !== "0"): ?>
                            <td><button type="button" class="badge badge-success" data-container="body" data-toggle="popover" data-placement="top" data-content="Tidak bisa mengubah minggu ke 3, jika minggu ke 4 sudah lunas, jika ingin mengubah, ubahlah minggu ke 4 terlebih dahulu menjadi 0."><i class="fas fa-fw fa-check"></i> Sudah bayar</button></td>
                          <?php else: ?>
                            <td><a href="" data-toggle="modal" data-target="#editMingguKe3<?= $duk['id_uang_kas']; ?>" class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah bayar</a></td>
                          <?php endif ?>
                        <?php else: ?>
                          <td><a href="" data-toggle="modal" data-target="#editMingguKe3<?= $duk['id_uang_kas']; ?>" class="badge badge-danger"><?= number_format($duk['minggu_ke_3']); ?></a></td>
                        <?php endif ?>
                        <?php if ($duk['minggu_ke_3'] !== $duk['pembayaran_perminggu']): ?>
                          <td><---</td>
                        <?php else: ?>
                          <?php if ($duk['minggu_ke_4'] == $duk['pembayaran_perminggu']): ?>
                            <td><a href="" data-toggle="modal" data-target="#editMingguKe4<?= $duk['id_uang_kas']; ?>" class="badge badge-success"><i class="fas fa-fw fa-check"></i> Sudah bayar</a></td>
                          <?php else: ?>
                            <td><a href="" data-toggle="modal" data-target="#editMingguKe4<?= $duk['id_uang_kas']; ?>" class="badge badge-danger"><?= number_format($duk['minggu_ke_4']); ?></a></td>
                          <?php endif ?>
                        <?php endif ?>
                      <?php endif ?>
                    <?php endif ?>
                  </tr>
                    
                  <div class="modal fade" id="editMingguKe1<?= $duk['id_uang_kas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMingguKe1Label<?= $duk['id_uang_kas']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form method="post" action="<?php echo base_url().'detail_bulan_pembayaran/editPembayaranUangKas/' ?>">
                        <input type="hidden" name="id_uang_kas" value="<?= $duk['id_uang_kas']; ?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editMingguKe1Label<?= $dbp['id_bulan_pembayaran']; ?>">Ubah Minggu Ke-1 : <?= $duk['nama_siswa']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="minggu_ke_1">Minggu Ke-1</label>
                              <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran']; ?>">
                              <input type="hidden" name="minggu" value="1">
                              <input type="hidden" name="uang_sebelum" value="<?= $duk['minggu_ke_1']; ?>">
                              <input max="<?= $duk['pembayaran_perminggu']; ?>" type="number" name="minggu_ke_1" class="form-control" value="<?= $duk['minggu_ke_1']; ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                            <button type="submit" name="btnEditPembayaranUangKas" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="modal fade" id="editMingguKe2<?= $duk['id_uang_kas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMingguKe2Label<?= $duk['id_uang_kas']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form method="post" action="<?php echo base_url().'detail_bulan_pembayaran/editPembayaranUangKas/' ?>">
                        <input type="hidden" name="id_uang_kas" value="<?= $duk['id_uang_kas']; ?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editMingguKe2Label<?= $dbp['id_bulan_pembayaran']; ?>">Ubah Minggu Ke-2 : <?= $duk['nama_siswa']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="minggu_ke_2">Minggu Ke-2</label>
                              <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran']; ?>">
                              <input type="hidden" name="minggu" value="2">
                              <input type="hidden" name="uang_sebelum" value="<?= $duk['minggu_ke_2']; ?>">
                              <input max="<?= $duk['pembayaran_perminggu']; ?>" type="number" name="minggu_ke_2" class="form-control" value="<?= $duk['minggu_ke_2']; ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                            <button type="submit" name="btnEditPembayaranUangKas" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="modal fade" id="editMingguKe3<?= $duk['id_uang_kas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMingguKe3Label<?= $duk['id_uang_kas']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form method="post" action="<?php echo base_url().'detail_bulan_pembayaran/editPembayaranUangKas/' ?>">
                        <input type="hidden" name="id_uang_kas" value="<?= $duk['id_uang_kas']; ?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editMingguKe3Label<?= $dbp['id_bulan_pembayaran']; ?>">Ubah Minggu Ke-3 : <?= $duk['nama_siswa']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="minggu_ke_3">Minggu Ke-3</label>
                              <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran']; ?>">
                              <input type="hidden" name="minggu" value="3">
                              <input type="hidden" name="uang_sebelum" value="<?= $duk['minggu_ke_3']; ?>">
                              <input max="<?= $duk['pembayaran_perminggu']; ?>" type="number" name="minggu_ke_3" class="form-control" value="<?= $duk['minggu_ke_3']; ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                            <button type="submit" name="btnEditPembayaranUangKas" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="modal fade" id="editMingguKe4<?= $duk['id_uang_kas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMingguKe4Label<?= $duk['id_uang_kas']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form method="post" action="<?php echo base_url().'detail_bulan_pembayaran/editPembayaranUangKas/' ?>">
                        <input type="hidden" name="id_uang_kas" value="<?= $duk['id_uang_kas']; ?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editMingguKe4Label<?= $dbp['id_bulan_pembayaran']; ?>">Ubah Minggu Ke-4 : <?= $duk['nama_siswa']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="minggu_ke_4">Minggu Ke-4</label>
                              <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran']; ?>">
                              <input type="hidden" name="minggu" value="4">
                              <input type="hidden" name="uang_sebelum" value="<?= $duk['minggu_ke_4']; ?>">
                              <input max="<?= $duk['pembayaran_perminggu']; ?>" type="number" name="minggu_ke_4" class="form-control" value="<?= $duk['minggu_ke_4']; ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                            <button type="submit" name="btnEditPembayaranUangKas" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- <?php if ($current_user->id_jabatan != '0'): ?>
  <div class="modal fade" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form method="post" action="<?php echo base_url().'detail_bulan_pembayaran/bulan_pembayaran/' ?>">
        <?php foreach ($detail_bulan_pembayaran as $dbp): ?>
          <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran'] ?>">
        <?php endforeach ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="id_siswa">Nama Siswa</label>
              <select name="id_siswa" id="id_siswa" class="form-control">
                <?php foreach ($siswa_baru as $dsb): ?>
                  <option value="<?= $dsb['id_siswa']; ?>"><?= $dsb['nama_siswa']; ?></option>
                <?php endforeach ?>
              </select>
              <a href="<?= site_url('siswa') ?>">Tidak ada nama siswa diatas? Tambahkan siswa disini!</a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
            <button type="submit" name="btnTambahSiswa" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endif ?> -->
</div>

</body>
</html>
