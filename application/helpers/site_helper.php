<?php 
function count_kriteria(){
    $CI = get_instance();
    $CI->load->model('penilaian_model');

    $hasil = $CI->penilaian_model->count_kriteria();
    return $hasil->total;
}