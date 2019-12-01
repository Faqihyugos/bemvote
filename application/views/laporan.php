<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan BEM-VOTE</title>
    <style media="screen">
    *{
      padding: 0;
      margin: 0;
    }
    table td, table th{
      border: 2px solid black;
      padding: 5px;
      text-align: center;
    }
    body{
      height: 100vh;
      width: 1000px;
      margin: 0 auto;
    }
    .container{
      font-family: sans-serif;
      color: black;
      text-align: center;
      word-wrap: break-word;
      padding: 10px;
    }
    table{
      width:750px;
      margin: 0 auto;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Laporan BEM-VOTE</h1>
      <br><br><br>
      <h2>Laporan Capres & Cawapres BEM</h2>
      <br>
      <h3>Data Capres & Cawapres BEM</h3>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Nama Koalisi</th>
          <th>Nama Paslon</th>
          <th>Jurusan Koalisi</th>
          <th>Nomor Urut</th>
        </tr>
        <?php foreach($paslons as $paslon): ?>
        <tr>
          <td><?= $paslon->nama_koalisi ?></td>
          <td><?= $paslon->nama_paslon ?></td>
          <td><?= $paslon->Jurusan_koalisi ?></td>
          <td><?= $paslon->nomor_urut ?></td>
        </tr>
      <?php endforeach ?>
      </table>
      <br><br>

      <h4>Live Count</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Nama Paslon</th>
          <th>Presentasi suara (%)</th>
          <th>Jumlah suara (Orang)</th>
        </tr>
        <tr>
          <td><?= $paslonSatu->nama_paslon ?></td>
          <td><?= $totalSuaraMasukSatuStat ?></td>
          <td><?= $totalSuaraMasukSatu ?></td>
        </tr>
        <tr>
          <td><?= $paslonDua->nama_paslon ?></td>
          <td><?= $totalSuaraMasukDuaStat ?></td>
          <td><?= $totalSuaraMasukDua ?></td>
        </tr>
      </table>

      <br><br>
      <h4>Statistik Pemilihan</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Total Suara Masuk (Orang)</th>
          <th>Total Pemilih (Orang)</th>
          <th>Total Tidak Memilih (Orang)</th>
          <th>Presentasi Pemilih (%)</th>
        </tr>
        <tr>
          <td><?= $totalSuaraMasuk ?></td>
          <td><?= $totalPemilih ?></td>
          <td><?= $totalTidakMemilih ?></td>
          <td><?= $totalSuaraMasukStat ?></td>
        </tr>
      </table>

      <br><br>
      <h4>Statistik Pemilih Tiap Jurusan</h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Jurusan</th>
          <th>Total Pemilih (Orang)</th>
          <th>Total Suara Masuk (Orang)</th>
          <th>Total Tidak Memilih (Orang)</th>
          <th>Presentasi Suara Masuk (%)</th>
        </tr>
        <tr>
          <td>Sistem Informasi</td>
          <td><?= $totalPemilihSI ?></td>
          <td><?= $totalSuaraMasukSI ?></td>
          <td><?= $totalTidakMemilihSI ?></td>
          <td><?= $totalSuaraMasukSIStat ?></td>
        </tr>
        <tr>
          <td>Sistem Komputer</td>
          <td><?= $totalPemilihSK ?></td>
          <td><?= $totalSuaraMasukSK ?></td>
          <td><?= $totalTidakMemilihSK ?></td>
          <td><?= $totalSuaraMasukSKStat ?></td>
        </tr>
        <tr>
          <td>Manajemen Informasi</td>
          <td><?= $totalPemilihMI ?></td>
          <td><?= $totalSuaraMasukMI ?></td>
          <td><?= $totalTidakMemilihMI ?></td>
          <td><?= $totalSuaraMasukMIStat ?></td>
        </tr>
      </table>
    </div>
  </body>
</html>
