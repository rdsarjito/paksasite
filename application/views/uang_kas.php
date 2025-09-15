<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center mb-2">
                <div class="col-sm">
                    <h1 class="m-0 text-dark">Uang Kas</h1>
                </div><!-- /.col -->
                <div class="col-sm text-right">
                    <?php if ($current_user): // Check if current_user exists ?>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBulanPembayaranModal"><i class="fas fa-fw fa-plus"></i> Tambah Bulan</button>
                        <!-- Modal -->
                        <div class="modal fade text-left" id="tambahBulanPembayaranModal" tabindex="-1" role="dialog" aria-labelledby="tambahBulanPembayaranModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="<?php echo base_url().'uang_kas/tambah_bulan_pembayaran' ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahBulanPembayaranModalLabel">Tambah Bulan Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            
                                        </div>
                                        
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="nama_bulan">Nama Bulan</label>
                                                        <select name="nama_bulan" id="nama_bulan" class="form-control">
                                                            <option value="januari">Januari</option>
                                                            <option value="februari">Februari</option>
                                                            <option value="maret">Maret</option>
                                                            <option value="april">April</option>
                                                            <option value="mei">Mei</option>
                                                            <option value="juni">Juni</option>
                                                            <option value="juli">Juli</option>
                                                            <option value="agustus">Agustus</option>
                                                            <option value="september">September</option>
                                                            <option value="oktober">Oktober</option>
                                                            <option value="november">November</option>
                                                            <option value="desember">Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg">
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <input type="number" required name="tahun" value="<?= date('Y') + 1; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pembayaran_perminggu">Pembayaran Perminggu</label>
                                                <input type="number" name="pembayaran_perminggu" id="pembayaran_perminggu" required class="form-control" placeholder="Rp.">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                            <button type="submit" name="btnAddBulanPembayaran" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
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
            <div class="row justify-content-center">
                <div class="col-lg text-left">
                    <h5>Pilih Bulan Pembayaran</h5>
                </div>
            </div>
            <div class="row">
                <?php foreach ($bulan_pembayaran as $dbp): ?>
                    <?php 
                        $id_bulan_pembayaran = $dbp['id_bulan_pembayaran'];
                        $total_uang_kas_bulan_ini = $this->db->query("SELECT sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as total_uang_kas_bulan_ini FROM uang_kas WHERE id_bulan_pembayaran = '$id_bulan_pembayaran'")->row()->total_uang_kas_bulan_ini;
                    ?>
                    <div class="col-lg-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5><a href="detail_bulan_pembayaran.php?id_bulan_pembayaran=<?= $dbp['id_bulan_pembayaran']; ?>" class="text-dark"><?= ucwords($dbp['nama_bulan']); ?></a></h5>
                                <h6 class="text-muted"><?= $dbp['tahun']; ?></h6>
                                <h6>Rp. <?= number_format($dbp['pembayaran_perminggu']); ?> / minggu</h6>
                                <h6>Total Uang Kas Bulan Ini: <span class="my-2 btn btn-success">Rp. <?= $total_uang_kas_bulan_ini !== null ? number_format($total_uang_kas_bulan_ini) : '0'; ?></span></h6>
                                <a href="<?= site_url('detail_bulan_pembayaran/bulan_pembayaran/'.$dbp['id_bulan_pembayaran']) ?>" class="btn btn-info"><i class="fas fa-fw fa-align-justify"></i></a>
                                <!-- <button type="button" data-toggle="modal" data-target="#editBulanPembayaranModal<?= $dbp['id_bulan_pembayaran']; ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></button> -->
                                <!-- Modal -->
                                <div class="modal fade" id="editBulanPembayaranModal<?= $dbp['id_bulan_pembayaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="editBulanPembayaranModalLabel<?= $dbp['id_bulan_pembayaran']; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post">
                                            <input type="hidden" name="id_bulan_pembayaran" value="<?= $dbp['id_bulan_pembayaran']; ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editBulanPembayaranModalLabel<?= $dbp['id_bulan_pembayaran']; ?>">Ubah Bulan Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">
                                                                <label for="nama_bulan<?= $dbp['id_bulan_pembayaran']; ?>">Nama Bulan</label>
                                                                <input type="hidden" name="nama_bulan" value="<?= $dbp['nama_bulan']; ?>">
                                                                <input style="cursor: not-allowed;" disabled type="text" class="form-control" id="nama_bulan<?= $dbp['id_bulan_pembayaran']; ?>" value="<?= $dbp['nama_bulan']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg">
                                                            <div class="form-group">
                                                                <label for="tahun<?= $dbp['id_bulan_pembayaran']; ?>">Tahun</label>
                                                                <input type="hidden" name="tahun" value="<?= $dbp['tahun']; ?>">
                                                                <input style="cursor: not-allowed;" disabled type="number" id="tahun<?= $dbp['id_bulan_pembayaran']; ?>" value="<?= $dbp['tahun']; ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pembayaran_perminggu<?= $dbp['id_bulan_pembayaran']; ?>">Pembayaran Perminggu</label>
                                                        <input type="number" name="pembayaran_perminggu" id="pembayaran_perminggu<?= $dbp['id_bulan_pembayaran']; ?>" required class="form-control" placeholder="Rp." value="<?= $dbp['pembayaran_perminggu']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                                    <button type="submit" name="btnEditBulanPembayaran" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <a href="<?= site_url('uang_kas/hapus_bulan_pembayaran/'.$dbp['id_bulan_pembayaran']) ?>" class="btn btn-danger btn-delete" data-nama="<?= ucwords($dbp['nama_bulan']); ?> | <?= $dbp['tahun']; ?>"><i class="fas fa-fw fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- ... Kode HTML yang lain ... -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- ... Kode HTML yang lain ... -->
        </div>
    </section>
    <!-- /.content -->
</div>

<?php if ($this->session->flashdata('message')) : ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>

