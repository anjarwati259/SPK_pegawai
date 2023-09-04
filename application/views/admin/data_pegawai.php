<section class="content">
  <div class="container">
  	<div class="card card-outline card-primary">
      <div class="card-header">
        <!-- <h3 class="card-title">Data Pegawai</h3> -->

        <div class="">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-input">
            Tambah
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-1">
      	<div class="scrollmenu">
	        <table class="table" id="example2">
	          <thead>
	            <tr>
	              <th style="width: 10px">No</th>
	              <th>NIP</th>
	              <th>Nama</th>
	              <th>Pendidikan</th>
	              <th>Tanggal Masuk</th>
	              <th>Status</th>
	              <th>Golongan</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	        	<?php $no=1; foreach ($pegawai as $key => $value) {?>
	            <tr>
	            	<td><?php echo $no++; ?></td>
	            	<td><?php echo $value->nip ?></td>
	            	<td><?php echo $value->nama ?></td>
	            	<td><?php echo $value->pendidikan ?></td>
	            	<td><?php echo $value->tmk ?></td>
	            	<td><?php echo $value->status_pegawai ?></td>
	            	<td><?php echo $value->golongan ?></td>
	            	<td>
	            		<!-- detail -->
		                <!-- <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i></button> -->
		                <!-- edit -->
		                <button type="button" class="btn btn-success btn-sm btn-edit" 
		                data-nip="<?php echo $value->nip; ?>"
		                data-nama="<?php echo $value->nama; ?>"
		                data-pend="<?php echo $value->pendidikan; ?>"
		                data-tmk="<?php echo $value->tmk; ?>"
		                data-ttl="<?php echo $value->ttl; ?>"
		                data-gender="<?php echo $value->gender; ?>"
		                data-alamat="<?php echo $value->alamat; ?>"
		                data-status="<?php echo $value->status_pegawai; ?>"
		                data-gol="<?php echo $value->golongan; ?>"
		                data-toggle="modal" data-target="#modal-edit">
		                <i class="fas fa-edit" aria-hidden="true"></i></button>
		                <!-- hapus -->
		                <a href="<?php echo base_url('admin/del_pegawai/'.$value->nip) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
	            	</td>
	            </tr>
	        	<?php } ?>
	          </tbody>
	        </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</section>

<!-- modal input -->
<div class="modal fade" id="modal-input">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Tambah Pegawai</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form id="form_pegawai">
                <div class="card-body">
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>NIP</label>
		                    <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" required>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Nama Pegawai</label>
		                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pegawai" required>
		                </div>
                  	</div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea required="alamat Belum Di isi">
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Tanggal Lahir</label>
		                    <input type="text" name="tgl-lahir" class="form-control" id="tgl-lahir" required>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Tanggal Masuk</label>
		                    <input type="text" name="tgl-masuk" class="form-control" id="tgl-masuk" required>
		                </div>
                  	</div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Jenis Kelamin</label>
		                    <select class="form-control select2" id="gender">
				                <option value="Perempuan" selected="selected">Perempuan</option>
				                <option value="Laki - laki" selected="selected">Laki - laki</option>
			              	</select>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Pendidikan</label>
		                    <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Pendidikan">
		                </div>
                  	</div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Status Pegawai</label>
		                    <select class="form-control select2" id="status_pegawai">
				                <option value="Kontrak" selected="selected">Kontrak</option>
				                <option value="Tetap" selected="selected">Tetap</option>
			              </select>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Golongan</label>
		                    <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Password">
		                </div>
                  	</div>
                  </div>
                </div>
              </form>
	        </div>
	        <div class="modal-footer justify-content-between">
	          <button type="submit" id="input-pegawai" class="btn btn-primary">Simpan</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal edit -->
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Edit Pegawai</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form id="form_pegawai">
                <div class="card-body">
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>NIP</label>
		                    <input type="text" name="nip" class="form-control" id="nip-edit" placeholder="NIP" required>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Nama Pegawai</label>
		                    <input type="text" name="nama" class="form-control" id="nama-edit" placeholder="Nama Pegawai" required>
		                </div>
                  	</div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat-edit" class="form-control"></textarea required="alamat Belum Di isi">
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Tanggal Lahir</label>
		                    <input type="text" name="tgl-lahir" class="form-control" id="tgl-lahir-edit" required>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Tanggal Masuk</label>
		                    <input type="text" name="tgl-masuk" class="form-control" id="tgl-masuk-edit" required>
		                </div>
                  	</div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Jenis Kelamin</label>
		                    <select class="form-control select2" name="gender-edit" id="gender-edit">
				                <option value="Perempuan" selected="selected">Perempuan</option>
				                <option value="Laki - laki" selected="selected">Laki - laki</option>
			              </select>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Pendidikan</label>
		                    <input type="text" name="pendidikan" class="form-control" id="pendidikan-edit" placeholder="Pendidikan">
		                </div>
                  	</div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Status Pegawai</label>
		                    <select class="form-control select2" name="status-edit" id="status_pegawai-edit">
				                <option value="Kontrak" selected="selected">Kontrak</option>
				                <option value="Tetap" selected="selected">Tetap</option>
			              </select>
		                </div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                    <label>Golongan</label>
		                    <input type="text" name="golongan" class="form-control" id="golongan-edit" placeholder="Password">
		                </div>
                  	</div>
                  </div>
                </div>
              </form>
	        </div>
	        <div class="modal-footer justify-content-between">
	          <button type="submit" id="edit-pegawai" class="btn btn-primary">Simpan</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->