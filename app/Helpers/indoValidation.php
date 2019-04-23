<?php
namespace App\Helpers;

class indoValidation {
    public static function valid() {
        $pesan = [
            'required'  => 'Form :attribute mohon untuk di isi dan tidak boleh kosong',
            'numeric'   => 'Form :attribute harus di isi angka',
            'email'     => 'Form :attribute sesuai dengan format Email contoh NamaAnda12@email.com',
            'min'       => 'Form :attribute minimal :min karakter',
            'same'      => 'Form :attribute nilainya harus sama dengan form :other'
        ];
        return $pesan;
    }
}