 <?php

include("config.php");

?>

 <div class="app-title">

        <div>

          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>

          <p>Online Job Vacancy</p>

        </div>

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

        </ul>

      </div>

<div class="row">

       

        <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon"><i class="icon fa fa-industry fa-3x"></i>

            <div class="info">

              <h4>Perusahaan</h4>

              <p><b><?php $result = mysql_query("SELECT COUNT(*) FROM perusahaan;");

              echo mysql_result($result, 0); ?></b></p>

            </div>

          </div>

        </div>

        <div class="col-md-6 col-lg-3">

          <div class="widget-small warning coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>

            <div class="info">

              <h4>Lowongan</h4>

              <p><b><?php $result = mysql_query("SELECT COUNT(*) FROM lowongan where deleted='0';");

              echo mysql_result($result, 0); ?></b></p>

            </div>

          </div>

        </div>

         <div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">

              <h4>Pelamar</h4>

              <p><b><?php $result = mysql_query("SELECT COUNT(*) FROM pelamar;");

              echo mysql_result($result, 0); ?></b></p>

            </div>

          </div>

        </div>

        <div class="col-md-6 col-lg-3">

          <div class="widget-small danger coloured-icon"><i class="icon fa fa-folder fa-3x"></i>

            <div class="info">

              <h4>Laporan</h4>

              <p><b><?php $result = mysql_query("SELECT COUNT(*) FROM laporan;");

              echo mysql_result($result, 0); ?></b></p>

            </div>

          </div>

        </div>

      </div>

     



      <div class="row">

     

      <div class="row">

        <div class="col-md-6">

          <div class="tile">

            <h3 class="tile-title">Chart Pelamar</h3>

            <div class="embed-responsive embed-responsive-16by9">

              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>

            </div><br><br>

          </div>

        </div>

        <div class="col-md-6">

          <div class="tile">

            <h3 class="tile-title">Tata Cara Penggunaan</h3>

            <ul>

              <li>Untuk mengelola data perusahaan, silahkan pilih menu <i class="fa fa-industry"></i><strong> Perusahaan</strong></li>

              <li>Untuk mengelola data lowongan, silahkan pilih menu <br><i class="fa fa-file-text"></i><strong> Lowongan</strong></li>

              <li>Untuk mengelola data pelamar, silahkan pilih menu <i class="fa fa-users"></i><strong> Pelamar</strong></li>

              <li>Untuk mengelola kandidat pelamar, silahkan pilih menu <i class="fa fa-check"></i><strong> Kandidat</strong></li>

              <li>Untuk melihat semua laporan yang terjadi di online job vacancy, silahkan pilih menu <i class="fa fa-folder"></i><strong> Laporan</strong></li>

            </ul>

            Apabila kurang jelas atau terdapat kendala dalam pengoperasian sistem, silahkan menghubungi administrator website di <a href="mailto:edwin@winsekai.my.id?subject=Kendala pengoperasian website Online Job Vacancy">edwin@winsekai.my.id</a>.

          </div>

        </div>

      </div>