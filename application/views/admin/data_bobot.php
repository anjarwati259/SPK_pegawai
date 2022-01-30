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
      	<div style="overflow-x:auto;">
	        <table class="table" id="example2">
	          <thead>
	            <tr>
	              <th style="width: 10px">No</th>
	              <th style="max-width: 300px;">Kriteria</th>
	              <th>Nilai</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	        	<?php $no=1; foreach ($bobot as $key => $value) {?>
	            <tr>
	            	<td><?php echo $no++; ?></td>
	            	<td style="max-width: 300px;"><?php echo $value->nama_kriteria ?> - <?php echo $value->ket ?></td>
	            	<td><?php echo $value->bobot ?></td>
	            	<td>
		                <!-- edit -->
		                <button type="button" class="btn btn-success btn-sm btn-edit" 
		                data-id="<?php echo $value->id_bobot; ?>"
		                data-kriteria="<?php echo $value->id_kriteria; ?>"
		                data-bobot="<?php echo $value->bobot; ?>"
		                data-toggle="modal" data-target="#modal-edit">
		                <i class="fas fa-edit" aria-hidden="true"></i></button>
		                <!-- hapus -->
		                <a href="<?php echo base_url('admin/del_bobot/'.$value->id_bobot) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? Dengan menghapus data ini, data anda yang berkaitan dengan data ini juga akan ikut terhapus.')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

<!-- input criteria -->
<div class="modal fade" id="modal-input">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Tambah Kriteria</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form id="form_pegawai">
                <div class="card-body">
                    <div class="form-group">
	                    <label>Kriteria</label>
	                    <select class="form-control select2" id="kriteria">
	                    	<?php foreach ($kriteria as $key => $key2) {?>
			                <option value="<?php echo $key2->id_kriteria ?>" selected="selected"><?php echo $key2->nama_kriteria ?> - <?php echo $key2->keterangan ?></option>
			            	<?php } ?>
		              	</select>
	                </div>
	                <div class="form-group">
	                    <label>Bobot</label>
	                    <input type="number" step="0.01" class="form-control" id="bobot"></textarea>
	                </div>
                </div>
              </form>
	        </div>
	        <div class="modal-footer justify-content-between">
	          <button type="submit" id="input-bobot" class="btn btn-primary">Simpan</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- edit criteria -->
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Tambah Kriteria</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	          <form id="form_pegawai">
                <div class="card-body">
                    <div class="form-group">
	                    <label>Kriteria</label>
	                    <select class="form-control select2" id="kriteria-edit">
	                    	<?php foreach ($kriteria as $key => $key2) {?>
			                <option value="<?php echo $key2->id_kriteria ?>" selected="selected"><?php echo $key2->nama_kriteria ?> - <?php echo $key2->keterangan ?></option>
			            	<?php } ?>
		              	</select>
	                </div>
	                <div class="form-group">
	                    <label>Bobot</label>
	                    <input type="number" step="0.01" class="form-control" id="bobot-edit"></textarea>
	                </div>
	                <input type="hidden" name="id_bobot" id="id_bobot">
                </div>
              </form>
	        </div>
	        <div class="modal-footer justify-content-between">
	          <button type="submit" id="edit-bobot" class="btn btn-primary">Simpan</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->