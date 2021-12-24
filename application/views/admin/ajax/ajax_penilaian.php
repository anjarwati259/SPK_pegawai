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
		//tombol proses data
		$("body").on("click","#proses-data",function(){
			var nip = $('#nip').text();
			var cures = <?php echo json_encode($kriteria); ?>;
			
			if(nip){
				var data={};
				var cure = [];
				var c = [];
				//alert(data);
				for ( var key in cures ) {
					cure = cures[key].nama_kriteria;
					kriteria = cures[key].nama_kriteria;
					c = $('#'+kriteria+' option:selected').val();
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
		});
	});
</script>