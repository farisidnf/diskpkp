<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

if (! function_exists('simpanRupiah')) {
    function simpanRupiah($val)
    {
        $x = str_replace('Rp. ', '', $val);
        $x = str_replace('Rp.', '', $x);
        $x = str_replace('.', '', $x);
        $x = str_replace(',', '.', $x);
        if($x==""){
            $x=null;
        }

        return $x;
    }
}

if (! function_exists('editRupiah')) {

function editRupiah($nilai,$simbol=""){
	if($nilai){
		return $simbol.number_format($nilai, 2, ',', '.');    
	}else{
		return null;
	}
}

}