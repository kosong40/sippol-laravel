<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class kustom {
    public static function validasi() {
        $pesan = [
    'accepted'             => 'Isian :attribute harus diterima.',
    'active_url'           => 'Isian :attribute bukan URL yang sah.',
    'after'                => 'Isian :attribute harus tanggal setelah :date.',
    'alpha'                => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Isian :attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Isian :attribute harus berupa sebuah array.',
    'before'               => 'Isian :attribute harus tanggal sebelum :date.',
    'between'              => [
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'file'    => 'Isian :attribute harus antara :min dan :max kilobytes.',
        'string'  => 'Isian :attribute harus antara :min dan :max karakter.',
        'array'   => 'Isian :attribute harus antara :min dan :max item.',
    ],
    'boolean'              => 'Isian :attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Isian :attribute bukan tanggal yang valid.',
    'date_format'          => 'Isian :attribute tidak cocok dengan format :format.',
    'different'            => 'Isian :attribute dan :other harus berbeda.',
    'digits'               => 'Isian :attribute harus berupa angka :digits.',
    'digits_between'       => 'Isian :attribute harus antara angka :min dan :max.',
    'dimensions'           => 'Isian :attribute harus merupakan dimensi gambar yang sah.',
    'distinct'             => 'Isian :attribute memiliki nilai yang duplikat.',
    'email'                => 'Isian :attribute harus berupa alamat surel yang valid.',
    'exists'               => 'Isian :attribute yang dipilih tidak valid.',
    'filled'               => 'Isian :attribute wajib diisi.',
    'image'                => 'Isian :attribute harus berupa gambar.',
    'in'                   => 'Isian :attribute yang dipilih tidak valid.',
    'in_array'             => 'Isian :attribute tidak terdapat dalam :other.',
    'integer'              => 'Isian :attribute harus merupakan bilangan bulat.',
    'ip'                   => 'Isian :attribute harus berupa alamat IP yang valid.',
    'json'                 => 'Isian :attribute harus berupa JSON string yang valid.',
    'max'                  => [
        'numeric' => 'Isian :attribute seharusnya tidak lebih dari :max.',
        'file'    => 'Isian :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => 'Isian :attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => 'Isian :attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => 'Isian :attribute harus dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => 'Isian :attribute harus minimal :min.',
        'file'    => 'Isian :attribute harus minimal :min kilobytes.',
        'string'  => 'Isian :attribute harus minimal :min karakter.',
        'array'   => 'Isian :attribute harus minimal :min item.',
    ],
    'not_in'               => 'Isian :attribute yang dipilih tidak valid.',
    'numeric'              => 'Isian :attribute harus berupa angka.',
    'present'              => 'Isian :attribute wajib ada.',
    'regex'                => 'Format isian :attribute tidak valid.',
    'required'             => 'Isian :attribute wajib diisi.',
    'required_if'          => 'Isian :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Isian :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Isian :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Isian :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Isian :attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => 'Isian :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Isian :attribute harus berukuran :size.',
        'file'    => 'Isian :attribute harus berukuran :size kilobyte.',
        'string'  => 'Isian :attribute harus berukuran :size karakter.',
        'array'   => 'Isian :attribute harus mengandung :size item.',
    ],
    'string'               => 'Isian :attribute harus berupa string.',
    'timezone'             => 'Isian :attribute harus berupa zona waktu yang valid.',
    'unique'               => 'Isian :attribute sudah ada sebelumnya.',
    'url'                  => 'Format isian :attribute tidak valid.',
        ];
        return $pesan;
    }
    public static function getRupiah($value) {
        $format = "Rp " . number_format($value,2,',','.');
        return $format;
    }
    public static function CountPrint(){
        $imb = count(DB::table('izin-mendirikan-bangunan')->where('status','Sudah ada nomor SK')->get());
        $ir = count(DB::table('izin-reklame')->where('status','Sudah ada nomor SK')->get());
        $aw = count(DB::table('atraksi-wisata')->where('status','Sudah ada nomor SK')->get());
        $gk = count(DB::table('gelanggang-ketangkasan')->where('status','Sudah ada nomor SK')->get());
        $iumk = count(DB::table('izin-usaha-mikro-dan-kecil')->where('status','Sudah ada nomor SK')->get());
        $sk = count(DB::table('salon-kecantikan')->where('status','Sudah ada nomor SK')->get());
        $rm = count(DB::table('rumah-makan')->where('status','Sudah ada nomor SK')->get());
        $sum = array_sum([$ir,$imb,$aw,$gk,$iumk,$sk,$rm]);
        // return $imb+$ir;
        return $sum;
    }
    public static function CountSetuju(){
        $imb = count(DB::table('izin-mendirikan-bangunan')->where('status','Setuju')->get());
        $ir = count(DB::table('izin-reklame')->where('status','Setuju')->get());
        $aw = count(DB::table('atraksi-wisata')->where('status','Setuju')->get());
        $gk = count(DB::table('gelanggang-ketangkasan')->where('status','Setuju')->get());
        $iumk = count(DB::table('izin-usaha-mikro-dan-kecil')->where('status','Setuju')->get());
        $sk = count(DB::table('salon-kecantikan')->where('status','Setuju')->get());
        $rm = count(DB::table('rumah-makan')->where('status','Setuju')->get());
        $sum = array_sum([$ir,$imb,$aw,$gk,$iumk,$sk,$rm]);
        return $sum;
    }
    public static function CountBelum(){
        $imb = count(DB::table('izin-mendirikan-bangunan')->where('status','Belum')->get());
        $ir = count(DB::table('izin-reklame')->where('status','Belum')->get());
        $aw = count(DB::table('atraksi-wisata')->where('status','Belum')->get());
        $gk = count(DB::table('gelanggang-ketangkasan')->where('status','Belum')->get());
        $iumk = count(DB::table('izin-usaha-mikro-dan-kecil')->where('status','Belum')->get());
        $sk = count(DB::table('salon-kecantikan')->where('status','Belum')->get());
        $rm = count(DB::table('rumah-makan')->where('status','Belum')->get());
        $sum = array_sum([$ir,$imb,$aw,$gk,$iumk,$sk,$rm]);
        return $sum;
    }
}