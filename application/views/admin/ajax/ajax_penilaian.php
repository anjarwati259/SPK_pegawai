<script type="text/javascript">
	$(document).ready(function(){
		$("#form-detail").hide();
		// mendapatkan detail nama pegawai
		$("body").on("change",".select2",function(){
			$("#form-detail").show();
			var nip = $('#sel option:selected').val();
			$.ajax({
		        type: 'POST',
		        url: "<?php echo base_url('penilaian/detail_pegawai'); ?>",
		        data:{nip:nip},
		        dataType : 'json',
		        success: function(hasil) {
		          // alert(hasil);
		          $("#penilai").html(hasil.nama_penguji);
		          $("#pegawai").html(hasil.nama_pegawai);
		          $("#nip").html(hasil.nip_pegawai);
		        }
		    });
		});
		$("body").on("click","#proses-data",function(){

			var cures = <?php echo json_encode($kriteria); ?>;

			var nip = $('#nip').text();
			var data={};
			var cure = [];
			var c = [];
			//alert(data);
			for ( var key in cures ) {
				cure = cures[key].nama_kriteria;
				kriteria = cures[key].nama_kriteria;
				c = $('input[name='+kriteria+']:checked').val();
				data[key] = {[cure]:c,nip:nip};
				$("#M"+kriteria).val(c);
				if(c==0){
					toastr.error("Kriteria "+kriteria+" Masih Kosong, Silahkan di lengkapi !!!");
					break;
				}
			}
			$("#Mnip").val(nip);
			cek_pegawai(nip);
		});
		$("body").on("click","#btn-ok",function(){
			var nip = $('#nip').text();
			proses_edit(nip);
		});

		function cek_pegawai(nip){
			$.ajax({
			        type: 'POST',
			        url: "<?php echo base_url('penilaian/cek_pegawai'); ?>",
			        data:{nip:nip},
			        dataType : 'json',
			        success: function(hasil) {
			        	hasil_cek(hasil);
			        }
			    });
		}
		function hasil_cek(hasil){
			if(hasil=='true'){
				$("#modal-default").modal('show');
			}else{
				proses_data();
			}
		}
		// fungsi untuk proses data
		function proses_data(){
			
			var cures = <?php echo json_encode($kriteria); ?>;
			var nip = $('#nip').text();
			
			if(nip){
				var data={};
				var cure = [];
				var c = [];
				//alert(data);
				for ( var key in cures ) {
					cure = cures[key].nama_kriteria;
					kriteria = cures[key].nama_kriteria;
					c = $('input[name='+kriteria+']:checked').val();
					// c = $('#'+kriteria+' option:selected').val();
					data[key] = {[cure]:c,nip:nip};
				}

				$.ajax({
			        type: 'POST',
			        url: "<?php echo base_url('penilaian/proses'); ?>",
			        data:data,
			        dataType : 'json',
			        success: function(hasil) {
			          url = "<?php echo base_url('penilaian/hasil'); ?>";
			          window.location.replace(url);
			        }
			    });
			}else{
				toastr.error("Silahkan Pilih Nama Pegawai Terlebih Dahulu !!!");
			}
		}

		// fungsi untuk edit penilaian
		function proses_edit(nip){
			
			var cures = <?php echo json_encode($kriteria); ?>;
			
			if(nip){
				var data={};
				var cure = [];
				var c = [];
				//alert(data);
				for ( var key in cures ) {
					cure = cures[key].nama_kriteria;
					kriteria = cures[key].nama_kriteria;
					c = $('#M'+kriteria).val();
					//`alert(c);
					data[key] = {[cure]:c,nip:nip};
				}
				$.ajax({
			        type: 'POST',
			        url: "<?php echo base_url('penilaian/edit'); ?>",
			        data:data,
			        // dataType : 'json',
			        success: function(hasil) {
			          url = "<?php echo base_url('penilaian/hasil'); ?>";
			          window.location.replace(url);
			        }
			    });
			}else{
				toastr.error("Silahkan Pilih Nama Pegawai Terlebih Dahulu !!!");
			}
		}
	});
</script>