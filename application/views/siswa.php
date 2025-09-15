<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center mb-2">
                <div class="col-sm text-left">
                    <h1 class="m-0 text-dark">Siswa</h1>
                </div>
                <div class="col-sm text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswaModal">
                        <i class="fas fa-fw fa-plus"></i> Tambah Siswa
                    </button>
                    <!-- Modal -->
                    <div class="modal fade text-left" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="<?php echo base_url().'siswa/tambah_siswa' ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa</label>
                                            <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <input type="radio" id="pria" name="jenis_kelamin" value="pria"> <label for="pria">Pria</label> |
                                            <input type="radio" id="wanita" name="jenis_kelamin" value="wanita"> <label for="wanita">Wanita</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">No. Telepon</label>
                                            <input type="number" name="no_telepon" id="no_telepon" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                        <button type="submit" class="btn btn-primary" name="btnTambahSiswa"><i class="fas fa-fw fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table_id">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $ds): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= ucwords(htmlspecialchars_decode($ds['nama_siswa'])); ?></td>
                                        <td><?= ucwords($ds['jenis_kelamin']); ?></td>
                                        <td><?= $ds['no_telepon']; ?></td>
                                        <td><?= $ds['email']; ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="<?= site_url('siswa/edit_siswa/'.$ds['id_siswa']); ?>" class="badge badge-success" data-toggle="modal" data-target="#editSiswa<?= $ds['id_siswa']; ?>">
                                                <i class="fas fa-fw fa-edit"></i> Ubah
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editSiswa<?= $ds['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSiswa<?= $ds['id_siswa']; ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="post" action="<?php echo base_url().'siswa/edit_siswa/';?>">
                                                        <input type="hidden" name="id_siswa" value="<?= $ds['id_siswa']; ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editSiswaModalLabel<?= $ds['id_siswa']; ?>">Ubah Siswa</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_siswa<?= $ds['id_siswa']; ?>">Nama Siswa</label>
                                                                    <input type="text" id="nama_siswa<?= $ds['id_siswa']; ?>" value="<?= $ds['nama_siswa']; ?>" name="nama_siswa" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jenis Kelamin</label><br>
                                                                    <?php if ($ds['jenis_kelamin'] == 'pria'): ?>
                                                                        <input type="radio" id="pria<?= $ds['id_siswa']; ?>" name="jenis_kelamin" value="pria" checked="checked"> <label for="pria<?= $ds['id_siswa']; ?>">Pria</label> |
                                                                        <input type="radio" id="wanita<?= $ds['id_siswa']; ?>" name="jenis_kelamin" value="wanita"> <label for="wanita<?= $ds['id_siswa']; ?>">Wanita</label>
                                                                    <?php else: ?>
                                                                        <input type="radio" id="pria<?= $ds['id_siswa']; ?>" name="jenis_kelamin" value="pria"> <label for="pria<?= $ds['id_siswa']; ?>">Pria</label> |
                                                                        <input type="radio" id="wanita<?= $ds['id_siswa']; ?>" name="jenis_kelamin" value="wanita" checked="checked"> <label for="wanita<?= $ds['id_siswa']; ?>">Wanita</label>
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telepon<?= $ds['id_siswa']; ?>">No. Telepon</label>
                                                                    <input type="number" name="no_telepon" value="<?= $ds['no_telepon']; ?>" id="no_telepon<?= $ds['id_siswa']; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email<?= $ds['id_siswa']; ?>">Email</label>
                                                                    <input type="email" name="email" value="<?= $ds['email']; ?>" id="email<?= $ds['id_siswa']; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                                                <button type="submit" class="btn btn-primary" name="btnEditSiswa"><i class="fas fa-fw fa-save"></i> Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <a data-nama="<?= $ds['nama_siswa']; ?>" class="btn-delete badge badge-danger" href="<?= site_url('siswa/hapus_siswa/'.$ds['id_siswa']); ?>">
                                                <i class="fas fa-fw fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
