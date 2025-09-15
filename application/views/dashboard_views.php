<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body onload="document.forms['form1'].submit()">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mt-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jumlah_siswa; ?></h3>
                <p class="text-muted text-white">Jumlah Siswa</p> 
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-user-tie"></i>
              </div>
              <a href="<?= site_url('siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3 class="text-muted text-white">Rp. <?= isset($jumlah_pemasukan) ? number_format($jumlah_pemasukan) : '0'; ?></h3>

                <p class="text-muted text-white">Jumlah Pemasukan</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-caret-up"></i>
              </div>
              <a href="<?= site_url('uang_kas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-muted text-white">Rp. <?= isset($jumlah_pengeluaran) ? number_format($jumlah_pengeluaran) : '0'; ?></h3>

                <p class="text-muted text-white">Jumlah Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-caret-down"></i>
              </div>
              <a href="<?= site_url('pengeluaran') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="text-muted text-white">Rp. <?= number_format($jumlah_uang_kas - $jumlah_pengeluaran); ?></h3>

                <p class="text-muted text-white">Uang Kas</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-dollar-sign"></i>
              </div>
              <a href="<?= site_url('uang_kas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
              <section class="col-lg-6 connectedSortable">
                <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-bar mr-1"></i>
                      Grafik Kas
                    </h3>
                    <div class="card-tools">
                      <?php $year=date("Y")?>
                      <form method="post" action="<?php echo base_url().'dashboard/' ?>" id="form">    
                        <input type="hidden" id="tahun" name='tahun' value=<?= $year ?>>                                
                      </form>
                      <?php if (!isset($_POST['tahun'])): ?>
                        <script>
                          document.getElementById("form").submit();
                        </script>
                      <?php endif ?>
                      <form method="post" action="<?php echo base_url().'dashboard/' ?>">
                        <select name='tahun' id="tahun" onchange='if(this.value != 0) { this.form.submit(); }'>
                          <option></option>     
                          <?php foreach ($bulan_pembayaran as $bp): ?>                         
                            <option name='tahun' value="<?= $bp['tahun']; ?>" <?php if (@$_POST['tahun']==$bp['tahun']) echo "selected='selected'"; ?>>
                              <?= $bp['tahun']; ?>
                            </option>              
                          <?php endforeach ?>
                        </select>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <canvas id="myChart" height="175" style="height: 175px;"></canvas>
                      <?php
                      $nama_bulan = "";
                      $jumlah_pemasukan = null;
                      $jumlah_pengeluaran = null;

                      foreach ($hasil as $item) {
                        $nam = $item->nama_bulan;
                        $nama_bulan .= "'$nam'". ", ";

                        $total = $item->total;
                        $jumlah_pemasukan .= "'$total'". ", ";
                      }
                      foreach ($pengeluaran as $keluar) {
                        $totalP = $keluar->jumlah_pengeluaran;
                        $jumlah_pengeluaran .= "'$totalP'". ", ";
                      }
                      ?>
                      <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var chart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [<?php echo $nama_bulan; ?>],
                            datasets: [{
                              label: 'Pemasukan Uang Kas',
                              backgroundColor: Array(12).fill('rgb(255, 193, 7)'),
                              fill: false,
                              data: [<?php echo $jumlah_pemasukan; ?>]
                            }, {
                              label: 'Pengeluaran Uang Kas',
                              backgroundColor: Array(12).fill('rgb(220, 53, 69)'),
                              fill: false,
                              data: [<?php echo $jumlah_pengeluaran; ?>]
                            }]
                          },
                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                        });
                      </script>
                    </div>
                  </div>
                </div>
              </section>

              <section class="col-lg-6 connectedSortable">
                <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-bar mr-1"></i>
                      Grafik Kas
                    </h3>
                    <div class="card-tools">
                      <?php $year = date("Y") ?>
                      <form method="post" action="<?php echo base_url().'dashboard/' ?>" id="form">    
                        <input type="hidden" id="tahun" name='tahun' value=<?= $year ?>>                                
                      </form>
                      <?php if (!isset($_POST['tahun'])): ?>
                        <script>
                          document.getElementById("form").submit();
                        </script>
                      <?php endif ?>
                      <form method="post" action="<?php echo base_url().'dashboard/' ?>">
                        <select name='tahun' id="tahun" onchange='if(this.value != 0) { this.form.submit(); }'>
                          <option></option>     
                          <?php foreach ($bulan_pembayaran as $bp): ?>                         
                            <option name='tahun' value="<?= $bp['tahun']; ?>" <?php if (@$_POST['tahun']==$bp['tahun']) echo "selected='selected'"; ?>>
                              <?= $bp['tahun']; ?>
                            </option>              
                          <?php endforeach ?>
                        </select>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="myChart2" height="175" style="height: 175px;"></canvas>
                    <?php
                    $jumlah_pemasukan = array_sum(array_column($hasil, 'total'));
                    $jumlah_pengeluaran = array_sum(array_column($pengeluaran, 'jumlah_pengeluaran'));
                    ?>
                    <script>
                      var ctx = document.getElementById('myChart2').getContext('2d');
                      var chart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: ['Pemasukan', 'Pengeluaran'],
                          datasets: [{
                            label: 'Grafik Kas',
                            backgroundColor: ['rgb(255, 193, 7)', 'rgb(220, 53, 69)'],
                            data: [<?php echo $jumlah_pemasukan; ?>, <?php echo $jumlah_pengeluaran; ?>]
                          }]
                        },
                        options: {
                          responsive: true,
                          legend: {
                            position: 'top',
                          },
                          animation: {
                            animateScale: true,
                            animateRotate: true
                          }
                        }
                      });
                    </script>
                  </div>

                </div>
              </section>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
