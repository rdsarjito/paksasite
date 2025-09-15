<!DOCTYPE html>
<html>
<head>
  <title>Laporan</title>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  <style>
  	@media print {
	  	.not-printed {
	  		display: none;
	  	}
	  	.total {
	  		color: black !important;
	  	}
  	}
	
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
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="not-printed row justify-content-center">
        	<div class="col-lg-5 mr-0">
        		<h3>Pemasukkan</h3>
        		<form method="post">
        			<div class="form-group">
        				<label for="id_bulan_pembayaran">Pilih Bulan Pembayaran</label>
	        			<select name="id_bulan_pembayaran" id="id_bulan_pembayaran" class="form-control">
	        				<?php if (isset($_POST['btnLaporanPemasukkan'])): ?>
                                <?php foreach ($sql as $fetch_sql): ?>
		        				    <option value="<?= $fetch_sql['id_bulan_pembayaran']; ?>"><?= ucwords($fetch_sql['nama_bulan']); ?> | <?= $fetch_sql['tahun']; ?> | Rp. <?= number_format($fetch_sql['pembayaran_perminggu']); ?></option>
		        				    <option disabled>----</option>
		        			    <?php endforeach ?>
	        					
	        				<?php endif ?>
		        			<?php foreach ($bulan_pembayaran as $dbp): ?>
		        				<option value="<?= $dbp['id_bulan_pembayaran']; ?>"><?= ucwords($dbp['nama_bulan']); ?> | <?= $dbp['tahun']; ?> | Rp. <?= number_format($dbp['pembayaran_perminggu']); ?></option>
		        			<?php endforeach ?>
	        			</select>
        			</div>
        			<div class="form-group">
        				<button type="submit" name="btnLaporanPemasukkan" class="btn btn-custom">Laporan Pemasukkan</button>
        			</div>
        		</form>
        	</div>
        	<div class="col-lg-5 ml-0">
        		<h3>Pengeluaran</h3>
        		<form method="post">
        			<div class="row">
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="dari_tanggal">Dari Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPengeluaran'])): ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= $_POST['dari_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= date('Y-m-01'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="sampai_tanggal">Sampai Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanPengeluaran'])): ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= $_POST['sampai_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= date('Y-m-d'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        			</div>
        			<div class="form-group">
        				<button type="submit" name="btnLaporanPengeluaran" class="btn btn-custom">Laporan Pengeluaran</button>
        			</div>
        		</form>
        	</div>
        </div>
        <?php if (isset($_POST['btnLaporanPemasukkan'])): ?>
        	<hr class="not-printed">
        	<button onclick="return print()" class="not-printed btn btn-custom"><i class="fas fa-fw fa-print"></i> Print</button>
        	<div class="row m-1">
	        	<div class="col-lg m-1">
	        		<h2 class="text-center mb-3 mt-2">Laporan Pemasukkan</h2>
	        		<h3 class="text-left mb-3">Laporan Pada Bulan: <?= ucwords($fetch_sql['nama_bulan']); ?>, Tahun: <?= $fetch_sql['tahun']; ?>, Pembayaran Perminggu: Rp. <?= number_format($fetch_sql['pembayaran_perminggu']); ?></h3>
	        		<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
	        				<thead>
	        					<tr>
	        						<th>No.</th>
	        						<th>Nama Siswa</th>
	        						<th>Minggu Ke-1</th>
	        						<th>Minggu Ke-2</th>
	        						<th>Minggu Ke-3</th>
	        						<th>Minggu Ke-4</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<?php $i = 1; ?>
	        					<?php foreach ($sql as $ds): ?>
	        						<tr>
	        							<td><?= $i++; ?></td>
	        							<td><?= ucwords(htmlspecialchars_decode($ds['nama_siswa'])); ?></td>
	        							<?php if ($ds['minggu_ke_1'] == $ds['pembayaran_perminggu']): ?>
					                      <td class="text-success"><?= number_format($ds['minggu_ke_1']); ?></td>
					                    <?php else: ?>
					                      <td class="text-danger"><?= number_format($ds['minggu_ke_1']); ?></td>
					                    <?php endif ?>

					                    <?php if ($ds['minggu_ke_2'] == $ds['pembayaran_perminggu']): ?>
					                      <td class="text-success"><?= number_format($ds['minggu_ke_2']); ?></td>
					                    <?php else: ?>
					                      <td class="text-danger"><?= number_format($ds['minggu_ke_2']); ?></td>
					                    <?php endif ?>

					                    <?php if ($ds['minggu_ke_3'] == $ds['pembayaran_perminggu']): ?>
					                      <td class="text-success"><?= number_format($ds['minggu_ke_3']); ?></td>
					                    <?php else: ?>
					                      <td class="text-danger"><?= number_format($ds['minggu_ke_3']); ?></td>
					                    <?php endif ?>

					                    <?php if ($ds['minggu_ke_4'] == $ds['pembayaran_perminggu']): ?>
					                      <td class="text-success"><?= number_format($ds['minggu_ke_4']); ?></td>
					                    <?php else: ?>
					                      <td class="text-danger"><?= number_format($ds['minggu_ke_4']); ?></td>
					                    <?php endif ?>
	        						</tr>
	        					<?php endforeach ?>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
	        <div class="row mx-1 mb-1 mt-0">
    			<div class="col-lg-4">
    				<?php 
                        //  $jml_uang_kas = $this->db->query("SELECT *, sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as jml_uang_kas FROM uang_kas INNER JOIN bulan_pembayaran ON bulan_pembayaran.id_bulan_pembayaran = uang_kas.id_bulan_pembayaran WHERE bulan_pembayaran.id_bulan_pembayaran = '$id_bulan_pembayaran'");
                        //  $jml_uang_kas->result_array(); 
    				?>
                    <?php foreach ($jml_uang_kas as $juk): ?>
		        		<div class="p-3 rounded bg-success total">Total Pemasukkan: Rp. <?= number_format($juk['jml_uang_kas']); ?></div>
		        	<?php endforeach ?>
		    		
    			</div>
    		</div>
        <?php endif ?>
        <?php if (isset($_POST['btnLaporanPengeluaran'])): 
                $dari_tanggal_date = htmlspecialchars($_POST['dari_tanggal']);
                $sampai_tanggal_date = htmlspecialchars($_POST['sampai_tanggal']);
                // $dari_tanggal = strtotime(htmlspecialchars($_POST['dari_tanggal'] . " 00:00:00"));
                // $sampai_tanggal = strtotime(htmlspecialchars($_POST['sampai_tanggal'] . " 23:59:59"));     
            ?>
            
        	<hr class="not-printed">
        	<button onclick="return print()" class="not-printed btn btn-custom"><i class="fas fa-fw fa-print"></i> Print</button>
        	<div class="row m-1 mb-0">
	        	<div class="col-lg m-1">
	        		<h2 class="text-center mb-3 mt-2">Laporan Pengeluaran</h2>
	        		<h3 class="text-left mb-3">Laporan Dari Tanggal: <?= $dari_tanggal_date; ?> Sampai Tanggal: <?= $sampai_tanggal_date; ?></h3>
	        		<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
	        				<thead>
							<tr>
								<th style="width: 5%;">No.</th>
								<th style="width: 10%;">Pengeluaran</th>
								<th style="width: 65%;">Keterangan</th>
								<th style="width: 20%;">Tanggal Pengeluaran</th>
								<!-- <th>Username</th> -->
							</tr>
	        				</thead>
	        				<tbody>
	        					<?php $i = 1; ?>
	        					<?php $total_pengeluaran = '0'; ?>
	        					<?php foreach ($sql as $ds): ?>
	        						<tr>
	        							<td><?= $i++; ?></td>
	        							<td><?= number_format($ds['jumlah_pengeluaran']); ?></td>
	        							<td><?= $ds['keterangan']; ?></td>
	        							<td><?= date('d-m-Y, H:i:s', $ds['tanggal_pengeluaran']); ?></td>
	        							<!-- <td><?= $ds['username']; ?></td> -->
	        						</tr>
	        						<?php 
	        							$total_pengeluaran += $ds['jumlah_pengeluaran'];
	        						?>
	        					<?php endforeach ?>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
    		<div class="row mx-1 mb-1 mt-0">
    			<div class="col-lg-4">
		    		<div class="p-3 rounded bg-success total">Total Pengeluaran: Rp. <?= number_format($total_pengeluaran); ?></div>
    			</div>
    		</div>
        <?php endif ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<script>
		$(document).ready(function() {
			function print() {
				window.print();
			}
		});
	</script>
</div>
</body>
</html>
