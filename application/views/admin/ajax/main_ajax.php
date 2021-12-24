<?php if($this->session->flashdata('sukses')) { ?>
  <script type="text/javascript">
    var pesan = '<?php echo $this->session->flashdata('sukses') ?>'
    toastr.success(pesan);
  </script>
<?php }else if($this->session->flashdata('error')){ ?>
  <script type="text/javascript">
    var pesan = '<?php echo $this->session->flashdata('error') ?>'
    toastr.error(pesan);
  </script>
<?php }; ?>
<script type="text/javascript">
	if(localStorage.getItem("sukses"))
    {
        toastr.success("Data Berhasil Ditambah");
        localStorage.clear();
    }else if(localStorage.getItem("edit")){
    	toastr.success("Data Berhasil Diedit");
        localStorage.clear();
    }
	//input pegawai
	$("body").on("click","#input-pegawai",function(){
		var nip = $("#nip").val();
		var nama = $("#nama").val();
		var alamat = $("#alamat").val();
		var tgl_lahir = $("#tgl-lahir").val();
		var tgl_masuk = $("#tgl-masuk").val();
		var gender = $('#gender option:selected').val();
		var pendidikan = $("#pendidikan").val();
		var status_pegawai = $('#status_pegawai option:selected').val();
		var golongan = $("#golongan").val();

		var data = {nip:nip,
					nama:nama,
					alamat:alamat,
					tgl_lahir:tgl_lahir,
					tgl_masuk:tgl_masuk,
					gender:gender,
					pendidikan:pendidikan,
					status_pegawai:status_pegawai,
					golongan : golongan
					}
		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/add_pegawai'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});

	//set data pegawai
	$(document).on( "click", '.btn-edit',function(e) {
		var nip = $(this).data('nip');
		var nama = $(this).data('nama');
		var pendidikan = $(this).data('pend');
		var ttl = $(this).data('ttl');
		var tmk = $(this).data('tmk');
		var alamat = $(this).data('alamat');
		var status = $(this).data('status');
		var gol = $(this).data('gol');
		var gender = $(this).data('gender');

		$("#nip-edit").val(nip);
		$("#pendidikan-edit").val(pendidikan);
		$("#nama-edit").val(nama);
		$("#tgl-lahir-edit").val(ttl);
		$("#tgl-masuk-edit").val(tmk);
		$("#golongan-edit").val(gol);
		$("#alamat-edit").text(alamat);
		$('#gender-edit').val(gender).change();
		$('#status_pegawai-edit').val(status).change();
		//alert(nip);

	});
	//edit data pegawai
	$(document).on( "click", '#edit-pegawai',function(e) {
		var nip = $("#nip-edit").val();
		var nama = $("#nama-edit").val();
		var alamat = $("#alamat-edit").val();
		var tgl_lahir = $("#tgl-lahir-edit").val();
		var tgl_masuk = $("#tgl-masuk-edit").val();
		var gender = $('#gender-edit option:selected').val();
		var pendidikan = $("#pendidikan-edit").val();
		var status_pegawai = $('#status_pegawai-edit option:selected').val();
		var golongan = $("#golongan-edit").val();

		var data = {nip:nip,
					nama:nama,
					alamat:alamat,
					tgl_lahir:tgl_lahir,
					tgl_masuk:tgl_masuk,
					gender:gender,
					pendidikan:pendidikan,
					status_pegawai:status_pegawai,
					golongan : golongan
					}
		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/edit_pegawai'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("edit",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-edit').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });

	});

	// input kriteria
	$(document).on( "click", '#input-kriteria',function(e) {
		var nama = $("#nama").val();
		var keterangan = $("#keterangan").val();

		var data = {nama:nama,
					keterangan:keterangan}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/add_kriteria'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});
	// set kriteria
	$(document).on( "click", '.btn-edit',function(e) {
		var id_kriteria = $(this).data('id');
		var nama = $(this).data('nama');
		var keterangan = $(this).data('ket');
		var id_nilai_kriteria = $(this).data('id');
		var nilai = $(this).data('nilai');
		var kriteria = $(this).data('kriteria');


		$("#nama-edit").val(nama);
		$("#id_kriteria").val(id_kriteria);
		$("#keterangan-edit").text(keterangan);

		$("#id_nilai_kriteria").val(id_nilai_kriteria);
		$("#nilai-edit").val(nilai);
		$('#kriteria-edit').val(kriteria).change();
	});

	// edit kriteria
	$(document).on( "click", '#edit-kriteria',function(e) {
		var id_kriteria = $("#id_kriteria").val();
		var nama = $("#nama-edit").val();
		var keterangan = $("#keterangan-edit").val();

		var data = {nama:nama,
					id_kriteria:id_kriteria,
					keterangan:keterangan}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/edit_kriteria'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});

	// input nilai kriteria
	$(document).on( "click", '#input-nilai_kriteria',function(e) {
		var nilai = $("#nilai").val();
		var keterangan = $("#keterangan").val();
		var id_kriteria = $('#kriteria option:selected').val();

		var data = {nilai:nilai,
					id_kriteria:id_kriteria,
					keterangan:keterangan
					}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/add_nilai_kriteria'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});

	// edit kriteria
	$(document).on( "click", '#edit-nilai_kriteria',function(e) {
		var id_kriteria = $('#kriteria-edit option:selected').val();
		var id_nilai_kriteria = $("#id_nilai_kriteria").val();
		var nilai = $("#nilai-edit").val();
		var keterangan = $("#keterangan-edit").val();

		var data = {id_nilai_kriteria:id_nilai_kriteria,
					id_kriteria:id_kriteria,
					nilai:nilai,
					keterangan:keterangan}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/edit_nilai_kriteria'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});

	// bobot
	$(document).on( "click", '#input-bobot',function(e) {
		var bobot = $("#bobot").val();
		var id_kriteria = $('#kriteria option:selected').val();

		var data = {bobot:bobot,
					id_kriteria:id_kriteria
					}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/add_bobot'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});

	//set bobot
	$(document).on( "click", '.btn-edit',function(e) {
		var id_kriteria = $(this).data('kriteria');
		var id_bobot = $(this).data('id');
		var bobot = $(this).data('bobot');

		$("#id_bobot").val(id_bobot);
		$("#bobot-edit").val(bobot);
		$('#kriteria-edit').val(id_kriteria).change();
	});
	// edit bobot
	$(document).on( "click", '#edit-bobot',function(e) {
		var id_kriteria = $('#kriteria-edit option:selected').val();
		var id_bobot = $("#id_bobot").val();
		var bobot = $("#bobot-edit").val();

		var data = {id_bobot:id_bobot,
					id_kriteria:id_kriteria,
					bobot:bobot
				}

		$.ajax({
	        type: 'POST',
	        url: "<?php echo base_url('admin/edit_bobot'); ?>",
	        data:data,
	        dataType : 'json',
	        success: function(data) {
	        	if (data=='sukses') {
				    localStorage.setItem("sukses",data)
				    window.location.reload(); 
				}else if(data=='error'){
					$('#modal-input').modal('hide');
					toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
				}
	        }
	    });
	});
</script>