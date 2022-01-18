<?php 
function count_kriteria(){
    $CI = get_instance();
    $CI->load->model('penilaian_model');

    $hasil = $CI->penilaian_model->count_kriteria();
    return $hasil->total;
}
function simpan_hasil($nip,$hasil){
    $CI = get_instance();
    $CI->load->model('penilaian_model');

    //cek data di hasil
    $cek_hasil = $CI->penilaian_model->cek_hasil($nip);
    if($cek_hasil){
    	$CI->penilaian_model->update_hasil($hasil);
    }else{
    	$CI->penilaian_model->insert_hasil($hasil);
    }
    // $hasil = $CI->penilaian_model->count_kriteria();
}