<section class="content">
  <div class="container">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Penilaian Pegawai</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pegawai</label>
              <select class="form-control select2" id="sel" style="max-width: 50%">
                <option selected="selected">-- Pilih Pegawai --</option>
                <?php foreach ($pegawai as $key => $value) {?>
                <option value="<?php echo $value->nip ?>"><?php echo $value->nama ?></option>
              <?php } ?>
              </select>
            </div>
            <!-- detail identitas Pegawai -->
            <form id="form-detail">
              <table>
                <tr>
                  <th>Nama Penilai</th>
                  <th>:</th>
                  <td id="penilai"></t>
                </tr>
                <tr>
                  <th>Nama Pegawai</th>
                  <th>:</th>
                  <td id="pegawai"></td>
                </tr>
                <tr>
                  <th>NIP</th>
                  <th>:</th>
                  <td id="nip"></td>
                </tr>
              </table>
            </form>
            <!-- form penilaian -->
            <div class="card card-outline card-info" style="margin-top: 50px;">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <?php foreach ($kriteria_1 as $key => $value) {
                      $id_kriteria = $value->id_kriteria;
                      $this->db->select('*');
                      $this->db->from('nilai_kriteria');
                      $this->db->where('id_kriteria', $id_kriteria);
                      $nilai_kriteria = $this->db->get()->result();
                      ?>
                      <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $value->nama_kriteria ?> - <?php echo $value->keterangan ?></label>
                      <select class="form-control" id="<?php echo $value->nama_kriteria ?>" style="max-width: 100%">
                        <option value="0" selected="selected">---Pilih---</option>
                        <?php foreach ($nilai_kriteria as $key => $value) {?>
                        <option value="<?php echo $value->id_nilai_kriteria ?>"><?php echo $value->keterangan ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  <?php } ?>
                  </div>
                  <!-- col -->
                   <div class="col-md-6">
                    <?php foreach ($kriteria_2 as $key => $value) {
                      $id_kriteria = $value->id_kriteria;
                      $this->db->select('*');
                      $this->db->from('nilai_kriteria');
                      $this->db->where('id_kriteria', $id_kriteria);
                      $nilai_kriteria_2 = $this->db->get()->result();
                      ?>
                      <div class="form-group">
                      <label for="exampleInputEmail1"><?php echo $value->nama_kriteria ?> - <?php echo $value->keterangan ?></label>
                      <select class="form-control" id="<?php echo $value->nama_kriteria ?>" style="max-width: 100%">
                        <option value="0" selected="selected">---Pilih---</option>
                        <?php foreach ($nilai_kriteria_2 as $key => $value) {?>
                        <option value="<?php echo $value->id_nilai_kriteria ?>"><?php echo $value->keterangan ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  <?php } ?>
                  </div> 
                  <!-- col -->
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" id="proses-data" class="btn btn-info float-right">Proses Data</button>
              </div>
              <!-- footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

<!-- modal alert -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Alert!!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php foreach ($kriteria as $key => $value) {?>
        <input type="hidden" name="" id="M<?php echo $value->nama_kriteria ?>">
      <?php } ?>
      <input type="hidden" name="" id="Mnip">
        <p>Pegawai Yang anda pilih sudah pernah dinilai!! apakah anda ingin menilai ulang? Tekan <strong style="color: red;">OK</strong> jika ingin menilai ulang, tekan <strong style="color: red;">Cancel</strong> untuk membatalkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        <button type="submit" id="btn-ok" class="btn btn-danger">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->