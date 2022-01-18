<section class="content">
  <div class="container">
    <!-- evaluasi -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Evalusi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap table-bordered">
          <thead>
            <tr>
              <th rowspan="2">Nama</th>
              <th colspan="<?php echo $total; ?>" style="text-align: center;">Kriteria</th>
            </tr>
            <tr>
              <?php foreach ($kriteria as $key => $value) { ?>
                <th><?php echo $value->nama_kriteria ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pegawai as $key => $value) {
              $nip = $value->nip;
              $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
              $this->db->from('penilaian');
              $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
              $this->db->where('penilaian.nip', $nip);
              $data = $this->db->get()->result();
              ?>
              <tr>
                <td><?php echo $value->nama ?></td>
                <?php foreach ($data as $key => $value2) {?>
                  <td><?php echo $value2->nilai ?></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- normalisasi -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Normalisasi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap table-bordered">
          <thead>
            <tr>
              <th rowspan="2">Nama</th>
              <th colspan="<?php echo $total; ?>" style="text-align: center;">Kriteria</th>
            </tr>
            <tr>
              <?php foreach ($kriteria as $key => $value) { ?>
                <th><?php echo $value->nama_kriteria ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pegawai as $key => $value) {
              $nip = $value->nip;
              // nilai matrix
              $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
              $this->db->from('penilaian');
              $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
              $this->db->where('penilaian.nip', $nip);
              $data = $this->db->get()->result();

              ?>
              <tr>
                <td><?php echo $value->nama ?></td>
                <?php foreach ($data as $key => $value2) {
                  $id_kriteria = $value2->id_kriteria;
                  $nilai = $value2->nilai;
                  $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
                  $this->db->from('penilaian');
                  $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
                  $this->db->where('penilaian.id_kriteria', $id_kriteria);
                  $objNilai = $this->db->get()->result();
                  $arraydata = array();
                  foreach ($objNilai as $key => $objNilai) {
                     array_push($arraydata,$objNilai->nilai);
                  }
                  //get normalisasi
                  $normalisasi = round(($nilai/max($arraydata)),2);
                  ?>
                  <td><?php echo $normalisasi ?></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Perangkingan -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Perangkingan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap table-bordered">
          <thead>
            <tr>
              <th rowspan="2">Nama</th>
              <th colspan="<?php echo $total; ?>" style="text-align: center;">Kriteria</th>
            </tr>
            <tr>
              <?php foreach ($kriteria as $key => $value) { ?>
                <th><?php echo $value->nama_kriteria ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pegawai as $key => $value) {
              $nip = $value->nip;
              // nilai matrix
              $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
              $this->db->from('penilaian');
              $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
              $this->db->where('penilaian.nip', $nip);
              $data = $this->db->get()->result();

              ?>
              <tr>
                <td><?php echo $value->nama ?></td>
                <?php foreach ($data as $key => $value2) {
                  $id_kriteria = $value2->id_kriteria;
                  $nip = $value2->nip;
                  $nilai = $value2->nilai;
                  $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
                  $this->db->from('penilaian');
                  $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
                  $this->db->where('penilaian.id_kriteria', $id_kriteria);
                  $objNilai = $this->db->get()->result();
                  $arraydata = array();
                  foreach ($objNilai as $key => $objNilai) {
                     array_push($arraydata,$objNilai->nilai);
                  }
                  //get normalisasi
                  $normalisasi = round(($nilai/max($arraydata)),2);
                  $this->db->select('*');
                  $this->db->from('bobot');
                  $this->db->where('id_kriteria', $id_kriteria);
                  $arrbobot = $this->db->get()->result();
                  $bobot = 0;
                  foreach ($arrbobot as $key => $value3) {
                    $bobot = $value3->bobot;
                  }
                  $hasil = $normalisasi * $bobot;
                  ?>
                  <?php  
                    $this->db->select('*');
                    $this->db->from('hasil');
                    $this->db->where('nip', $nip);
                    $arrhasil = $this->db->get()->result();
                  ?>
                  <td><?php echo $hasil ?></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Perangkingan -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Perangkingan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Hasil Penghitungan</th>
              <th>Hasil</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pegawai as $key => $value) {
              $nip = $value->nip;
              // nilai matrix
              $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
              $this->db->from('penilaian');
              $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
              $this->db->where('penilaian.nip', $nip);
              $data = $this->db->get()->result();
              ?>
              <tr>
                <td><?php echo $value->nama ?></td>
                <?php $hasil2=0; foreach ($data as $key => $value2) {
                  $id_kriteria = $value2->id_kriteria;
                  $nilai = $value2->nilai;
                  $this->db->select('penilaian.*,nilai_kriteria.nilai as nilai');
                  $this->db->from('penilaian');
                  $this->db->join('nilai_kriteria','nilai_kriteria.id_nilai_kriteria = penilaian.id_nilai_kriteria', 'left');
                  $this->db->where('penilaian.id_kriteria', $id_kriteria);
                  $objNilai = $this->db->get()->result();
                  $arraydata = array();
                  foreach ($objNilai as $key => $objNilai) {
                     array_push($arraydata,$objNilai->nilai);
                  }
                  //get normalisasi
                  $normalisasi = round(($nilai/max($arraydata)),2);
                  $this->db->select('*');
                  $this->db->from('bobot');
                  $this->db->where('id_kriteria', $id_kriteria);
                  $arrbobot = $this->db->get()->result();
                  $bobot = 0;
                  foreach ($arrbobot as $key => $value3) {
                    $bobot = $value3->bobot;
                  }
                  $hasil = $normalisasi * $bobot;
                  $hasil2+=$hasil;
                }
                $arrhasil = array('nip' => $nip,
                                  'hasil' => $hasil2,
                                  'tanggal' => date('Y-m-d'));
                simpan_hasil($nip,$arrhasil);
                  ?>
                  <td><?php echo $hasil2; ?></td>
                  <td><span class="badge bg-danger">Cukup</span></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
</section>
